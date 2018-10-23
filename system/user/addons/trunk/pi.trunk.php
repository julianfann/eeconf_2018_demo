<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Trunk
 */
class Trunk {

    /**
     * Truncate
     */
    public function truncate()
    {
        $input = ee()->TMPL->tagdata;
        $length = ee()->TMPL->fetch_param('length', null);
        $ellipses = ee()->TMPL->fetch_param('ellipses', null);
        $preserveWords = ee()->TMPL->fetch_param('preserve_words', null);

        return ee('trunk:truncate')->truncate($input, $length, $ellipses, $preserveWords);
    }

    /**
     * Truncate without preserving words
     */
    public function truncate_characters()
    {
        $input = ee()->TMPL->tagdata;
        $length = ee()->TMPL->fetch_param('length', null);
        $ellipses = ee()->TMPL->fetch_param('ellipses', null);

       return ee('trunk:truncate')->truncateCharacters($input, $length, $ellipses);
    }

    /**
     * Truncate preserving words
     */
    public function truncate_words()
    {
        $input = ee()->TMPL->tagdata;
        $length = ee()->TMPL->fetch_param('length', null);
        $ellipses = ee()->TMPL->fetch_param('ellipses', null);

        return ee('trunk:truncate')->truncateWords($input, $length, $ellipses);
    }
}