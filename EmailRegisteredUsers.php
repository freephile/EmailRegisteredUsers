<?php
/**
 * Extension: EmailRegisteredUsers
 *
 * Intellectual Reserve, Inc.(c) 2008
 *
 * Started: 04-29-2008 (Based on EmailUsers by Andy Cook)
 *
 * REQUIRED settings for LocalSettings.php
 * Extension for emailing all registered users.
 * $wgEmailRegisteredUsersEmailAddress = 'stringhamdb@ldschurch.org';
 * $wgEmailRegisteredUsersSubject = 'Familysearch Wiki Email';
 * require_once("$IP/extensions/EmailRegisteredUsers/EmailRegisteredUsers.php");
 *
 * @file
 * @author Don B. Stringham (stringhamdb@ldschurch.org)
 */


# Not a valid entry point, skip unless MEDIAWIKI is defined
if (!defined('MEDIAWIKI')) {
	echo <<<EOT
To install the EmailRegisteredUsers extension, put the following line in LocalSettings.php:
require_once( "\$IP/extensions/EmailRegisteredUsers/EmailRegisteredUsers.php" );
EOT;
	exit(1);
}

$dir = dirname(__FILE__) . '/';

# Users must belong to this group to send emails (empty string means anyone can send)
$wgEmailUsersGroup = 'Moderator';

# Allow anonymous sending from these addresses
$wgEmailUsersAllowRemoteAddr = array('127.0.0.1');

# Whether to allow sending to all users (the "user" group)
$wgEmailUsersAllowAllUsers = true;

# Who can send emails
if ($wgEmailUsersGroup) {
	$wgGroupPermissions[$wgEmailUsersGroup][$wgEmailUsersGroup] = true;
}

$wgAutoloadClasses['EmailRegisteredUsers'] = $dir . 'EmailRegisteredUsers_body.php';
$wgExtensionMessagesFiles['EmailRegisteredUsers'] = $dir . 'EmailRegisteredUsers.i18n.php';

// setup the special pages
$wgSpecialPages['EmailRegisteredUsers'] = 'EmailRegisteredUsers';
$wgSpecialPageGroups['EmailRegisteredUsers'] = 'users'; //Added for MW 1.xx.xx+ special pages.

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'EmailRegisteredUsers',
	'author' => 'Don Stringham',
	'version' => '0.2.0',
	'url' => 'http://wiki.familysearch.org',
	'description' => 'Send an email to users registered on the Wiki.'
);
