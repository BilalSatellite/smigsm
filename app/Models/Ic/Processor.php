<?php

namespace App\Models\Ic;

use App\Helpers\HasCommonRelationsIc;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Processor extends Model
{
    use HasFactory;
    use HasCommonRelationsIc;
    protected $table = 'processors';

    protected $casts = [
        'ram_support' => 'array',
    ];
}
