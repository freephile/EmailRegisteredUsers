<?php
/**
 * Extension: EmailRegisteredUsers
 *
 * Intellectual Reserve, Inc.(c) 2008
 *
 * Started: 04-29-2008 (Based on EmailUsers by Andy Cook)
 *
 * @file
 * @author Don B. Stringham (stringhamdb@ldschurch.org)
 */

require(dirname(__FILE__) . '/EmailRegisteredUsers.i18n.php');

class EmailRegisteredUsers extends SpecialPage
{
	var $recipients = array();
	var $addl_recipients = array();
	var $addl_recip_str;
	var $title;
	var $subject;
	var $header;
	var $message;
	var $group;

	function EmailRegisteredUsers($group = null)
	{
		global $wgEmailUsersGroup;

		//added by RWF
		$this->group = $group;

		# Ready to send the message, these are set in LocalSettings.php
		global $wgEmailRegisteredUsersEmailAddress, $wgEmailRegisteredUsersSubject;

		parent::__construct("EmailRegisteredUsers", $wgEmailUsersGroup);
	}

	function execute($par)
	{
		global $wgRequest, $wgOut;

		if (self::checkPermissions()) {
			# We passed all permission checks go ahead and email....
			$this->setHeaders();
			$action = $wgRequest->getText('action');
			# Get info from request or set to defaults
			$this->title = isset($_REQUEST['ea_title']) ? $_REQUEST['ea_title'] : '$param';
			$this->subject = isset($_REQUEST['ea_subject']) ? $_REQUEST['ea_subject'] : '';
			$this->header = isset($_REQUEST['ea_header']) ? $_REQUEST['ea_header'] : '';
			$this->message = isset($_REQUEST['ea_message']) ? $_REQUEST['ea_message'] : '';
			$this->group = isset($_REQUEST['ea_group']) ? $_REQUEST['ea_group'] : '';
			$this->addl_recip_str = isset($_REQUEST['ea_list']) ? $_REQUEST['ea_list'] : '';

			if (isset($_REQUEST['ea_send'])) {
				self::sendEmail();
			} else {
				self::showForm();
			}
		}
	}

	function showForm()
	{
		global $wgOut, $wfMsg, $wgUser, $wgGroupPermissions;
		global $wgRequest, $wgEmailUsersAllowAllUsers;

		# Get the data necessary to create the appropriate action statement.
		$special = Title::makeTitle(NS_SPECIAL, 'EmailRegisteredUsers');
		$action = $special->getLocalURL('action=submit');

		# Create the select list of email groups
		$group = '<option/>';
		foreach (array_keys($wgGroupPermissions) as $group) {
			if ($group != '*') {
				$selected = $group == $this->group ? ' selected' : '';
				if ($wgEmailUsersAllowAllUsers || $group != 'user') {
					$group .= "<option$selected>$group</option>";
				}
			}
		}

		# Render form
		$special = Title::makeTitle(NS_SPECIAL, 'EmailRegisteredUsers');
		$wgOut->addHTML(Xml::element('form', array(
			'class' => 'EmailRegisteredUsers',
			'action' => $special->getLocalURL('action=submit'),
			'method' => 'POST'
		), null));
		$wgOut->addHTML('<fieldset><legend>' . wfMessage( 'ea_selectrecipients') . '</legend>');
		$wgOut->addHTML('<table style="padding:0;margin:0;border:none;">');

		# Allow selection of a group
		$groups = '<option/>';
		foreach (array_keys($wgGroupPermissions) as $group) {
			if ($group != '*') {
				$selected = $group == $this->group ? ' selected' : '';
				if ($wgEmailUsersAllowAllUsers || $group != 'user') {
					$groups .= "<option$selected>$group</option>";
				}
			}
		}
		$wgOut->addHTML("<tr><td>From group:</td><td><select name=\"ea_group\">$groups</select></td></tr>\n");
		$wgOut->addHTML('</table>');

		# Addition of named list
		$wgOut->addWikiText(wfMessage( 'ea_selectlist'));
		$wgOut->addHTML("<textarea name=\"ea_list\" rows=\"1\">{$this->addl_recip_str}</textarea><br />\n");
		$wgOut->addHTML('</fieldset>');
		$wgOut->addHTML('<fieldset><legend>' . wfMessage( 'ea_compose') . '</legend>');

		# Subject
		$wgOut->addWikiText(wfMessage( 'ea_subject'));
		$wgOut->addHTML(Xml::element('input', array('type' => 'text', 'name' => 'ea_subject', 'value' => $this->subject, 'style' => "width:100%")));

		# Header
		$wgOut->addWikiText(wfMessage( 'ea_header'));
		$wgOut->addHTML('<textarea name="ea_message" rows="10">' . $this->message . '</textarea><br />');
		$wgOut->addHTML('</fieldset>');

		# Submit buttons & hidden values
		$wgOut->addHTML(Xml::element('input', array('type' => 'submit', 'name' => 'ea_send', 'value' => wfMessage( 'ea_send'))));
		$wgOut->addHTML(Xml::element('input', array('type' => 'submit', 'name' => 'ea_show', 'value' => wfMessage( 'ea_show'))));
		$wgOut->addHTML(Xml::element('input', array('type' => 'hidden', 'name' => 'ea_title', 'value' => $this->title)));
		$wgOut->addHTML('</form>');

		# If the show button was clicked, render the list
		if (isset($_REQUEST['ea_show'])) {
			self::showRecipients();
		}
	}

	function sendEmail()
	{
		global $wgOut;

		$status = array();
		$count = self::getRecipients();
		if ($count > 0) {
			foreach ($this->recipients as $recipient) {
				$status[$recipient] = self::sendMail($recipient);
			}
		}
		$count = self::getAddlRecipients();
		if ($count > 0) {
			foreach ($this->addl_recipients as $recipient) {
				$status[$recipient] = self::sendMail($recipient);
			}
		}
		self::showStatus($status);
	}

	function sendMail($emailAddr)
	{
		global $wgUser;

		# Get a FROM email address.
		$headers = "From: " . $wgUser->getEmail();

		# Setup the subject, we don't want it blank.
		if ($this->subject == '') {
			$this->subject = "FamilySearch Research Wiki";
		}

		if (mail($emailAddr, $this->subject, $this->message, $headers)) {
			return 0; //sent
		}

		return 1; //failed
	}

	function showStatus($status)
	{
		global $wgOut;

		$successful = 0;
		$failure = 0;
		$recipients = array_keys($status);

		foreach ($recipients as $recipient) {
			if ($status[$recipient] == 1) {
				$failure = $failure + 1;
				$wgOut->addWikiText(wfMessage( 'ea_error', $recipient));
			} else if ($status[$recipient] == 0) {
				$successful = $successful + 1;
				//$wgOut->addWikiText("'''".$recipient."''' was sent an email.");
			}
		}

		$wgOut->addWikiText(wfMessage( 'ea_sent', $successful));
	}

	function showRecipients()
	{
		global $wgOut;

		$count = self::getRecipients();
		if ($count > 0) {
			$msg = wfMessage( 'ea_listrecipients', $count);
			foreach ($this->recipients as $recipient) {
				$msg .= '<li><a href="mailto:' . $recipient . '">' . $recipient . '</a></li>';
			}
			$msg .= "</ul>";
		} else {
			$msg = wfMessage( 'ea_norecipients', $this->title);
		}

		$count = self::getAddlRecipients();
		if ($count > 0) {
			$msg .= wfMessage( 'ea_listaddlrecipients', $count);
			foreach ($this->addl_recipients as $recipient) {
				$msg .= '<li><a href="mailto:' . $recipient . '">' . $recipient . '</a></li>';
			}
			$msg .= "</ul>";
		} else {
			$msg .= wfMessage( 'ea_noaddlrecipients', $this->title);
		}
		$wgOut->addHTML($msg);
	}

	function getAddlRecipients()
	{
		$this->addl_recipients = explode(";", $this->addl_recip_str);
		if ($this->addl_recipients[0] == "") {
			return 0;
		}
		return (count($this->addl_recipients));
	}

	function getRecipients()
	{
		global $wgEmailUsersAllowAllUsers;
		# Get a database connection.
		$db = & wfGetDB(DB_SLAVE);
		# Get email addresses from users in selected group
		if ($this->group && ($wgEmailUsersAllowAllUsers || $this->group != 'user')) {
			$u = str_replace('`', '', $db->tableName('user'));
			$ug = str_replace('`', '', $db->tableName('user_groups'));
			if ($this->group == 'user')
				$sql = "SELECT user_email FROM $u WHERE user_email != ''";
			else
				$sql = "SELECT $u.user_email FROM $u,$ug WHERE $ug.ug_user = $u.user_id AND $ug.ug_group = '{$this->group}'";
			$result = $db->query($sql);
			if ($result instanceof ResultWrapper) {
				$result = $result->result;
			}
			while ($row = $db->fetchRow($result)) {
				$this->addRecipient($row[0]);
			}
			return count($this->recipients);
		}
		return 0;
	}

	# Add a recipient the list
	function addRecipient($recipient)
	{
		if (is_object($recipient) && $recipient->exists()) {
			$article = new Article($recipient);
			if (preg_match('/[a-z0-9_.-]+@[a-z0-9_.-]+/i', $article->getContent(), $emails)) {
				$recipient = $emails[0];
			} else {
				$recipient = '';
			}
		}
		if ($valid = Sanitizer::validateEmail($recipient)) {
			$this->recipients[] = $recipient;
		}
		return $valid;
	}

	// TODO FHS-6025 - determine if this method is needed
	function loadMessages($title, &$message)
	{
		return true;
	}

	function checkPermissions()
	{
		# True is the user passed the permissions check, otherwise false.
		global $wgEnableEmail, $wgEnableUserEmail, $wgUser, $wgOut;
		# Check email and user permissions for security.
		if (!($wgEnableEmail && $wgEnableUserEmail)) {
			$wgOut->showErrorPage("nosuchspecialpage", "nospecialpagetext");
			return false;
		}
		if (!$wgEnableEmail) {
			$wgOut->showErrorPage("nosuchspecialpage", "nospecialpagetext");
			return false;
		}
		if (!$wgUser->canSendEmail()) {
			wfDebug("User can't send.\n");
			$wgOut->showErrorPage("mailnologin", "mailnologintext");
			return false;
		}
		if ($wgUser->isBlockedFromEmailUser()) {
			// User has been blocked from sending e-mail. Show the std blocked form.
			wfDebug("User is blocked from sending e-mail.\n");
			$wgOut->blockedPage();
			return false;
		}
		return true;
	}
}