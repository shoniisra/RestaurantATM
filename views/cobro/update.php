<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cobro */

$this->title = 'Update Cobro: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Cobros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cob_id, 'url' => ['view', 'id' => $model->cob_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cobro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
