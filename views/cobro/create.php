<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cobro */

$this->title = 'Create Cobro';
$this->params['breadcrumbs'][] = ['label' => 'Cobros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cobro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
