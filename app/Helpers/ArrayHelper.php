<?php

namespace App\Helpers;

class ArrayHelper
{
    public static function getKeysWithParentIDAndAllowAccess($array, $parentID)
    {
        $filteredArray = array_filter($array, function ($obj) use ($parentID) {
            return $obj->parentID === $parentID && $obj->allowAccess === 'Y';
        });

        usort($filteredArray, function ($a, $b) {
            return $a->orderLine <=> $b->orderLine;
        });

        // $keys = array_map(function ($obj) {
        //     return array_keys((array) $obj);
        // }, $filteredArray);

        return $filteredArray;
    }
}