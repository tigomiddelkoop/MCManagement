<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RandomUtils extends Controller
{
    public static function checkboxTranslater($value)
    {

        switch ($value) {
            case('on'):
                $checkbox = 1;
                break;
            case('off'):
                $checkbox = 0;
                break;
            default:
                $checkbox = NULL;
                break;
        }

        return $checkbox;

    }
}
