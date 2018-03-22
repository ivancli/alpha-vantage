<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 19/03/2018
 * Time: 7:17 PM
 */

namespace IvanCLi\AlphaVantage\Components;


use IvanCLi\AlphaVantage\Confs\APIKey;
use IvanCLi\Libraries\Requestable;

/**
 * Class StockBuilder
 * @package IvanCLi\Components
 */
class StockBuilder
{
    use APIKey, Requestable;

    /**
     * https://www.alphavantage.co/documentation/#intraday
     *
     * @param string $symbol
     * @param int $interval_by_minute
     * @param string $output_size
     * @param string $data_type
     * @return mixed
     * @throws \Exception
     */
    public function intraday(string $symbol, int $interval_by_minute = 1, string $output_size = 'compact', string $data_type = 'json')
    {
        $response = $this->get([
            'query' => [
                'function' => 'TIME_SERIES_INTRADAY',
                'symbol' => $symbol,
                'interval' => "{$interval_by_minute}min",
                'outputsize' => $output_size,
                'datatype' => $data_type,
                'apikey' => $this->getAPIKey(),
            ]
        ]);

        return $response->content;
    }

    /**
     * https://www.alphavantage.co/documentation/#daily
     *
     * @param string $symbol
     * @param string $output_size
     * @param string $data_type
     * @return mixed
     * @throws \Exception
     */
    public function daily(string $symbol, string $output_size = 'compact', string $data_type = 'json')
    {
        $response = $this->get([
            'query' => [
                'function' => 'TIME_SERIES_DAILY',
                'symbol' => $symbol,
                'outputsize' => $output_size,
                'datatype' => $data_type,
                'apikey' => $this->getAPIKey(),
            ]
        ]);

        return $response->content;
    }

    /**
     * https://www.alphavantage.co/documentation/#dailyadj
     *
     * @param string $symbol
     * @param string $output_size
     * @param string $data_type
     * @return mixed
     * @throws \Exception
     */
    public function dailyAdjusted(string $symbol, string $output_size = 'compact', string $data_type = 'json')
    {
        $response = $this->get([
            'query' => [
                'function' => 'TIME_SERIES_DAILY_ADJUSTED',
                'symbol' => $symbol,
                'outputsize' => $output_size,
                'datatype' => $data_type,
                'apikey' => $this->getAPIKey(),
            ]
        ]);

        return $response->content;
    }

    /**
     * https://www.alphavantage.co/documentation/#weekly
     *
     * @param string $symbol
     * @param string $data_type
     * @return mixed
     * @throws \Exception
     */
    public function weekly(string $symbol, string $data_type = 'json')
    {
        $response = $this->get([
            'query' => [
                'function' => 'TIME_SERIES_WEEKLY',
                'symbol' => $symbol,
                'datatype' => $data_type,
                'apikey' => $this->getAPIKey(),
            ]
        ]);

        return $response->content;
    }

    /**
     * https://www.alphavantage.co/documentation/#weeklyadj
     *
     * @param string $symbol
     * @param string $data_type
     * @return mixed
     * @throws \Exception
     */
    public function weeklyAdjusted(string $symbol, string $data_type = 'json')
    {
        $response = $this->get([
            'query' => [
                'function' => 'TIME_SERIES_WEEKLY_ADJUSTED',
                'symbol' => $symbol,
                'datatype' => $data_type,
                'apikey' => $this->getAPIKey(),
            ]
        ]);

        return $response->content;
    }

    /**
     * https://www.alphavantage.co/documentation/#monthly
     *
     * @param string $symbol
     * @param string $data_type
     * @return mixed
     * @throws \Exception
     */
    public function monthly(string $symbol, string $data_type = 'json')
    {
        $response = $this->get([
            'query' => [
                'function' => 'TIME_SERIES_MONTHLY',
                'symbol' => $symbol,
                'datatype' => $data_type,
                'apikey' => $this->getAPIKey(),
            ]
        ]);

        return $response->content;
    }

    /**
     * https://www.alphavantage.co/documentation/#monthlyadj
     *
     * @param string $symbol
     * @param string $data_type
     * @return mixed
     * @throws \Exception
     */
    public function monthlyAdjusted(string $symbol, string $data_type = 'json')
    {
        $response = $this->get([
            'query' => [
                'function' => 'TIME_SERIES_MONTHLY_ADJUSTED',
                'symbol' => $symbol,
                'datatype' => $data_type,
                'apikey' => $this->getAPIKey(),
            ]
        ]);

        return $response->content;
    }

    /**
     * https://www.alphavantage.co/documentation/#batchquotes
     *
     * @param string $symbol
     * @param string $data_type
     * @return mixed
     * @throws \Exception
     */
    public function batchStockQuotes(string $symbol, string $data_type = 'json')
    {
        $response = $this->get([
            'query' => [
                'function' => 'BATCH_STOCK_QUOTES',
                'symbol' => $symbol,
                'datatype' => $data_type,
                'apikey' => $this->getAPIKey(),
            ]
        ]);

        return $response->content;
    }
}