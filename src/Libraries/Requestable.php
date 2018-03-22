<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 19/03/2018
 * Time: 9:24 PM
 */

namespace IvanCLi\AlphaVantage\Libraries;


use GuzzleHttp\Client;

trait Requestable
{
    protected $alpha_vantage_url;

    /**
     * @param array $options
     * @param bool $json_response
     * @return \stdClass
     */
    public function get(array $options = [], bool $json_response = true)
    {
        $client = new Client();
        $response = $client->request('GET', $this->alpha_vantage_url, $options);
        $status = $response->getStatusCode();
        if ($status === 200) {
            if ($json_response === true) {
                $content = json_decode($response->getBody());
                if (is_null($content) || json_last_error() !== JSON_ERROR_NONE) {
                    throw new \RuntimeException('Alpha Vantage response malformed.');
                }
            }
            $newResponse = new \stdClass();
            $newResponse->status = $status;
            $newResponse->content = $content;
            return $newResponse;
        } else {
            throw new \RuntimeException($response->getBody());
        }
    }
}