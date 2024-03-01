<?php

namespace App\Models\Ic;

use App\Helpers\HasCommonRelationsIc;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Memory extends Model
{
    use HasFactory;
    use HasCommonRelationsIc;
    protected $table = 'memories';
}
