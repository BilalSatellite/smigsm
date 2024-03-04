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
}
