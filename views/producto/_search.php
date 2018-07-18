<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pro_id') ?>

    <?= $form->field($model, 'pro_nombre') ?>

    <?= $form->field($model, 'pro_descripcion') ?>

    <?= $form->field($model, 'pro_costo') ?>

    <?= $form->field($model, 'pro_precio') ?>

    <?php echo $form->field($model, 'pro_imagen') ?>

    <?php // echo $form->field($model, 'pro_estado') ?>

    <?php // echo $form->field($model, 'cat_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
