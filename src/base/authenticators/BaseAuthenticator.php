<?php
/**
 * @link https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license https://craftcms.github.io/license/
 */

namespace craft\base\authenticators;

use craft\base\Component;

/**
 * Base authenticator class to be extended for authenticators
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 4.3.0
 */
abstract class BaseAuthenticator extends Component implements AuthenticatorInterface
{
    /**
     * @var string|null Handle
     */
    public ?string $handle = null;

    /**
     * @var string|null Label
     */
    public ?string $label = null;
}