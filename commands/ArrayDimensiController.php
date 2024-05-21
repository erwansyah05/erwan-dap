<?php
namespace app\commands;
use yii\console\Controller;

/**
 * Soal nomor 1
 */
class ArrayDimensiController extends Controller
{
    public function actionRun($n = 4)
    {
        for ($row = 0; $row < $n; $row++) {
            for ($col = 0; $col < $n; $col++) {
                //logik print / echo ketika row dan kolom nya sama akan print angka sesuai param = $n
                if($row == $col){
                    echo $n;
                } else {
                    echo 0;
                }
            }
            echo "\n";
        }

        return true;
    }
}
