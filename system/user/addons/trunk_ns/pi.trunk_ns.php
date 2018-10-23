<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Trunk_Ns
 */
class Trunk_Ns {

    /**
     * The truncation config
     * @var array
     */
    protected $config;

    /**
     * The truncate vendor class
     * @var array
     */
    protected $truncater;

    public function __construct()
    {
        ee()->config->load('trunk_ns', true);
        $defaultConfig = ee()->config->item('trunk_ns', 'trunk_ns');
        $userConfig = ee()->config->item('trunk');

        if(is_null($userConfig)){
            $userConfig = [];
        }
        $this->config = array_replace($defaultConfig, $userConfig);

        // https://github.com/urodoz/truncateHTML
        $this->truncater = new \Urodoz\Truncate\TruncateService();
    }

    /**
     * Truncate
     */
    public function truncate()
    {
        $input = ee()->TMPL->tagdata;
        $length = ee()->TMPL->fetch_param('length', null);
        $ellipses = ee()->TMPL->fetch_param('ellipses', null);
        $preserveWords = ee()->TMPL->fetch_param('preserve_words', null);

        $config = $this->getConfig([
            'length' => $length,
            'ellipses' => $ellipses,
            'preserveWords' => $preserveWords,
        ]);

        $ending = ($config['ellipses']) ? '...' : '';
        $exact = (!$config['preserveWords']) ? true : false;

        return $this->truncater->truncate($input, $config['length'], $ending, $exact, true);
    }

    /**
     * Truncate without preserving words
     */
    public function truncate_characters()
    {
        $input = ee()->TMPL->tagdata;
        $length = ee()->TMPL->fetch_param('length', null);
        $ellipses = ee()->TMPL->fetch_param('ellipses', null);

        $config = $this->getConfig([
            'length' => $length,
            'ellipses' => $ellipses,
            'preserveWords' => false,
        ]);

        $ending = ($config['ellipses']) ? '...' : '';
        $exact = (!$config['preserveWords']) ? true : false;

        return $this->truncater->truncate($input, $config['length'], $ending, $exact, true);
    }

    /**
     * Truncate preserving words
     */
    public function truncate_words()
    {
        $input = ee()->TMPL->tagdata;
        $length = ee()->TMPL->fetch_param('length', null);
        $ellipses = ee()->TMPL->fetch_param('ellipses', null);

        $config = $this->getConfig([
            'length' => $length,
            'ellipses' => $ellipses,
            'preserveWords' => true,
        ]);

        $ending = ($config['ellipses']) ? '...' : '';
        $exact = (!$config['preserveWords']) ? true : false;

        return $this->truncater->truncate($input, $config['length'], $ending, $exact, true);
    }

    /**
     * Get merged config values
     */
    protected function getConfig($passedConfig)
    {
        foreach ($passedConfig as $key => $item){
            if(is_null($item)){
                unset($passedConfig[$key]);
            }
        }
        return array_replace($this->config, $passedConfig);
    }
}