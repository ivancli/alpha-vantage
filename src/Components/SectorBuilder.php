<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 19/03/2018
 * Time: 9:05 PM
 */

namespace IvanCLi\AlphaVantage\Components;


use IvanCLi\AlphaVantage\Confs\APIKey;
use IvanCLi\Libraries\Requestable;

class SectorBuilder
{
    use APIKey, Requestable;

    /**
     * https://www.alphavantage.co/documentation/#sector-information
     *
     * @return mixed
     * @throws \Exception
     */
    public function sector()
    {
        $response = $this->get([
            'query' => [
                'function' => 'CURRENCY_EXCHANGE_RATE',
                'apikey' => $this->getAPIKey(),
            ]
        ]);

        return $response->content;
    }
}