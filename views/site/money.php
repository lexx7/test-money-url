<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Yandex.Money';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, вставьте текст смс сообщения:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'money-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'sms')->label('Смс')->textarea([
            'autofocus' => true,
            'style' => 'height: 150px;'
        ]) ?>

        <?= $form->field($model, 'code')->label('Пароль')->textInput(['readonly' => true]) ?>
        <?= $form->field($model, 'price')->label('Цена')->textInput(['readonly' => true]) ?>
        <?= $form->field($model, 'purse')->label('Кошелёк')->textInput(['readonly' => true]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Разобрать', ['class' => 'btn btn-primary', 'name' => 'money-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>
