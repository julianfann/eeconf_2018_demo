<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$protocol = "https://";
$base_url                       = $protocol . $_SERVER['HTTP_HOST'];
$base_path                      = $_SERVER['DOCUMENT_ROOT'];
$system_folder                  = "cs_admin";
$images_folder                  = "images";
$images_path                    = $base_path . "/" . $images_folder;
$images_url                     = $base_url . "/" . $images_folder;

$config['index_page']           = "";
$config['base_url']             = $base_url . "/";
$config['base_path']            = $base_path;
$config['site_url']             = $config['base_url'];
$config['cp_url']               = $config['base_url'] . $system_folder . "/index.php";
$config['theme_folder_path']    = $base_path . "/themes/";
$config['theme_folder_url']     = $base_url . "/themes/";

$config['is_system_on'] = 'y';
$config['multiple_sites_enabled'] = 'n';
// ExpressionEngine Config Items
// Find more configs and overrides at
// https://docs.expressionengine.com/latest/general/system_configuration_overrides.html

$config['app_version'] = '4.3.6';
$config['encryption_key'] = '93fa56ae5468efd189ed03c9782a185dd8c7910f';
$config['session_crypt_key'] = 'f898d7ef73d734fafdda0516b98d566ce8d9acf6';
$config['database'] = array(
	'expressionengine' => array(
		'hostname' => 'mysql',
		'database' => 'eeconf',
		'username' => 'root',
		'password' => 'root',
		'dbprefix' => 'exp_',
		'char_set' => 'utf8mb4',
		'dbcollat' => 'utf8mb4_unicode_ci',
		'port'     => ''
	),
);

$config['trunk'] = [
    'length' => 600,
    'ellipses' => true
];

// EOF