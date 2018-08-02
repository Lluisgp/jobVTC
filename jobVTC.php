<?php
/**
 * @package jobVTC
 */
/*
Plugin Name: jobVTC
Plugin URI: http://setblau.tk
Description: VTC job generator system for ETS2MP, plugin for wordpress.
Version: Beta 0.0.1
Author: Saarlouis
Author URI: http://setblau.com
*/

defined('ABSPATH') or die('No direct access! Bad user!');

//INSTALLER
require("jobVTC_installer.php"); // User panel widget

register_activation_hook(__FILE__, 'jobVTC_install');
register_deactivation_hook(__FILE__, 'jobVTC_remove');


//ADMIN DASH PAGES
require("jobVTC_admin_front.php"); // Admin dash jobVTC front page

//CONTROLLER
require("jobVTC_controller_ajax.php"); // Test Ajax Controller
