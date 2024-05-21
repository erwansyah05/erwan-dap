<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Barang;

class ApiController extends Controller
{
    public function beforeAction($action)
    {            
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    //search barang by id_barang
    public function actionGetById($id_barang)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = Barang::findOne(['id_barang' => $id_barang]);

        $result = [
            'id_barang' => $model->id_barang,
            'nama_barang' => $model->nama_barang,
            'harga_barang' => $model->harga_barang
        ];

        return $result;
    }

    //search all barang
    public function actionGetAll()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $models = Barang::find()->all();

        $result = [];
        foreach ($models as $model) {
            $data = [
                'id_barang' => $model->id_barang,
                'nama_barang' => $model->nama_barang,
                'harga_barang' => $model->harga_barang
            ];
            $result[] = $data;
        }

        return $result;
    }

    //create / update
    public function actionCreateBarang()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->post() !== null) {
            $input = Yii::$app->request->post();

            $model = Barang::find()
                ->where(['id_barang' => $input['id_barang']])
                ->one();

            if (!$model) {
                $model = new Barang();
            }

            $model->id_barang = $input['id_barang'];
            $model->nama_barang = $input['nama_barang'];
            $model->harga_barang = $input['harga_barang'];

            if (!$model->save()) {
                return array ('status' => false, 'data' => 'Barang gagal diperbarui') ;
            }
        }

        return array ('status' => true, 'data' => 'Barang berhasil diperbarui') ;
    }

    //DELETE barang by id_barang
    public function actionDeleteBarang($id_barang)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = Barang::findOne(['id_barang' => $id_barang]);

        if (!$model->delete()) {
            return array ('status' => false, 'data' => 'Barang gagal delete') ;
        }

        return array ('status' => true, 'data' => 'Barang berhasil delete') ;
    }
}
