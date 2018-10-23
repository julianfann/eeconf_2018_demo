<?php
namespace Vmg\PartnerContent\Service;

/**
 * Class Feed
 * @package Vmg\PartnerContent\Service
 */
/**
 * Class Feed
 * @package Vmg\PartnerContent\Service
 */
class Feed {

    /**
     * Content Network Affiliate ID
     * @var array
     */
    protected $affiliateId;

    /**
     * PartnerContent constructor.
     * @param string $affiliateId The content network affiliate id
     */
    public function __construct($affiliateId)
    {
        $this->affiliateId = $affiliateId;
    }

    /**
     * Fetch feed items and manipulate for our purposes
     * @param boolean $randomize should we randomize the result order?
     * @return array content feed items
     */
    public function fetch($randomize = true)
    {
        $data = [];
        $articles = $this->getFeed();
        foreach ($articles as $article){
            $article['excerpt'] = ee('trunk:truncate')->truncateWords($article['excerpt'], 100, true);
            $article['url'] .= '&affilliate_id=' . $this->affiliateId;
            $data[] = $article;
        }

        if($randomize){
            shuffle($data);
        }

        return $data;
    }

    /**
     * Get the content feed
     * @return array the content feed items
     */
    protected function getFeed()
    {
        return ee('Config')->get('partner_content:config.articles');
    }
}