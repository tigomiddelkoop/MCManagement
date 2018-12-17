<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MCVersionController extends Controller
{
    public static function convert($toConvert)
    {
        switch ($toConvert) {
            case '404':
                return '1.13.2';
            case '401':
                return '1.13.1';
            case '393':
                return '1.13';
            case '340':
                return '1.12.2';
            case '338':
                return '1.12.1';
            case '335':
                return '1.12';
            case '316':
                return '1.11.x';
            case '315':
                return '1.11';
            case '210':
                return '1.10 - 1.10.2';
            case '110':
                return '1.9.3 - 1.9.4';
            case '109':
                return '1.9.2';
            case '108':
                return '1.9.1';
            case '107':
                return '1.9';
            case '47':
                return '1.8 - 1.8.9';
            case '5':
                return '1.7.6 - 1.7.10';
            case '4':
                return '1.7.2 - 1.7.5';
            default:
                return 'SnapShot';
        }
    }

    public static function convertToChart($toConvert)
    {
        $data = "[";

        foreach ($toConvert as $name => $convert) {
            switch ($name) {
                case '404':
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";
                    break;
                case '401':
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";

                    break;
                case '393':
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";
                    break;
                case '340':
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";

                    break;
                case '338':
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";

                    break;
                case '335':
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";

                    break;
                case '316':
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";

                    break;
                case '315':
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";

                    break;
                case '210':
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";

                    break;
                case '110':
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";

                    break;
                case '109':
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";

                    break;
                case '108':
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";

                    break;
                case '107':
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";

                    break;
                case '47':
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";

                    break;
                case '5':
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";

                    break;
                case '4':
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";

                    break;
                default:
                    $data .= "{ value: " . $convert->count() . ", color: \"#7b00ff\", label: \"" . self::convert($name) ."\"},";
                    break;
            }
        }
        $data .= "]";
//        dd($data);
        return $data;
    }
}