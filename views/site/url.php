<?php
/**
 * Created by PhpStorm.
 * User: lex
 * Date: 09.12.2016
 * Time: 19:20
 */

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

\app\assets\UrlAsset::register($this);

$this->title = 'Url';
$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'header' => '<h2>Запрашиваемая страница</h2>',
    'id' => 'urlModal',
    'closeButton' => [],
    'size' => Modal::SIZE_LARGE,
    'footer' => Html::button('Закрыть', ['class' => 'btn', 'data-dismiss' => 'modal']),
]);

echo '<div class="text-modal" id="result"></div>';

Modal::end();
?>

<div class="site-login">
    <?php $form = ActiveForm::begin([
        'id' => 'url-form',
        'layout' => 'inline',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= Html::input('text', 'url', '', [
        'id' => 'url',
        'class' =>'form-control',
        'placeholder' => 'Введите url адрес',
        'style' => 'width: 500px;'
    ]) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::button('Показать', [
                    'class' => 'btn btn-primary',
                    'id' => 'view-button']
            ) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
