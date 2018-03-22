<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 18/03/2018
 * Time: 9:54 PM
 */

namespace IvanCLi\AlphaVantage;


use IvanCLi\AlphaVantage\Confs\APIKey;
use IvanCLi\AlphaVantage\Components\CryptoBuilder;
use IvanCLi\AlphaVantage\Components\ForeignBuilder;
use IvanCLi\AlphaVantage\Components\SectorBuilder;
use IvanCLi\AlphaVantage\Components\StockBuilder;
use IvanCLi\AlphaVantage\Components\TechnicalBuilder;

class AlphaVantageService
{
    use APIKey;

    protected $builder;

    /**
     * AlphaVantageService constructor.
     * @param string $apiKey
     * @throws \Exception
     */
    public function __construct(string $apiKey = null)
    {
        if (is_null($apiKey)) {
            throw new \RuntimeException('API Key is null.');
        }

        $this->setAPIKey($apiKey);
    }

    /**
     * @return StockBuilder
     */
    public function stock()
    {
        $this->builder = new StockBuilder;
        return $this->builder;
    }

    /**
     * @return ForeignBuilder
     */
    public function foreign()
    {
        $this->builder = new ForeignBuilder;
        return $this->builder;
    }

    /**
     * @return CryptoBuilder
     */
    public function crypto()
    {
        $this->builder = new CryptoBuilder;
        return $this->builder;
    }

    /**
     * @return TechnicalBuilder
     */
    public function technical()
    {
        $this->builder = new TechnicalBuilder;
        return $this->builder;
    }

    /**
     * @return SectorBuilder
     */
    public function sector()
    {
        $this->builder = new SectorBuilder;
        return $this->builder;
    }
}