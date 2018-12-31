<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormSelectSelectedController extends Controller
{
    public static function selected($optionValue, $selectedValue)
    {
        if ($optionValue == $selectedValue) {
            return 'selected';
        }

    }
}
