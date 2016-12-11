<?php
/**
 * Created by PhpStorm.
 * User: lex
 * Date: 08.12.2016
 * Time: 22:08
 */

namespace app\models;


use app\components\Money;
use yii\base\Model;

class MoneyForm extends Model
{
    /**
     * Смс сообщение с информацией
     * @var string
     */
    public $sms;

    /**
     * Код подтверждения
     * @var string
     */
    public $code;

    /**
     * Сумма перевода
     * @var double
     */
    public $price;

    /**
     * Номер кошелька
     * @var string
     */
    public $purse;


    public function rules()
    {
        return [
            ['sms', 'required'],
        ];
    }

    public function verify()
    {
        if ($this->validate()) {
            /** @var Money $money */
            $money  = \Yii::$app->money;
            $money->parse($this->sms);

            $this->code = $money->code;
            $this->price = $money->price;
            $this->purse = $money->purse;

            return true;
        }

        return false;
    }
}