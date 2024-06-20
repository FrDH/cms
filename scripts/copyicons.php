<?php

use craft\helpers\Search;

require dirname(__DIR__) . '/vendor/autoload.php';
$app = require(dirname(__DIR__) . '/bootstrap/console.php');

$icons = [
  'brands/github.svg',
  'custom-icons/asterisk-slash.svg',
  'custom-icons/diamond-slash.svg',
  'custom-icons/element-card-slash.svg',
  'custom-icons/element-card.svg',
  'custom-icons/element-cards.svg',
  'custom-icons/graphql.svg',
  'custom-icons/grip-dots.svg',
  'custom-icons/image-slash.svg',
  'custom-icons/list-flip.svg',
  'custom-icons/list-tree-flip.svg',
  'custom-icons/share-flip.svg',
  'light/earth-africa.svg',
  'light/earth-americas.svg',
  'light/earth-asia.svg',
  'light/earth-europe.svg',
  'light/earth-oceania.svg',
  'light/envelope.svg',
  'light/files.svg',
  'light/folder-open.svg',
  'light/globe.svg',
  'light/image.svg',
  'light/map-location.svg',
  'light/newspaper.svg',
  'light/pen-to-square.svg',
  'light/plug.svg',
  'light/signs-post.svg',
  'light/sitemap.svg',
  'light/sliders.svg',
  'light/tags.svg',
  'light/user-group.svg',
  'regular/globe.svg',
  'solid/abacus.svg',
  'solid/acorn.svg',
  'solid/address-book.svg',
  'solid/address-card.svg',
  'solid/air-conditioner.svg',
  'solid/alarm-clock.svg',
  'solid/album-collection.svg',
  'solid/album.svg',
  'solid/alicorn.svg',
  'solid/alien-8bit.svg',
  'solid/alien.svg',
  'solid/amp-guitar.svg',
  'solid/ampersand.svg',
  'solid/anchor.svg',
  'solid/angel.svg',
  'solid/angle-down.svg',
  'solid/angle-left.svg',
  'solid/angle-right.svg',
  'solid/angle-up.svg',
  'solid/angle.svg',
  'solid/apartment.svg',
  'solid/aperture.svg',
  'solid/apple-core.svg',
  'solid/apple-whole.svg',
  'solid/archway.svg',
  'solid/arrow-down-short-wide.svg',
  'solid/arrow-down-wide-short.svg',
  'solid/arrow-down.svg',
  'solid/arrow-left.svg',
  'solid/arrow-pointer.svg',
  'solid/arrow-right.svg',
  'solid/arrow-rotate-left.svg',
  'solid/arrow-rotate-right.svg',
  'solid/arrow-trend-down.svg',
  'solid/arrow-trend-up.svg',
  'solid/arrow-up-right-from-square.svg',
  'solid/arrow-up.svg',
  'solid/arrows-rotate-reverse.svg',
  'solid/arrows-rotate.svg',
  'solid/asterisk.svg',
  'solid/at.svg',
  'solid/atom.svg',
  'solid/avocado.svg',
  'solid/award.svg',
  'solid/axe-battle.svg',
  'solid/axe.svg',
  'solid/baby-carriage.svg',
  'solid/baby.svg',
  'solid/backpack.svg',
  'solid/bacon.svg',
  'solid/bacterium.svg',
  'solid/badge-check.svg',
  'solid/badge-sheriff.svg',
  'solid/badge.svg',
  'solid/badger-honey.svg',
  'solid/badminton.svg',
  'solid/bag-seedling.svg',
  'solid/bag-shopping.svg',
  'solid/bagel.svg',
  'solid/baguette.svg',
  'solid/bahai.svg',
  'solid/ball-pile.svg',
  'solid/balloon.svg',
  'solid/ballot-check.svg',
  'solid/ban.svg',
  'solid/banana.svg',
  'solid/bandage.svg',
  'solid/banjo.svg',
  'solid/barcode-read.svg',
  'solid/barcode-scan.svg',
  'solid/barcode.svg',
  'solid/bars.svg',
  'solid/baseball-bat-ball.svg',
  'solid/baseball.svg',
  'solid/basket-shopping.svg',
  'solid/basketball.svg',
  'solid/bat.svg',
  'solid/bath.svg',
  'solid/battery-bolt.svg',
  'solid/bed.svg',
  'solid/bee.svg',
  'solid/beer-mug.svg',
  'solid/bell-concierge.svg',
  'solid/bell.svg',
  'solid/bench-tree.svg',
  'solid/bicycle.svg',
  'solid/bin-recycle.svg',
  'solid/binary.svg',
  'solid/binoculars.svg',
  'solid/biohazard.svg',
  'solid/bird.svg',
  'solid/block-brick.svg',
  'solid/block-question.svg',
  'solid/bluetooth.svg',
  'solid/bolt.svg',
  'solid/bomb.svg',
  'solid/bone.svg',
  'solid/bong.svg',
  'solid/book.svg',
  'solid/bookmark.svg',
  'solid/boombox.svg',
  'solid/boot-heeled.svg',
  'solid/boot.svg',
  'solid/bottle-droplet.svg',
  'solid/bottle-water.svg',
  'solid/bow-arrow.svg',
  'solid/bowl-chopsticks.svg',
  'solid/bowl-hot.svg',
  'solid/bowl-scoops.svg',
  'solid/bowling-ball.svg',
  'solid/box-archive.svg',
  'solid/box-ballot.svg',
  'solid/brackets-curly.svg',
  'solid/braille.svg',
  'solid/brain.svg',
  'solid/brake-warning.svg',
  'solid/bread-slice.svg',
  'solid/bridge-suspension.svg',
  'solid/briefcase-medical.svg',
  'solid/briefcase.svg',
  'solid/broccoli.svg',
  'solid/broom.svg',
  'solid/browser.svg',
  'solid/brush.svg',
  'solid/bucket.svg',
  'solid/bug.svg',
  'solid/building-columns.svg',
  'solid/building.svg',
  'solid/bulldozer.svg',
  'solid/bullhorn.svg',
  'solid/bullseye-arrow.svg',
  'solid/bullseye.svg',
  'solid/buoy.svg',
  'solid/burger.svg',
  'solid/burrito.svg',
  'solid/burst.svg',
  'solid/bus-school.svg',
  'solid/bus.svg',
  'solid/butter.svg',
  'solid/cabin.svg',
  'solid/cabinet-filing.svg',
  'solid/cable-car.svg',
  'solid/cactus.svg',
  'solid/cake-candles.svg',
  'solid/cake-slice.svg',
  'solid/calculator.svg',
  'solid/calendar-days.svg',
  'solid/calendar.svg',
  'solid/camcorder.svg',
  'solid/camera-cctv.svg',
  'solid/camera-movie.svg',
  'solid/camera.svg',
  'solid/campfire.svg',
  'solid/campground.svg',
  'solid/can-food.svg',
  'solid/candle-holder.svg',
  'solid/candy-bar.svg',
  'solid/candy-cane.svg',
  'solid/candy-corn.svg',
  'solid/candy.svg',
  'solid/cannabis.svg',
  'solid/cannon.svg',
  'solid/capsules.svg',
  'solid/car-battery.svg',
  'solid/car.svg',
  'solid/caravan.svg',
  'solid/card-club.svg',
  'solid/card-diamond.svg',
  'solid/card-heart.svg',
  'solid/card-spade.svg',
  'solid/cards.svg',
  'solid/carrot.svg',
  'solid/cart-flatbed-boxes.svg',
  'solid/cart-shopping.svg',
  'solid/cash-register.svg',
  'solid/cassette-betamax.svg',
  'solid/cassette-tape.svg',
  'solid/cassette-vhs.svg',
  'solid/castle.svg',
  'solid/cat.svg',
  'solid/cauldron.svg',
  'solid/certificate.svg',
  'solid/chair-office.svg',
  'solid/chair.svg',
  'solid/champagne-glass.svg',
  'solid/charging-station.svg',
  'solid/chart-line.svg',
  'solid/chart-pie.svg',
  'solid/chart-pyramid.svg',
  'solid/check.svg',
  'solid/cheese.svg',
  'solid/cherries.svg',
  'solid/chess-board.svg',
  'solid/chess-clock.svg',
  'solid/chestnut.svg',
  'solid/child.svg',
  'solid/children.svg',
  'solid/chimney.svg',
  'solid/chopsticks.svg',
  'solid/church.svg',
  'solid/circle-arrow-down.svg',
  'solid/circle-arrow-left.svg',
  'solid/circle-arrow-right.svg',
  'solid/circle-arrow-up.svg',
  'solid/circle-check.svg',
  'solid/circle-dashed.svg',
  'solid/circle-dot.svg',
  'solid/circle-info.svg',
  'solid/circle-nodes.svg',
  'solid/circle-question.svg',
  'solid/circle.svg',
  'solid/citrus-slice.svg',
  'solid/citrus.svg',
  'solid/clapperboard.svg',
  'solid/clarinet.svg',
  'solid/clipboard.svg',
  'solid/clock-rotate-left.svg',
  'solid/clock.svg',
  'solid/clone.svg',
  'solid/clothes-hanger.svg',
  'solid/cloud-arrow-down.svg',
  'solid/cloud-arrow-up.svg',
  'solid/cloud.svg',
  'solid/clover.svg',
  'solid/club.svg',
  'solid/coconut.svg',
  'solid/code.svg',
  'solid/coffee-pot.svg',
  'solid/coffin.svg',
  'solid/comet.svg',
  'solid/comment.svg',
  'solid/compact-disc.svg',
  'solid/compass-drafting.svg',
  'solid/compass.svg',
  'solid/computer-classic.svg',
  'solid/computer-mouse.svg',
  'solid/cookie-bite.svg',
  'solid/copy.svg',
  'solid/copyright.svg',
  'solid/corn.svg',
  'solid/couch.svg',
  'solid/court-sport.svg',
  'solid/cow.svg',
  'solid/cowbell.svg',
  'solid/crab.svg',
  'solid/credit-card-front.svg',
  'solid/cricket-bat-ball.svg',
  'solid/croissant.svg',
  'solid/crop.svg',
  'solid/cross.svg',
  'solid/crosshairs.svg',
  'solid/crow.svg',
  'solid/crown.svg',
  'solid/crutch.svg',
  'solid/crystal-ball.svg',
  'solid/cube.svg',
  'solid/cubes.svg',
  'solid/cucumber.svg',
  'solid/cup-straw.svg',
  'solid/cupcake.svg',
  'solid/curling-stone.svg',
  'solid/custard.svg',
  'solid/dagger.svg',
  'solid/database.svg',
  'solid/deer.svg',
  'solid/desktop.svg',
  'solid/diagram-nested.svg',
  'solid/diagram-next.svg',
  'solid/diagram-sankey.svg',
  'solid/diagram-venn.svg',
  'solid/dial.svg',
  'solid/diamond.svg',
  'solid/dice-d10.svg',
  'solid/dice-d12.svg',
  'solid/dice-d20.svg',
  'solid/dice-d4.svg',
  'solid/dice-d6.svg',
  'solid/dice-d8.svg',
  'solid/dinosaur.svg',
  'solid/diploma.svg',
  'solid/disc-drive.svg',
  'solid/disease.svg',
  'solid/display.svg',
  'solid/dna.svg',
  'solid/do-not-enter.svg',
  'solid/dog.svg',
  'solid/dollar-sign.svg',
  'solid/dolly.svg',
  'solid/dolphin.svg',
  'solid/donut.svg',
  'solid/door-closed.svg',
  'solid/dove.svg',
  'solid/down-left-and-up-right-to-center.svg',
  'solid/down.svg',
  'solid/download.svg',
  'solid/dragon.svg',
  'solid/dreidel.svg',
  'solid/drone.svg',
  'solid/droplet.svg',
  'solid/drum-steelpan.svg',
  'solid/drum.svg',
  'solid/drumstick.svg',
  'solid/dryer.svg',
  'solid/duck.svg',
  'solid/dumbbell.svg',
  'solid/dumpster-fire.svg',
  'solid/dumpster.svg',
  'solid/dungeon.svg',
  'solid/ear-muffs.svg',
  'solid/ear.svg',
  'solid/earth-africa.svg',
  'solid/earth-americas.svg',
  'solid/earth-asia.svg',
  'solid/earth-europe.svg',
  'solid/earth-oceania.svg',
  'solid/egg-fried.svg',
  'solid/egg.svg',
  'solid/eggplant.svg',
  'solid/elephant.svg',
  'solid/elevator.svg',
  'solid/ellipsis.svg',
  'solid/engine.svg',
  'solid/envelope.svg',
  'solid/eraser.svg',
  'solid/escalator.svg',
  'solid/ethernet.svg',
  'solid/euro-sign.svg',
  'solid/excavator.svg',
  'solid/explosion.svg',
  'solid/eye-dropper.svg',
  'solid/eye-evil.svg',
  'solid/eye-slash.svg',
  'solid/eye.svg',
  'solid/eyes.svg',
  'solid/face-angry-horns.svg',
  'solid/face-angry.svg',
  'solid/face-anguished.svg',
  'solid/face-anxious-sweat.svg',
  'solid/face-astonished.svg',
  'solid/face-awesome.svg',
  'solid/face-beam-hand-over-mouth.svg',
  'solid/face-confounded.svg',
  'solid/face-confused.svg',
  'solid/face-cowboy-hat.svg',
  'solid/face-diagonal-mouth.svg',
  'solid/face-disappointed.svg',
  'solid/face-disguise.svg',
  'solid/face-dizzy.svg',
  'solid/face-dotted.svg',
  'solid/face-downcast-sweat.svg',
  'solid/face-drooling.svg',
  'solid/face-exhaling.svg',
  'solid/face-explode.svg',
  'solid/face-expressionless.svg',
  'solid/face-eyes-xmarks.svg',
  'solid/face-fearful.svg',
  'solid/face-flushed.svg',
  'solid/face-frown-open.svg',
  'solid/face-frown-slight.svg',
  'solid/face-frown.svg',
  'solid/face-glasses.svg',
  'solid/face-grimace.svg',
  'solid/face-grin-beam-sweat.svg',
  'solid/face-grin-beam.svg',
  'solid/face-grin-hearts.svg',
  'solid/face-grin-squint-tears.svg',
  'solid/face-grin-squint.svg',
  'solid/face-grin-stars.svg',
  'solid/face-grin-tears.svg',
  'solid/face-grin-tongue-squint.svg',
  'solid/face-grin-tongue-wink.svg',
  'solid/face-grin-tongue.svg',
  'solid/face-grin-wide.svg',
  'solid/face-grin-wink.svg',
  'solid/face-grin.svg',
  'solid/face-hand-over-mouth.svg',
  'solid/face-hand-peeking.svg',
  'solid/face-hand-yawn.svg',
  'solid/face-head-bandage.svg',
  'solid/face-holding-back-tears.svg',
  'solid/face-hushed.svg',
  'solid/face-icicles.svg',
  'solid/face-kiss-beam.svg',
  'solid/face-kiss-closed-eyes.svg',
  'solid/face-kiss-wink-heart.svg',
  'solid/face-kiss.svg',
  'solid/face-laugh-beam.svg',
  'solid/face-laugh-squint.svg',
  'solid/face-laugh-wink.svg',
  'solid/face-laugh.svg',
  'solid/face-lying.svg',
  'solid/face-mask.svg',
  'solid/face-meh-blank.svg',
  'solid/face-meh.svg',
  'solid/face-melting.svg',
  'solid/face-monocle.svg',
  'solid/face-nauseated.svg',
  'solid/face-nose-steam.svg',
  'solid/face-party.svg',
  'solid/face-pensive.svg',
  'solid/face-persevering.svg',
  'solid/face-pleading.svg',
  'solid/face-pouting.svg',
  'solid/face-raised-eyebrow.svg',
  'solid/face-relieved.svg',
  'solid/face-rolling-eyes.svg',
  'solid/face-sad-cry.svg',
  'solid/face-sad-sweat.svg',
  'solid/face-sad-tear.svg',
  'solid/face-saluting.svg',
  'solid/face-scream.svg',
  'solid/face-shush.svg',
  'solid/face-sleeping.svg',
  'solid/face-sleepy.svg',
  'solid/face-smile-beam.svg',
  'solid/face-smile-halo.svg',
  'solid/face-smile-hearts.svg',
  'solid/face-smile-horns.svg',
  'solid/face-smile-relaxed.svg',
  'solid/face-smile-tear.svg',
  'solid/face-smile-tongue.svg',
  'solid/face-smile-upside-down.svg',
  'solid/face-smile-wink.svg',
  'solid/face-smile.svg',
  'solid/face-smiling-hands.svg',
  'solid/face-smirking.svg',
  'solid/face-spiral-eyes.svg',
  'solid/face-sunglasses.svg',
  'solid/face-surprise.svg',
  'solid/face-swear.svg',
  'solid/face-thermometer.svg',
  'solid/face-thinking.svg',
  'solid/face-tired.svg',
  'solid/face-tissue.svg',
  'solid/face-tongue-money.svg',
  'solid/face-tongue-sweat.svg',
  'solid/face-unamused.svg',
  'solid/face-vomit.svg',
  'solid/face-weary.svg',
  'solid/face-woozy.svg',
  'solid/face-worried.svg',
  'solid/face-zany.svg',
  'solid/face-zipper.svg',
  'solid/falafel.svg',
  'solid/family.svg',
  'solid/fan.svg',
  'solid/farm.svg',
  'solid/faucet.svg',
  'solid/fax.svg',
  'solid/feather.svg',
  'solid/fence.svg',
  'solid/ferris-wheel.svg',
  'solid/ferry.svg',
  'solid/field-hockey-stick-ball.svg',
  'solid/file-circle-plus.svg',
  'solid/file-code.svg',
  'solid/file.svg',
  'solid/files.svg',
  'solid/fill-drip.svg',
  'solid/film-canister.svg',
  'solid/film.svg',
  'solid/filter.svg',
  'solid/fingerprint.svg',
  'solid/fire-burner.svg',
  'solid/fire-extinguisher.svg',
  'solid/fire-hydrant.svg',
  'solid/fire.svg',
  'solid/fireplace.svg',
  'solid/fish-bones.svg',
  'solid/fish.svg',
  'solid/fishing-rod.svg',
  'solid/flag-checkered.svg',
  'solid/flag-pennant.svg',
  'solid/flag-swallowtail.svg',
  'solid/flag.svg',
  'solid/flashlight.svg',
  'solid/flask.svg',
  'solid/flatbread.svg',
  'solid/floppy-disk.svg',
  'solid/flower.svg',
  'solid/flute.svg',
  'solid/flux-capacitor.svg',
  'solid/flying-disc.svg',
  'solid/folder-closed.svg',
  'solid/folder-open.svg',
  'solid/folder-plus.svg',
  'solid/folder.svg',
  'solid/fondue-pot.svg',
  'solid/font-case.svg',
  'solid/font.svg',
  'solid/football-helmet.svg',
  'solid/football.svg',
  'solid/fork-knife.svg',
  'solid/fork.svg',
  'solid/forklift.svg',
  'solid/fort.svg',
  'solid/frame.svg',
  'solid/french-fries.svg',
  'solid/frog.svg',
  'solid/function.svg',
  'solid/futbol.svg',
  'solid/galaxy.svg',
  'solid/gallery-thumbnails.svg',
  'solid/game-board.svg',
  'solid/game-console-handheld-crank.svg',
  'solid/game-console-handheld.svg',
  'solid/gamepad-modern.svg',
  'solid/garage-car.svg',
  'solid/garlic.svg',
  'solid/gas-pump.svg',
  'solid/gauge.svg',
  'solid/gavel.svg',
  'solid/gear.svg',
  'solid/gem.svg',
  'solid/genderless.svg',
  'solid/ghost.svg',
  'solid/gift.svg',
  'solid/gingerbread-man.svg',
  'solid/glass-citrus.svg',
  'solid/glass.svg',
  'solid/glasses.svg',
  'solid/globe-snow.svg',
  'solid/globe-stand.svg',
  'solid/goal-net.svg',
  'solid/golf-ball-tee.svg',
  'solid/golf-club.svg',
  'solid/golf-flag-hole.svg',
  'solid/gopuram.svg',
  'solid/graduation-cap.svg',
  'solid/gramophone.svg',
  'solid/grapes.svg',
  'solid/grate.svg',
  'solid/grid-2.svg',
  'solid/grid-4.svg',
  'solid/grid-5.svg',
  'solid/grid.svg',
  'solid/grill.svg',
  'solid/guitar-electric.svg',
  'solid/guitar.svg',
  'solid/gun-squirt.svg',
  'solid/gun.svg',
  'solid/hammer-war.svg',
  'solid/hammer.svg',
  'solid/hand-fingers-crossed.svg',
  'solid/hand-fist.svg',
  'solid/hand-horns.svg',
  'solid/hand-love.svg',
  'solid/hand-middle-finger.svg',
  'solid/hand-peace.svg',
  'solid/hand-point-left.svg',
  'solid/hand-point-ribbon.svg',
  'solid/hand-point-right.svg',
  'solid/hand-point-up.svg',
  'solid/hand-pointer.svg',
  'solid/hand-scissors.svg',
  'solid/hand-spock.svg',
  'solid/hand-wave.svg',
  'solid/hand.svg',
  'solid/handcuffs.svg',
  'solid/hands-clapping.svg',
  'solid/handshake.svg',
  'solid/hanukiah.svg',
  'solid/hard-drive.svg',
  'solid/hashtag.svg',
  'solid/hat-beach.svg',
  'solid/hat-chef.svg',
  'solid/hat-cowboy.svg',
  'solid/hat-santa.svg',
  'solid/hat-winter.svg',
  'solid/hat-witch.svg',
  'solid/hat-wizard.svg',
  'solid/head-side-brain.svg',
  'solid/head-side-mask.svg',
  'solid/head-side.svg',
  'solid/headphones.svg',
  'solid/headset.svg',
  'solid/heart.svg',
  'solid/heat.svg',
  'solid/helicopter-symbol.svg',
  'solid/helicopter.svg',
  'solid/helmet-battle.svg',
  'solid/helmet-safety.svg',
  'solid/hexagon.svg',
  'solid/highlighter.svg',
  'solid/hippo.svg',
  'solid/hockey-mask.svg',
  'solid/hockey-puck.svg',
  'solid/holly-berry.svg',
  'solid/honey-pot.svg',
  'solid/hood-cloak.svg',
  'solid/horizontal-rule.svg',
  'solid/horse-head.svg',
  'solid/horse.svg',
  'solid/hose.svg',
  'solid/hospital.svg',
  'solid/hot-tub-person.svg',
  'solid/hotdog.svg',
  'solid/hotel.svg',
  'solid/hourglass.svg',
  'solid/house.svg',
  'solid/hundred-points.svg',
  'solid/hurricane.svg',
  'solid/i-cursor.svg',
  'solid/ice-cream.svg',
  'solid/ice-skate.svg',
  'solid/icicles.svg',
  'solid/icons.svg',
  'solid/id-badge.svg',
  'solid/id-card.svg',
  'solid/igloo.svg',
  'solid/image-polaroid.svg',
  'solid/image-slash.svg',
  'solid/image.svg',
  'solid/images.svg',
  'solid/inbox.svg',
  'solid/industry-windows.svg',
  'solid/infinity.svg',
  'solid/inhaler.svg',
  'solid/input-numeric.svg',
  'solid/input-text.svg',
  'solid/interrobang.svg',
  'solid/intersection.svg',
  'solid/island-tropical.svg',
  'solid/jack-o-lantern.svg',
  'solid/jar.svg',
  'solid/jedi.svg',
  'solid/jet-fighter.svg',
  'solid/joint.svg',
  'solid/joystick.svg',
  'solid/jug-detergent.svg',
  'solid/jug.svg',
  'solid/kazoo.svg',
  'solid/key-skeleton.svg',
  'solid/key.svg',
  'solid/keynote.svg',
  'solid/kidneys.svg',
  'solid/kit-medical.svg',
  'solid/kitchen-set.svg',
  'solid/kite.svg',
  'solid/kiwi-bird.svg',
  'solid/kiwi-fruit.svg',
  'solid/knife-kitchen.svg',
  'solid/knife.svg',
  'solid/lacrosse-stick.svg',
  'solid/lambda.svg',
  'solid/lamp-desk.svg',
  'solid/lamp-floor.svg',
  'solid/lamp-street.svg',
  'solid/lamp.svg',
  'solid/landmark.svg',
  'solid/language.svg',
  'solid/laptop.svg',
  'solid/lasso.svg',
  'solid/layer-group.svg',
  'solid/leaf-maple.svg',
  'solid/leaf-oak.svg',
  'solid/leaf.svg',
  'solid/left.svg',
  'solid/lemon.svg',
  'solid/life-ring.svg',
  'solid/light-ceiling.svg',
  'solid/light-emergency.svg',
  'solid/light-switch.svg',
  'solid/lightbulb.svg',
  'solid/lighthouse.svg',
  'solid/lights-holiday.svg',
  'solid/link.svg',
  'solid/lips.svg',
  'solid/list-check.svg',
  'solid/list-ol.svg',
  'solid/list-radio.svg',
  'solid/list-timeline.svg',
  'solid/list-tree.svg',
  'solid/list-ul.svg',
  'solid/list.svg',
  'solid/lobster.svg',
  'solid/location-arrow.svg',
  'solid/location-crosshairs.svg',
  'solid/location-dot.svg',
  'solid/lock-open.svg',
  'solid/lock.svg',
  'solid/locust.svg',
  'solid/lollipop.svg',
  'solid/loveseat.svg',
  'solid/luchador-mask.svg',
  'solid/lungs.svg',
  'solid/mace.svg',
  'solid/magnet.svg',
  'solid/magnifying-glass.svg',
  'solid/mailbox.svg',
  'solid/mandolin.svg',
  'solid/mango.svg',
  'solid/manhole.svg',
  'solid/map-location.svg',
  'solid/map-pin.svg',
  'solid/map.svg',
  'solid/marker.svg',
  'solid/mars-and-venus.svg',
  'solid/mars.svg',
  'solid/martini-glass.svg',
  'solid/mask-face.svg',
  'solid/mask-snorkel.svg',
  'solid/mask-ventilator.svg',
  'solid/mask.svg',
  'solid/masks-theater.svg',
  'solid/mattress-pillow.svg',
  'solid/meat.svg',
  'solid/medal.svg',
  'solid/megaphone.svg',
  'solid/melon-slice.svg',
  'solid/melon.svg',
  'solid/memo.svg',
  'solid/memory.svg',
  'solid/menorah.svg',
  'solid/mercury.svg',
  'solid/message-bot.svg',
  'solid/message.svg',
  'solid/messages.svg',
  'solid/meteor.svg',
  'solid/meter.svg',
  'solid/microchip.svg',
  'solid/microphone-stand.svg',
  'solid/microphone.svg',
  'solid/microscope.svg',
  'solid/microwave.svg',
  'solid/minus.svg',
  'solid/mistletoe.svg',
  'solid/mitten.svg',
  'solid/mobile.svg',
  'solid/money-bill.svg',
  'solid/money-check.svg',
  'solid/monitor-waveform.svg',
  'solid/monkey.svg',
  'solid/monument.svg',
  'solid/moon-stars.svg',
  'solid/moon.svg',
  'solid/moped.svg',
  'solid/mortar-pestle.svg',
  'solid/mosque.svg',
  'solid/mosquito.svg',
  'solid/motorcycle.svg',
  'solid/mound.svg',
  'solid/mountain.svg',
  'solid/mountains.svg',
  'solid/mouse-field.svg',
  'solid/mp3-player.svg',
  'solid/mug-tea.svg',
  'solid/mug.svg',
  'solid/mushroom.svg',
  'solid/music-note.svg',
  'solid/music.svg',
  'solid/mustache.svg',
  'solid/narwhal.svg',
  'solid/nesting-dolls.svg',
  'solid/network-wired.svg',
  'solid/neuter.svg',
  'solid/newspaper.svg',
  'solid/nose.svg',
  'solid/note.svg',
  'solid/notebook.svg',
  'solid/octagon.svg',
  'solid/oil-can.svg',
  'solid/oil-well.svg',
  'solid/olive-branch.svg',
  'solid/olive.svg',
  'solid/omega.svg',
  'solid/onion.svg',
  'solid/ornament.svg',
  'solid/otter.svg',
  'solid/outlet.svg',
  'solid/oven.svg',
  'solid/page.svg',
  'solid/pager.svg',
  'solid/paint-roller.svg',
  'solid/paintbrush-fine.svg',
  'solid/paintbrush.svg',
  'solid/palette.svg',
  'solid/pancakes.svg',
  'solid/paper-plane.svg',
  'solid/paperclip.svg',
  'solid/parachute-box.svg',
  'solid/paragraph.svg',
  'solid/party-bell.svg',
  'solid/party-horn.svg',
  'solid/passport.svg',
  'solid/paste.svg',
  'solid/paw-claws.svg',
  'solid/paw.svg',
  'solid/peace.svg',
  'solid/peach.svg',
  'solid/peanut.svg',
  'solid/peapod.svg',
  'solid/pear.svg',
  'solid/pedestal.svg',
  'solid/pegasus.svg',
  'solid/pen-circle.svg',
  'solid/pen-to-square.svg',
  'solid/pen.svg',
  'solid/pencil.svg',
  'solid/people.svg',
  'solid/pepper-hot.svg',
  'solid/pepper.svg',
  'solid/person-biking.svg',
  'solid/person-booth.svg',
  'solid/person-breastfeeding.svg',
  'solid/person-chalkboard.svg',
  'solid/person-digging.svg',
  'solid/person-fairy.svg',
  'solid/person-falling.svg',
  'solid/person-from-portal.svg',
  'solid/person-hiking.svg',
  'solid/person-pinball.svg',
  'solid/person-praying.svg',
  'solid/person-pregnant.svg',
  'solid/person-running.svg',
  'solid/person-sign.svg',
  'solid/person-skating.svg',
  'solid/person-skiing-nordic.svg',
  'solid/person-skiing.svg',
  'solid/person-sledding.svg',
  'solid/person-snowboarding.svg',
  'solid/person-snowmobiling.svg',
  'solid/person-swimming.svg',
  'solid/person-to-door.svg',
  'solid/person-walking-luggage.svg',
  'solid/person-walking-with-cane.svg',
  'solid/person-walking.svg',
  'solid/person.svg',
  'solid/phone-office.svg',
  'solid/phone-rotary.svg',
  'solid/phone.svg',
  'solid/pi.svg',
  'solid/piano-keyboard.svg',
  'solid/piano.svg',
  'solid/pickaxe.svg',
  'solid/pickleball.svg',
  'solid/pie.svg',
  'solid/pig.svg',
  'solid/pills.svg',
  'solid/pinata.svg',
  'solid/pinball.svg',
  'solid/pineapple.svg',
  'solid/pipe-smoking.svg',
  'solid/pizza-slice.svg',
  'solid/place-of-worship.svg',
  'solid/plane.svg',
  'solid/planet-ringed.svg',
  'solid/plate-utensils.svg',
  'solid/play.svg',
  'solid/plug.svg',
  'solid/plus.svg',
  'solid/podcast.svg',
  'solid/podium.svg',
  'solid/police-box.svg',
  'solid/poo.svg',
  'solid/pool-8-ball.svg',
  'solid/popcorn.svg',
  'solid/popsicle.svg',
  'solid/pot-food.svg',
  'solid/potato.svg',
  'solid/power-off.svg',
  'solid/prescription-bottle-medical.svg',
  'solid/prescription-bottle.svg',
  'solid/prescription.svg',
  'solid/presentation-screen.svg',
  'solid/pretzel.svg',
  'solid/print.svg',
  'solid/projector.svg',
  'solid/pumpkin.svg',
  'solid/puzzle-piece.svg',
  'solid/qrcode.svg',
  'solid/question.svg',
  'solid/quote-right.svg',
  'solid/quotes.svg',
  'solid/rabbit.svg',
  'solid/raccoon.svg',
  'solid/racquet.svg',
  'solid/radar.svg',
  'solid/radiation.svg',
  'solid/radio.svg',
  'solid/rainbow.svg',
  'solid/raindrops.svg',
  'solid/ram.svg',
  'solid/raygun.svg',
  'solid/receipt.svg',
  'solid/record-vinyl.svg',
  'solid/rectangle-history.svg',
  'solid/rectangle-terminal.svg',
  'solid/rectangle-vertical.svg',
  'solid/rectangle.svg',
  'solid/recycle.svg',
  'solid/refrigerator.svg',
  'solid/registered.svg',
  'solid/restroom.svg',
  'solid/rhombus.svg',
  'solid/ribbon.svg',
  'solid/right.svg',
  'solid/ring-diamond.svg',
  'solid/ring.svg',
  'solid/rings-wedding.svg',
  'solid/road-barrier.svg',
  'solid/road.svg',
  'solid/robot.svg',
  'solid/rocket-launch.svg',
  'solid/roller-coaster.svg',
  'solid/rotate-left.svg',
  'solid/rotate-right.svg',
  'solid/route-highway.svg',
  'solid/route-interstate.svg',
  'solid/router.svg',
  'solid/rss.svg',
  'solid/rug.svg',
  'solid/rugby-ball.svg',
  'solid/ruler-combined.svg',
  'solid/ruler-triangle.svg',
  'solid/ruler.svg',
  'solid/rv.svg',
  'solid/sack-dollar.svg',
  'solid/sack.svg',
  'solid/sailboat.svg',
  'solid/salad.svg',
  'solid/salt-shaker.svg',
  'solid/sandwich.svg',
  'solid/satellite-dish.svg',
  'solid/satellite.svg',
  'solid/sausage.svg',
  'solid/saxophone.svg',
  'solid/scale-balanced.svg',
  'solid/scalpel.svg',
  'solid/scanner-image.svg',
  'solid/scarecrow.svg',
  'solid/scarf.svg',
  'solid/school.svg',
  'solid/scissors.svg',
  'solid/screencast.svg',
  'solid/screwdriver-wrench.svg',
  'solid/screwdriver.svg',
  'solid/scribble.svg',
  'solid/scroll.svg',
  'solid/scrubber.svg',
  'solid/scythe.svg',
  'solid/sd-card.svg',
  'solid/seal.svg',
  'solid/seat-airline.svg',
  'solid/section.svg',
  'solid/seedling.svg',
  'solid/sensor.svg',
  'solid/server.svg',
  'solid/shapes.svg',
  'solid/share.svg',
  'solid/sheep.svg',
  'solid/sheet-plastic.svg',
  'solid/shelves.svg',
  'solid/shield.svg',
  'solid/ship.svg',
  'solid/shirt-long-sleeve.svg',
  'solid/shirt-running.svg',
  'solid/shirt-tank-top.svg',
  'solid/shirt.svg',
  'solid/shish-kebab.svg',
  'solid/shoe-prints.svg',
  'solid/shop.svg',
  'solid/shovel-snow.svg',
  'solid/shovel.svg',
  'solid/shower.svg',
  'solid/shredder.svg',
  'solid/shrimp.svg',
  'solid/shutters.svg',
  'solid/shuttle-space.svg',
  'solid/sickle.svg',
  'solid/sidebar-flip.svg',
  'solid/sidebar.svg',
  'solid/sign-hanging.svg',
  'solid/sign-post.svg',
  'solid/signal-stream.svg',
  'solid/signal.svg',
  'solid/signature.svg',
  'solid/signs-post.svg',
  'solid/sim-card.svg',
  'solid/sink.svg',
  'solid/siren.svg',
  'solid/sitemap.svg',
  'solid/skeleton.svg',
  'solid/ski-boot-ski.svg',
  'solid/ski-boot.svg',
  'solid/skull-cow.svg',
  'solid/skull-crossbones.svg',
  'solid/skull.svg',
  'solid/slash.svg',
  'solid/sleigh.svg',
  'solid/sliders.svg',
  'solid/slot-machine.svg',
  'solid/smoking.svg',
  'solid/snake.svg',
  'solid/snooze.svg',
  'solid/snowflake.svg',
  'solid/snowman.svg',
  'solid/snowplow.svg',
  'solid/soap.svg',
  'solid/socks.svg',
  'solid/soft-serve.svg',
  'solid/solar-panel.svg',
  'solid/solar-system.svg',
  'solid/spa.svg',
  'solid/space-station-moon-construction.svg',
  'solid/space-station-moon.svg',
  'solid/spade.svg',
  'solid/spaghetti-monster-flying.svg',
  'solid/sparkle.svg',
  'solid/sparkles.svg',
  'solid/speaker.svg',
  'solid/spider-web.svg',
  'solid/spider.svg',
  'solid/splotch.svg',
  'solid/spoon.svg',
  'solid/sportsball.svg',
  'solid/spray-can.svg',
  'solid/sprinkler.svg',
  'solid/square-arrow-up.svg',
  'solid/square-check.svg',
  'solid/square.svg',
  'solid/squid.svg',
  'solid/squirrel.svg',
  'solid/staff-snake.svg',
  'solid/staff.svg',
  'solid/stairs.svg',
  'solid/stamp.svg',
  'solid/stapler.svg',
  'solid/star-and-crescent.svg',
  'solid/star-christmas.svg',
  'solid/star-of-david.svg',
  'solid/star-of-life.svg',
  'solid/star-shooting.svg',
  'solid/star.svg',
  'solid/starfighter-twin-ion-engine-advanced.svg',
  'solid/starfighter-twin-ion-engine.svg',
  'solid/starfighter.svg',
  'solid/stars.svg',
  'solid/starship-freighter.svg',
  'solid/starship.svg',
  'solid/steak.svg',
  'solid/steering-wheel.svg',
  'solid/stethoscope.svg',
  'solid/stocking.svg',
  'solid/stomach.svg',
  'solid/stopwatch.svg',
  'solid/store.svg',
  'solid/strawberry.svg',
  'solid/street-view.svg',
  'solid/stretcher.svg',
  'solid/stroopwafel.svg',
  'solid/subscript.svg',
  'solid/subtitles.svg',
  'solid/suitcase.svg',
  'solid/sun.svg',
  'solid/sunglasses.svg',
  'solid/superscript.svg',
  'solid/sushi-roll.svg',
  'solid/sushi.svg',
  'solid/swatchbook.svg',
  'solid/sword-laser.svg',
  'solid/sword.svg',
  'solid/symbols.svg',
  'solid/synagogue.svg',
  'solid/syringe.svg',
  'solid/t-rex.svg',
  'solid/table-cells-large.svg',
  'solid/table-cells.svg',
  'solid/table-columns.svg',
  'solid/table-layout.svg',
  'solid/table-list.svg',
  'solid/table-picnic.svg',
  'solid/table-rows.svg',
  'solid/table-tennis-paddle-ball.svg',
  'solid/table-tree.svg',
  'solid/table.svg',
  'solid/tablet.svg',
  'solid/tablets.svg',
  'solid/tachograph-digital.svg',
  'solid/taco.svg',
  'solid/tag.svg',
  'solid/tags.svg',
  'solid/tally.svg',
  'solid/tamale.svg',
  'solid/tank-water.svg',
  'solid/tape.svg',
  'solid/tarp.svg',
  'solid/taxi.svg',
  'solid/teddy-bear.svg',
  'solid/teeth.svg',
  'solid/telescope.svg',
  'solid/tennis-ball.svg',
  'solid/tent.svg',
  'solid/terminal.svg',
  'solid/text.svg',
  'solid/thermometer.svg',
  'solid/thought-bubble.svg',
  'solid/thumbs-down.svg',
  'solid/thumbs-up.svg',
  'solid/thumbtack.svg',
  'solid/ticket-airline.svg',
  'solid/ticket.svg',
  'solid/tilde.svg',
  'solid/timeline.svg',
  'solid/timer.svg',
  'solid/tire-pressure-warning.svg',
  'solid/tire.svg',
  'solid/toggle-off.svg',
  'solid/toggle-on.svg',
  'solid/toilet-paper.svg',
  'solid/toilet-portable.svg',
  'solid/toilet.svg',
  'solid/tomato.svg',
  'solid/tombstone.svg',
  'solid/toolbox.svg',
  'solid/tooth.svg',
  'solid/toothbrush.svg',
  'solid/torii-gate.svg',
  'solid/tornado.svg',
  'solid/tower-broadcast.svg',
  'solid/tower-cell.svg',
  'solid/tower-control.svg',
  'solid/tower-observation.svg',
  'solid/tractor.svg',
  'solid/trademark.svg',
  'solid/traffic-cone.svg',
  'solid/traffic-light.svg',
  'solid/trailer.svg',
  'solid/train-subway-tunnel.svg',
  'solid/train-subway.svg',
  'solid/train-track.svg',
  'solid/train-tram.svg',
  'solid/train-tunnel.svg',
  'solid/train.svg',
  'solid/transformer-bolt.svg',
  'solid/transgender.svg',
  'solid/transporter.svg',
  'solid/trash-can.svg',
  'solid/trash.svg',
  'solid/treasure-chest.svg',
  'solid/tree-christmas.svg',
  'solid/tree-palm.svg',
  'solid/tree.svg',
  'solid/triangle-exclamation.svg',
  'solid/triangle-person-digging.svg',
  'solid/triangle.svg',
  'solid/tricycle.svg',
  'solid/trophy.svg',
  'solid/trowel.svg',
  'solid/truck-fire.svg',
  'solid/truck-monster.svg',
  'solid/truck-pickup.svg',
  'solid/truck-plow.svg',
  'solid/truck-tow.svg',
  'solid/truck.svg',
  'solid/trumpet.svg',
  'solid/tty.svg',
  'solid/turkey.svg',
  'solid/turntable.svg',
  'solid/turtle.svg',
  'solid/tv-retro.svg',
  'solid/tv.svg',
  'solid/typewriter.svg',
  'solid/ufo.svg',
  'solid/umbrella-beach.svg',
  'solid/umbrella.svg',
  'solid/unicorn.svg',
  'solid/uniform-martial-arts.svg',
  'solid/universal-access.svg',
  'solid/unlock.svg',
  'solid/up-right-and-down-left-from-center.svg',
  'solid/up-right-from-square.svg',
  'solid/up.svg',
  'solid/upload.svg',
  'solid/usb-drive.svg',
  'solid/user-alien.svg',
  'solid/user-astronaut.svg',
  'solid/user-bounty-hunter.svg',
  'solid/user-chef.svg',
  'solid/user-cowboy.svg',
  'solid/user-crown.svg',
  'solid/user-doctor-hair-long.svg',
  'solid/user-doctor-hair.svg',
  'solid/user-doctor.svg',
  'solid/user-graduate.svg',
  'solid/user-group.svg',
  'solid/user-hair-buns.svg',
  'solid/user-helmet-safety.svg',
  'solid/user-injured.svg',
  'solid/user-ninja.svg',
  'solid/user-nurse-hair-long.svg',
  'solid/user-nurse-hair.svg',
  'solid/user-pilot.svg',
  'solid/user-police.svg',
  'solid/user-robot.svg',
  'solid/user-secret.svg',
  'solid/user-shakespeare.svg',
  'solid/user-visor.svg',
  'solid/user.svg',
  'solid/users.svg',
  'solid/utensils.svg',
  'solid/utility-pole.svg',
  'solid/vacuum-robot.svg',
  'solid/vacuum.svg',
  'solid/van-shuttle.svg',
  'solid/vault.svg',
  'solid/vent-damper.svg',
  'solid/venus-mars.svg',
  'solid/venus.svg',
  'solid/vest.svg',
  'solid/vial.svg',
  'solid/video.svg',
  'solid/vihara.svg',
  'solid/violin.svg',
  'solid/virus-covid.svg',
  'solid/virus.svg',
  'solid/voicemail.svg',
  'solid/volcano.svg',
  'solid/volleyball.svg',
  'solid/volume.svg',
  'solid/waffle.svg',
  'solid/wagon-covered.svg',
  'solid/walker.svg',
  'solid/walkie-talkie.svg',
  'solid/wallet.svg',
  'solid/wand-magic-sparkles.svg',
  'solid/wand-magic.svg',
  'solid/wand-sparkles.svg',
  'solid/warehouse.svg',
  'solid/washing-machine.svg',
  'solid/watch-calculator.svg',
  'solid/watch-smart.svg',
  'solid/watch.svg',
  'solid/water.svg',
  'solid/watermelon-slice.svg',
  'solid/wave-pulse.svg',
  'solid/wave.svg',
  'solid/waveform.svg',
  'solid/webhook.svg',
  'solid/weight-hanging.svg',
  'solid/weight-scale.svg',
  'solid/whale.svg',
  'solid/wheat.svg',
  'solid/wheelchair.svg',
  'solid/whiskey-glass-ice.svg',
  'solid/whistle.svg',
  'solid/wifi.svg',
  'solid/wind-turbine.svg',
  'solid/wind.svg',
  'solid/window-frame.svg',
  'solid/windsock.svg',
  'solid/wine-bottle.svg',
  'solid/wine-glass-crack.svg',
  'solid/wine-glass.svg',
  'solid/worm.svg',
  'solid/wreath-laurel.svg',
  'solid/wreath.svg',
  'solid/wrench.svg',
  'solid/x-ray.svg',
  'solid/xmark.svg',
  'solid/yin-yang.svg',
];

$kitDir = dirname(__DIR__) . '/node_modules/@awesome.me/kit-ddaed3f5c5';
$kitSvgsDir = "$kitDir/icons/svgs";
$iconsDir = dirname(__DIR__) . '/src/icons';
$metaPath = "$kitDir/icons/metadata/icons.json";
$meta = json_decode(file_get_contents($metaPath), true);
$index = [];

$skipped = 0;
$wrote = 0;

foreach ($icons as $icon) {
    $npmPath = "$kitSvgsDir/$icon";
    if (!file_exists($npmPath)) {
        echo "Skipping $icon\n";
        $skipped++;
        continue;
    }

    $contents = file_get_contents($npmPath);
    $contents = preg_replace('/<!--.*?-->/', '', $contents);
    $iconPath = "$iconsDir/$icon";
    echo "Writing $icon ... ";
    file_put_contents($iconPath, $contents);
    echo "done\n";
    $wrote++;

    if (str_starts_with($icon, 'regular/') || str_starts_with($icon, 'solid/')) {
        $name = pathinfo($icon, PATHINFO_FILENAME);
        if (isset($meta[$name])) {
            $terms = $meta[$name]['search']['terms'] ?? [];
            $index[$name] = [
                'name' => sprintf(" %s ", Search::normalizeKeywords($name)),
                'terms' => sprintf(" %s ", Search::normalizeKeywords($terms)),
            ];
        }
    }
}

echo "Finished writing $wrote icons ($skipped skipped).\n";

echo 'Copying LICENSE.txt ... ';
copy("$kitDir/LICENSE.txt", "$iconsDir/LICENSE.txt");
echo "done\n";

echo 'Writing index ... ';
ksort($index);
$indexPath = "$iconsDir/index.php";
$arr = var_export($index, true);
$indexContents = <<<PHP
<?php
return $arr;
PHP;
file_put_contents($indexPath, $indexContents);
echo "done\n";
