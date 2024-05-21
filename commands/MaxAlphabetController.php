<?php
namespace app\commands;
use yii\console\Controller;

/**
 * Soal nomor 1
 */
class MaxAlphabetController extends Controller
{
    public function actionRun($string)
    {
        $datas = [];
        foreach (count_chars($string, 1) as $strr => $value) {
            echo "Huruf : " . chr($strr) . " muncul sebanyak $value kali." . "\n";
            
            //mengelompokkan ke dalam array dengan key dari huruf
            $key = chr($strr);
            $datas[$key] = $value;
        }

        //mencari jumlah value terbanyak
        $maxValue = max(array_values($datas));

        //menampilkan huruf terbanyak yg sering muncul
        echo "Output : huruf yang paling banyak muncul adalah " . array_search($maxValue, $datas);

        return true;
    }
}
