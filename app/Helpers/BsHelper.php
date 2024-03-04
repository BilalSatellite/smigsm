<?php

namespace App\Helpers;

use App\Models\Ic\IcCategory;
use App\Models\Ic\IcAttribute;

class BsHelper
{

    public static  function getIcAttributes($for)
    {
        $ref = IcAttribute::where('name', $for)->first()->values;
        $data = [];
        foreach ($ref as $i) {
            $data[$i] = $i;
        }
        return $data;
    }
    public static  function getAutoCategoryId($for)
    {
        return IcCategory::where('name', $for)->first()->id;
    }

    public static function icTypesBy($for)
    {
        $cat = IcCategory::with('icTypes')->where('name', $for)->first();
        return $cat->icTypes->pluck('name', 'id')->toArray();
    }
}
