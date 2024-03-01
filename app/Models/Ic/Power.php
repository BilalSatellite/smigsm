<?php

namespace App\Models\Ic;

use App\Helpers\HasCommonRelationsIc;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Power extends Model
{
    use HasFactory;
    use HasCommonRelationsIc;
    protected $table = 'powers';
}
