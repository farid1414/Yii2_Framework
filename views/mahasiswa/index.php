<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MahasiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mahasiswa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahasiswa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mahasiswa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // mengubah kodingan untuk emnampilkan data untuk field nama 
            [
                'label' => 'Nama Lengkap',
                'headerOptions' => ['class'=>'text-center'], //untuk menambahkan css di judul nama 
                'value' => function($model){
                    return $model->nama;
                }
            ],
            'jenis_kelamin',

            // mengubah format tanggal menjadi tgl-bulan tahun
            [
                'label' => 'Tanggal Lahir',
                'value' => function($model){
                    return date('d-M-Y', strtotime($model->tgl_lahir));
                }
            ],
            'nim',
            'prodi',
            'fakultas',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, /* ada Mahasiswa tapi error */ $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>