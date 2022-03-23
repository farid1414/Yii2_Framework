<?php 

namespace app\models;

use yii;
// use yii\base\Model;

// dikarenakan menggunakan database maka tidak lagi menggunakan model tetapi menggunakan active record
use yii\db\ActiveRecord;

class Warga extends ActiveRecord
{
    // mendeklaerasikan nama, email, pekerjaan, jumlah, keterangan 
    // public $nama;
    // public $email;
    // public $alamat;
    // public $pekerjaan;
    // public $jumlah;
    // tidak lagi menggunakan deklarasi karena sudah menggunakan active record  

    // membuat validasi untuk form pendataan warga 
    public function rules()
    {
        return[
            [['nama','email','alamat', 'pekerjaan','jumlah'], 'required'],  
            ['email', 'email'],
            ['alamat', 'string','max'=> 150],
        ];
    
    }

    // membua function untuk from dropdown list data pekerjaan 
    public function dataPekerjaan()
    {
        return [
            'Pns' => 'PNS',
            'Pengusaha' => 'Pengusaha',
            'Buruh pabrik' => 'Buruh Pabrik',
            'Petani' => 'Petani',
            'Nelayan' => 'Nelayan',
            'Pedagang' => 'Pedagang',
            'Tidak bekerja' => 'Tidak Bekerja'
        ];
    }
}