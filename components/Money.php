<?php
/**
 * Created by PhpStorm.
 * User: lex
 * Date: 08.12.2016
 * Time: 22:42
 */

namespace app\components;


use yii\base\Object;
use yii\helpers\Json;

class Money extends Object
{
    // Все варианты включить конечно сложно, постарался по максимуму
    private $_templates = [
        'code' => '/(\D|\s|^)[0-9]{4}([\s]|$)([^р^Р]|$)/i',
        'price' => '/(\D|\s|^)[0-9]{1,10}[\.\,]{0,1}[0-9]{0,2}([рР]|[\s][рР])/i',
        'purse' => '/[0-9]{12,15}/i',
    ];

    // Пароль
    private $code = '';
    // Сумма
    private $price = '';
    // Номер кошелька
    private $purse = '';

    /**
     * Разбор смс
     * @param string $sms
     */
    public function parse($sms)
    {
        $mathes = [];

        foreach ($this->_templates as $field => $item) {
            if (preg_match($item, $sms, $mathes)) {
                $value = current($mathes);
                $value = str_replace(',', '.', $value);
                $value = preg_replace('/[^\d\.]+/', '', $value);
                $value = trim($value);
                $this->__set($field, $value);
            } else {
                $this->__set($field, '');
            }
        }
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getPurse()
    {
        return $this->purse;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return Json::encode([
            'code' => $this->code,
            'price' => $this->price,
            'purse' => $this->purse
        ]);
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @param string $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @param string $purse
     * @return $this
     */
    public function setPurse($purse)
    {
        $this->purse = $purse;

        return $this;
    }
}