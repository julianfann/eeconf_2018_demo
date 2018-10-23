<?php

use Vmg\PartnerContent\Service\Feed;

return array(
    'author'            => 'Vector Media Group',
    'author_url'        => 'https://vectormediagroup.com',
    'description'       => 'Fetches Partner Content',
    'name'              => 'Partner Content',
    'namespace'         => 'Vmg\PartnerContent',
    'settings_exist'    => false,
    'version'           => '1.0',
    'services'	  => [
        'feed'	=> function($addon){
            $affiliateId = ee('Config')->get('partner_content:config.affiliate_id');
            return new Feed($affiliateId);
        }
    ],
);