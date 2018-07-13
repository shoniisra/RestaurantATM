<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Itempedido */

$this->title = 'Update Itempedido: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Itempedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ite_id, 'url' => ['view', 'id' => $model->ite_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="itempedido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
