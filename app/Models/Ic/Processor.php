<?php

namespace App\Models\Ic;

use App\Helpers\HasCommonRelationsIc;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Processor extends Model
{
    use HasCommonRelationsIc;
    use HasFactory;
    protected $table = 'processors';

    protected $casts = [
        'ram_support' => 'array',
    ];
}
