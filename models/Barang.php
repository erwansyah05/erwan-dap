<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_barang".
 *
 * @property int $id_barang
 * @property string|null $nama_barang
 * @property int|null $harga_barang
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_barang'], 'required'],
            [['id_barang', 'harga_barang'], 'integer'],
            [['nama_barang'], 'string', 'max' => 50],
            [['id_barang'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_barang' => 'Id Barang',
            'nama_barang' => 'Nama Barang',
            'harga_barang' => 'Harga Barang',
        ];
    }
}
