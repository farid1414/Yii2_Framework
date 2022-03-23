<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $jenis_kelamin
 * @property string|null $tgl_lahir
 * @property string|null $nim
 * @property string|null $prodi
 * @property string|null $fakultas
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_lahir'], 'safe'],
            [['nama'], 'string', 'max' => 200],
            [['jenis_kelamin'], 'string', 'max' => 10],
            [['nim'], 'string', 'max' => 50],
            [['prodi', 'fakultas'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tgl_lahir' => 'Tgl Lahir',
            'nim' => 'Nim',
            'prodi' => 'Prodi',
            'fakultas' => 'Fakultas',
        ];
    }
}
