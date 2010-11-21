<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

// Load the config
require 'application/config/config.php';
require 'application/i18n/' . $config['i18n'];
if ($config['web'] !== 'enabled') {
	exit(WEB_ACCESS_DISABLED);
}
