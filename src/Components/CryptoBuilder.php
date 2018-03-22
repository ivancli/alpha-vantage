<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 19/03/2018
 * Time: 7:19 PM
 */

namespace IvanCLi\AlphaVantage\Components;


use IvanCLi\AlphaVantage\Confs\APIKey;
use IvanCLi\Libraries\Requestable;

class CryptoBuilder
{
    use APIKey, Requestable;

    /**
     * https://www.alphavantage.co/documentation/#currency-intraday
     *
     * @param string $symbol
     * @param string $market
     * @return mixed
     * @throws \Exception
     */
    public function intraday(string $symbol, string $market)
    {
        $response = $this->get([
            'query' => [
                'function' => 'DIGITAL_CURRENCY_INTRADAY',
                'symbol' => $symbol,
                'market' => $market,
                'apikey' => $this->getAPIKey(),
            ]
        ]);

        return $response->content;
    }

    /**
     * https://www.alphavantage.co/documentation/#currency-daily
     *
     * @param string $symbol
     * @param string $market
     * @return mixed
     * @throws \Exception
     */
    public function daily(string $symbol, string $market)
    {
        $response = $this->get([
            'query' => [
                'function' => 'DIGITAL_CURRENCY_DAILY',
                'symbol' => $symbol,
                'market' => $market,
                'apikey' => $this->getAPIKey(),
            ]
        ]);

        return $response->content;
    }

    /**
     * https://www.alphavantage.co/documentation/#currency-weekly
     *
     * @param string $symbol
     * @param string $market
     * @return mixed
     * @throws \Exception
     */
    public function weekly(string $symbol, string $market)
    {
        $response = $this->get([
            'query' => [
                'function' => 'DIGITAL_CURRENCY_WEEKLY',
                'symbol' => $symbol,
                'market' => $market,
                'apikey' => $this->getAPIKey(),
            ]
        ]);

        return $response->content;
    }

    /**
     * https://www.alphavantage.co/documentation/#currency-monthly
     *
     * @param string $symbol
     * @param string $market
     * @return mixed
     * @throws \Exception
     */
    public function monthly(string $symbol, string $market)
    {
        $response = $this->get([
            'query' => [
                'function' => 'DIGITAL_CURRENCY_MONTHLY',
                'symbol' => $symbol,
                'market' => $market,
                'apikey' => $this->getAPIKey(),
            ]
        ]);

        return $response->content;
    }
}