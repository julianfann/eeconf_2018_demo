<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Partner_content
 */
class Partner_content {

    /**
     * Fetch content feed
     */
    public function fetch()
    {
        $data = ee('partner_content:feed')->fetch();
        return ee()->TMPL->parse_variables(ee()->TMPL->tagdata, $data);
    }
}