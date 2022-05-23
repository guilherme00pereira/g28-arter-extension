<?php
/*
Plugin Name: G28 Arter Extension
Plugin URI: #
Description: Extend Arter Plugin Funcionalities
Version: 1.0.0
Author: Guilherme Pereira
Author URI: #
*/

use G28\ArterExtension\Startup;

if ( ! defined( 'ABSPATH' ) ) exit;

require 'vendor/autoload.php';

$startup = Startup::getInstance();
$startup->run( __FILE__ );