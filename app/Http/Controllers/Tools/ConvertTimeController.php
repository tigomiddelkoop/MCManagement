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

        $format = NULL;


        //Still work in progress
        if ($days == 1) {
            $format = '%u Day, ';
        } else {
            $format = '%u Days, ';
        }
        if ($hours == 1) {
            $format .= '%u Hour, ';
        } else {
            $format .= '%u Hours, ';
        }
        if ($minutes == 1) {
            $format .= '%u Minute, ';
        } else {
            $format .= '%u Minutes, ';
        }
        if ($seconds == 1) {
            $format .= '%u Second ';
        } else {
            $format .= '%u Seconds ';
        }

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
