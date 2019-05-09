<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MCVersionController extends Controller
{
    public static function convert($toConvert)
    {
        switch ($toConvert) {
            case '477':
                return '1.14';
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
                return '1.8.x';
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
        $convertedCollection = collect();

        foreach ($toConvert as $name => $convert) {
            switch ($name) {
                case '404':
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
                case '401':
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
                case '393':
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
                case '340':
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
                case '338':
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
                case '335':
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
                case '316':
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
                case '315':
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
                case '210':
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
                case '110':
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
                case '109':
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
                case '108':
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
                case '107':
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
                case '47':
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
                case '5':
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
                case '4':
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
                default:
                    $collection = collect(['amount' => $convert->count(), "version" => self::convert($name)]);
                    $convertedCollection = $convertedCollection->push($collection);
                    break;
            }
        }
//        dd($convertedCollection);
        return $convertedCollection;
    }
}