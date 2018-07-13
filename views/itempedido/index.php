<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItempedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Itempedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="itempedido-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Itempedido', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ite_id',
            'ite_cantidad',
            'ite_nombre',
            'ped_id',
            'pro_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>