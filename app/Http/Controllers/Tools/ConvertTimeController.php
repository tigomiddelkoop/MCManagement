<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConvertTimeController extends Controller
{
    public static function convertPlaytime($toConvert)
    {
        $seconds = floor($toConvert / 1000);
        $minutes = floor($seconds / 60);
        $hours = floor($minutes / 60);
        $days = floor($hours / 24);
        $seconds = $seconds % 60;
        $minutes = $minutes % 60;
        $hours = $hours % 24;

        $format = '%u Day(s) %2u Hour(s) %3u Minute(s) %4u Second(s)';
        $time = sprintf($format, $days, $hours, $minutes, $seconds);
        $converted = rtrim($time, '0');
        return $converted;
    }

    public static function convertTimeDate($toConvert)
    {
        $convertedTime = date("H:i:s", substr($toConvert, 0, 10));
        $convertedDate = date("d-m-Y ", substr($toConvert, 0, 10));

        $convertedValue = $convertedDate . ' at ' . $convertedTime;

        //Just in case if it fucking breaks again
        //    echo 'To Convert: '. $toConvert . "<br />";
        //    echo 'Converted: '. $toConvert . "<br />";

        return $convertedValue;
    }
}
