<?php
namespace app\commands;
use yii\console\Controller;

/**
 * Soal nomor 1
 */
class CheckKalimatController extends Controller
{
    public function actionRun($string1 = null, $string2 = null)
    {
        $result = true;
        if (metaphone($string1) != metaphone($string2)) {
            $result = false;
        }

        var_dump($result);

        return $result;
    }
}
