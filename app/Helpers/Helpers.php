<?php
namespace App\Helpers;
use Illuminate\Http\FileHelpers;

class Helpers
{
    private static $categories = array();

    public static function importFile($file, $path)
    {
        if (isset($file)) {
            $nameFile = $file->hashName();
            $file->move($path, $nameFile);
            return $nameFile;
        }
    }
    public static function deleteFile($name)
    {
        if (is_file($name)) {
            unlink($name);
            return true;
        }
        return false;
    }
}