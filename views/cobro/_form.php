<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cobro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cobro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cob_total')->textInput() ?>

    <?= $form->field($model, 'cob_cuenta_A')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cob_cuenta_B')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cob_estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
