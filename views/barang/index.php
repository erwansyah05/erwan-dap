<?php

use app\models\Barang;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Barangs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Barang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_barang',
            'nama_barang',
            'harga_barang',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Barang $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_barang' => $model->id_barang]);
                 }
            ],
        ],
    ]); ?>


</div>
