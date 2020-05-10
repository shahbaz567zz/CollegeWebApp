<?php
namespace App\Helpers;
use App\Table;

class TableHelper
{
    public static function getTableHtml($body){
        $tableName = self::get_string_between($body,'[[',']]');
        if($tableName){
            $table = Table::where('title',$tableName)->firstOrFail()->body;
            $body = str_replace('[['.$tableName.']]', $table, $body);
            return $body;
        }
        return $body;
    }

    private static function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

}