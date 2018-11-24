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
}
