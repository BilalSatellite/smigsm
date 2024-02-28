<?php

namespace App\Models\Ic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class BrandIc extends Model
{
    use HasFactory;
    protected $table = 'brand_ics';
}
