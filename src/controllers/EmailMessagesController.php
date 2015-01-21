<?php
/**
 * @link http://buildwithcraft.com/
 * @copyright Copyright (c) 2013 Pixel & Tonic, Inc.
 * @license http://buildwithcraft.com/license
 */

namespace craft\app\controllers;

use Craft;
use craft\app\errors\HttpException;
use craft\app\models\RebrandEmail as RebrandEmailModel;
use craft\app\web\Controller;

Craft::$app->requireEdition(Craft::Client);

/**
 * The EmailMessagesController class is a controller that handles various email message tasks such as saving email
 * messages.
 *
 * Note that all actions in the controller require an authenticated Craft session via [[Controller::allowAnonymous]].
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 3.0
 */
class EmailMessagesController extends Controller
{
	// Public Methods
	// =========================================================================

	/**
	 * @inheritDoc Controller::init()
	 *
	 * @throws HttpException
	 * @return null
	 */
	public function init()
	{
		// All email message actions require an admin
		$this->requireAdmin();
	}

	/**
	 * Saves an email message.
	 *
	 * @return null
	 */
	public function actionSaveMessage()
	{
		$this->requirePostRequest();
		$this->requireAjaxRequest();

		$message = new RebrandEmailModel();
		$message->key = Craft::$app->getRequest()->getRequiredBodyParam('key');
		$message->subject = Craft::$app->getRequest()->getRequiredBodyParam('subject');
		$message->body = Craft::$app->getRequest()->getRequiredBodyParam('body');

		if (Craft::$app->isLocalized())
		{
			$message->locale = Craft::$app->getRequest()->getBodyParam('locale');
		}
		else
		{
			$message->locale = Craft::$app->language;
		}

		if (Craft::$app->emailMessages->saveMessage($message))
		{
			$this->returnJson(['success' => true]);
		}
		else
		{
			$this->returnErrorJson(Craft::t('app', 'There was a problem saving your message.'));
		}
	}
}
