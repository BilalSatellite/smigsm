<?php

namespace App\Models\Ic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeIc extends Model
{
    use HasFactory;
    protected $table = 'attribute_ics';
    protected $casts = [
        'values' => 'array',
    ];
}
