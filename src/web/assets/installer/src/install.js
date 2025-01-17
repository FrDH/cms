import './install.scss';

(function ($) {
  /** global: Craft */
  /** global: Garnish */
  Craft.Installer = Garnish.Base.extend(
    {
      $bg: null,
      $screens: null,
      $dots: null,
      $currentScreen: null,
      $currentDot: null,

      $dbDriverInput: null,
      $dbPortInput: null,

      modal: null,
      currentScreen: null,
      loading: false,

      /**
       * Constructor
       */
      init: function () {
        this.$bg = $('#bg');
        this.$screens = $('#screens').children();
        this.$dbDriverInput = $('#db-driver');
        this.$dbPortInput = $('#db-port');

        this.updateDbPortInput();

        this.addListener(
          this.$screens.find('form'),
          'submit',
          'handleScreenSubmit'
        );
        this.addListener(
          this.$screens.find('.btn.submit'),
          'activate',
          'handleScreenSubmit'
        );

        this.addListener($('#beginbtn'), 'activate', 'showModal');
        this.addListener(this.$dbDriverInput, 'change', 'updateDbPortInput');

        new Craft.PasswordInput('#account-password');
      },

      showModal: function () {
        if (!this.modal) {
          this.modal = new Garnish.Modal(
            $('#install-modal').removeClass('hidden'),
            {
              hideOnEsc: false,
              shadeClass: '',
            }
          );
          this.gotoScreen(1);
        } else {
          this.modal.show();
        }
      },

      updateDbPortInput: function () {
        var driver = this.$dbDriverInput.val();
        var port = this.$dbPortInput.val();
        var defaultPort = Craft.Installer.defaultDbPorts[driver];

        this.$dbPortInput.attr('placeholder', defaultPort);
        if (port == defaultPort) {
          this.$dbPortInput.val('');
        }
      },

      handleScreenSubmit: function (ev) {
        ev.preventDefault();

        var inputs = this.getScreenInputNames(this.$currentScreen);
        if (inputs) {
          this.validate(this.$currentScreen.attr('id'), inputs);
        } else {
          this.gotoNextScreen();
        }
      },

      getScreenInputNames: function ($screen) {
        var inputsStr = $screen.attr('data-inputs');
        return inputsStr ? inputsStr.split(',') : null;
      },

      getInputData: function (what, inputs, includePrefix) {
        var data = {};
        for (var i = 0; i < inputs.length; i++) {
          var input = inputs[i],
            $input = $('#' + what + '-' + input);
          data[(includePrefix ? what + '-' : '') + input] =
            Garnish.getInputPostVal($input);
        }
        return data;
      },

      showInstallScreen: function () {
        var data = {};
        var $screen;
        var inputs;
        for (var i = 1; i < this.$screens.length - 1; i++) {
          $screen = this.$screens.eq(i);
          inputs = this.getScreenInputNames($screen);
          $.extend(data, this.getInputData($screen.attr('id'), inputs, true));
        }

        Craft.sendActionRequest('POST', 'install/install', {data})
          .then((response) => this.allDone(response))
          .catch((response) => this.allDone(response));
      },

      allDone: function (response) {
        $('#spinner').remove();
        var $h1 = this.$currentScreen.find('h1:first');

        if (response.status === 200) {
          $h1.text(Craft.t('app', 'Craft is installed! 🎉'));

          setTimeout(function () {
            window.location.href = Craft.getUrl(postCpLoginRedirect);
          }, 1000);
        } else {
          $h1.text('Install failed 😞');
          const messageHtml = response?.response?.data?.messageHtml;
          if (messageHtml) {
            $('<div/>', {
              class: 'pane',
              html: messageHtml,
            }).insertAfter($h1);
          } else {
            $('<p/>', {
              text:
                response?.response?.data?.message ??
                'Please check your logs for more info.',
            }).insertAfter($h1);
          }
        }
      },

      gotoNextScreen: function () {
        this.gotoScreen(this.currentScreen + 1);
      },

      gotoScreen: function (i) {
        // Show the dots (unless it's the license screen)
        if (i === 1) {
          if (this.$dots) {
            this.$dots.hide();
          }
        } else {
          if (!this.$dots) {
            this.$dots = $();
            for (var j = 0; j < this.$screens.length; j++) {
              this.$dots = this.$dots.add($('<div/>').appendTo($('#dots')));
            }
          } else {
            this.$dots.show();
          }
        }

        // Hide the current screen
        if (this.$currentScreen) {
          this.$currentScreen.addClass('hidden');
          if (this.$currentDot) {
            this.$currentDot.removeClass('sel');
          }
        }

        // Slide in the new screen
        this.currentScreen = i;
        this.$currentScreen = this.$screens.eq(i - 1).removeClass('hidden');
        if (this.$dots) {
          this.$currentDot = this.$dots.eq(i - 1).addClass('sel');
        }

        // Is this the install screen?
        if (i === this.$screens.length) {
          this.showInstallScreen();
        } else if (i !== 1) {
          // Give focus to the first input
          this.$currentScreen.find('input[type=text]:first').focus();
        }
      },

      validate: function (what, inputs) {
        // Prevent double-clicks
        if (this.loading) {
          return;
        }

        this.loading = true;

        // Clear any previous error lists
        this.$currentScreen.find('.input').removeClass('errors');
        this.$currentScreen.find('ul.errors').remove();

        var $submitBtn = this.$currentScreen.find('.btn.submit');
        $submitBtn.addClass('loading');

        var action = 'install/validate-' + what;
        var data = this.getInputData(what, inputs, false);

        Craft.sendActionRequest('POST', action, {data})
          .then(() => {
            this.gotoNextScreen();
          })
          .catch(({response}) => {
            if (response.status === 400) {
              const $errors = $('<ul/>', {class: 'errors'}).insertBefore(
                $('#' + what).find('.buttons')
              );

              for (let input in response.data.errors) {
                if (!response.data.errors.hasOwnProperty(input)) {
                  continue;
                }

                for (var i = 0; i < response.data.errors[input].length; i++) {
                  $('<li>' + response.data.errors[input][i] + '</li>').appendTo(
                    $errors
                  );
                }

                var $input = $('#' + what + '-' + input + '-field').children(
                  '.input'
                );
                $input.addClass('errors');
                (($input) => {
                  var $elements = $input.find('select,input');
                  this.addListener(
                    $elements,
                    'focus,blur,textchange,change',
                    function () {
                      $input.removeClass('errors');
                      this.removeListener(
                        $elements,
                        'focus,blur,textchange,change'
                      );
                    }
                  );
                })($input);
              }

              Garnish.shake(this.modal.$container);
            } else {
              console.warn('Unexpected response:', response);
            }
          })
          .finally(() => {
            this.loading = false;
            $submitBtn.removeClass('loading');
          });
      },
    },
    {
      defaultDbPorts: {
        mysql: 3306,
        pgsql: 5432,
      },
    }
  );

  Garnish.$win.on('load', function () {
    Craft.installer = new Craft.Installer();
  });
})(jQuery);
