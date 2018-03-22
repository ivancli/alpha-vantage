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

/**
 * Class ForeignBuilder
 * @package IvanCLi\Components
 */
class ForeignBuilder
{
    use APIKey, Requestable;

    /**
     * https://www.alphavantage.co/documentation/#currency-exchange
     *
     * @param string $from_currency
     * @param string $to_currency
     * @return mixed
     * @throws \Exception
     */
    public function exchangeRates(string $from_currency, string $to_currency)
    {
        $response = $this->get([
            'query' => [
                'function' => 'CURRENCY_EXCHANGE_RATE',
                'from_currency' => $from_currency,
                'to_currency' => $to_currency,
                'apikey' => $this->getAPIKey(),
            ]
        ]);

        return $response->content;
    }
}