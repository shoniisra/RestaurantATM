<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cli_id') ?>

    <?= $form->field($model, 'cli_nombre') ?>

    <?= $form->field($model, 'cli_apellido') ?>

    <?= $form->field($model, 'cli_direccion') ?>

    <?= $form->field($model, 'cli_ciudad') ?>

    <?php // echo $form->field($model, 'cli_telefono') ?>

    <?php // echo $form->field($model, 'cli_email') ?>

    <?php // echo $form->field($model, 'cli_fechaNacimiento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
