<?php
require_once __DIR__.'/vendor/autoload.php';

use Vmg\Trunk\Service\Truncate;

return array(
    'author'            => 'Vector Media Group',
    'author_url'        => 'https://vectormediagroup.com',
    'description'       => 'Truncate Strings',
    'name'              => 'Trunk',
    'namespace'         => 'Vmg\Trunk',
    'settings_exist'    => false,
    'version'           => '1.0',
    'services'	  => [
        'truncate'	=> function($addon){
            $defaultConfig = ee('Config')->get('trunk:config.trunk');
            $userConfig = ee('Config')->get('config.trunk');
            if(is_null($userConfig)){
                $userConfig = [];
            }
            return new Truncate($defaultConfig, $userConfig);
        }
    ],
);