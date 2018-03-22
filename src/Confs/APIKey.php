<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 18/03/2018
 * Time: 10:41 PM
 */

namespace IvanCLi\AlphaVantage\Confs;


/**
 * Trait APIKey
 * @package IvanCLi\AlphaVantage\Confs
 */
trait APIKey
{
    /**
     * @var string
     */
    protected $cacheName = 'ivancli/alpha-vantage:api_key';

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @param string $key
     * @param bool $cached
     * @throws \Exception
     */
    public function setAPIKey(string $key, bool $cached = true)
    {
        $this->removeAPIKey();
        if ($cached === true) {
            $this->apiKey = cache()->remember($this->cacheName, 60, function () use ($key) {
                return $key;
            });
        } else {
            $this->apiKey = $key;
        }
    }

    /**
     * @return \Illuminate\Cache\CacheManager|mixed
     * @throws \Exception
     */
    public function getAPIKey()
    {
        if (cache()->has($this->cacheName)) {
            $this->apiKey = cache($this->cacheName);
        }
        return $this->apiKey;
    }

    /**
     * @throws \Exception
     */
    public function removeAPIKey()
    {
        cache()->forget($this->cacheName);
        $this->apiKey = null;
    }
}