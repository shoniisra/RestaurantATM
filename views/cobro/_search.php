<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CobroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cobro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cob_id') ?>

    <?= $form->field($model, 'cob_total') ?>

    <?= $form->field($model, 'cob_cuenta_A') ?>

    <?= $form->field($model, 'cob_cuenta_B') ?>

    <?= $form->field($model, 'cob_estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
