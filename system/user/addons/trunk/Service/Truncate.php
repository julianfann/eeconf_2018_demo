<?php
namespace Vmg\Trunk\Service;

/**
 * Class Truncate
 * @package Vmg\Trunk\Service
 */
class Truncate {

    /**
     * The global config
     * @var array
     */
    protected $config;

    /**
     * The truncate vendor class
     * @var array
     */
    protected $truncater;

    /**
     * Truncate constructor.
     * @param array $defaultConfig The default addon config
     * @param array $userConfig Any defined user config
     */
    public function __construct($defaultConfig, $userConfig = [])
    {
        $this->config = array_replace($defaultConfig, $userConfig);

        // https://github.com/urodoz/truncateHTML
        $this->truncater = new \Urodoz\Truncate\TruncateService();
    }

    /**
     * Truncate string to length
     * @param string $input The string to truncate
     * @param int $length The max length of the truncated string
     * @param bool $ellipses Add ellipses after the truncated string?
     * @param bool $preserveWords Preserve whole words?
     * @return string The truncated string
     */
    public function truncate($input, $length = null, $ellipses = null, $preserveWords = null)
    {
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
     * Truncate string to length without preserving whole words
     * @param string $input The string to truncate
     * @param int $length The max length of the truncated string
     * @param bool $ellipses Add ellipses after the truncated string
     * @return string The truncated string
     */
    public function truncateCharacters($input, $length = null, $ellipses = null)
    {
        return $this->truncate($input, $length, $ellipses, false);
    }

    /**
     * Truncate string to length preserving whole words
     * @param string $input The string to truncate
     * @param int $length The max length of the truncated string
     * @param bool $ellipses Add ellipses after the truncated string
     * @return string The truncated string
     */
    public function truncateWords($input, $length = null, $ellipses = null)
    {
        return $this->truncate($input, $length, $ellipses, true);
    }

    /**
     * Gets the merged value of the global and passed config
     * @param array $passedConfig Config values passed directly to the method
     * @return array The merged config values
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