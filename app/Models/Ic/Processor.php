<?php

namespace App\Models\Ic;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Processor extends Model
{
    use HasFactory;

    protected $casts = [
        'ram_support' => 'array',
    ];

    public function brand()
    {
        return $this->belongsTo(BrandIc::class, 'brand_ic_id');
    }

    public function contributor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // public function categories(): BelongsToMany
    // {
    //     return $this->belongsToMany(SubCategorieIc::class, 'category_processor');
    // }
    //     /** @return MorphMany<Comment> */
    public function categories(): MorphToMany
    {
        return $this->morphToMany(SubCategorieIc::class, 'typeables');
    }
}
