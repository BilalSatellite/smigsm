<?php

namespace App\Models\Ic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IcAttribute extends Model
{
    use HasFactory;
    protected $table = 'ic_attributes';
    protected $casts = [
        'values' => 'array',
    ];

    public static  function getIcAttributes($for)
    {
        $ref = (new static)::where('name', $for)->first()->values;
        $data = [];
        foreach ($ref as $i) {
            $data[$i] = $i;
        }
        return $data;
    }
}
