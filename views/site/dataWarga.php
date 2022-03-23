<!-- import yii widget active form untuk membantu mempercepat membuat form  dan helpers url untuk membantu dalam menghimrkan form ke dalam controller -->

<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="row">
    <div class="col-sm-6">
        <!-- menampilkan session flash dari controller dengan class alert   -->
        <?php 
        if(Yii::$app->session->hasFlash('success')){
            echo "<div class='alert alert-success'>".Yii::$app->session->getFlash('success').
            "</div>";
        }
        ?>
        <?php
        // mendeklarasikan awal form dibuat dan action untuk mengarahkan form ke controller
        // url menmggunakan to dan deklarasi untuk actionnya menggunakan url
        $form =ActiveForm::begin([
            'method' => 'post',
            'action' => Url::to(['site/data-warga']),
        ]);
        ?>
        <!-- membuat label dan inputan form  -->
        <?= $form->field($warga, 'nama')->label('Nama Kepala Kelaurga')->textInput() ?>
        <?= $form->field($warga, 'email')->textInput() ?>
        <?= $form->field($warga, 'jumlah')->label('Jumlah Keluarga')->textInput() ?>
        <?= $form->field($warga, 'pekerjaan')-> dropDownList($warga->dataPekerjaan(), [
            'class' => 'form-control', 'prompt'=>'- Pilih Pekerjaan -'
        ]) ?>
        <?= $form->field($warga, 'alamat')->textarea() ?>

        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success'])  ?>
        </div>
        <?php 
        ActiveForm::end();
        ?>
    </div>

    <div class="col-sm-6">
        <table class="table table-bordered table-hover">
            <tr class="success">
                <th>Nama Kepala Kelauarga</th>
                <th>Email </th>
                <th>Jumlah anggota keluarga</th>
                <th>Pekerjaan</th>
                <th>Keterangan</th>
            </tr>
            <?php 
            foreach($dataWarga as $warga){
            ?>
            <tr>
                <td><?= $warga->nama ?></td>
                <td><?= $warga->email ?></td>
                <td><?= $warga->jumlah ?></td>
                <td><?= $warga->pekerjaan ?></td>
                <td><?= $warga->alamat ?></td>
            </tr>
            <?php 
            }
            ?>
        </table>
    </div>
</div>