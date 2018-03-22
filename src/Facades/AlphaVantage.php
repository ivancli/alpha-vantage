<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 18/03/2018
 * Time: 9:59 PM
 */

namespace IvanCLi\AlphaVantage\Facades;


use Illuminate\Support\Facades\Facade;

class AlphaVantage extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'AlphaVantage';
    }
}