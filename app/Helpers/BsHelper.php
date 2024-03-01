<?php

namespace App\Helpers;

use App\Models\Ic\IcCategory;

class BsHelper
{


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
