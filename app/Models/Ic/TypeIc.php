<?php

namespace App\Models\Ic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Laravel\Prompts\Progress;

class TypeIc extends Model
{
    use HasFactory;
    protected $table = 'type_ics';
    public function getCategoryIcs(): BelongsTo
    {
        return $this->belongsTo(CategorieIc::class, 'categorie_ic_id');
    }


    // public function typeables(): MorphTo
    // {
    //     return $this->morphTo();
    // }

    public function getProcessors(): MorphToMany
    {
        return $this->morphedByMany(Processor::class, 'typeables');
    }
    public function getPowers(): MorphToMany
    {
        return $this->morphedByMany(Power::class, 'typeables');
    }
    public function getMemoryes(): MorphToMany
    {
        return $this->morphedByMany(Memory::class, 'typeables');
    }

    public static function search($search)
    {
        return empty($search) ? static::query()->with('getProcessors', 'getPowers', 'getMemoryes')
            : static::query()->where('id', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            // ->orWhere('f_name', 'like', '%' . $search . '%')
            // ->orWhere('m_name', 'like', '%' . $search . '%')
            // ->orWhere('l_name', 'like', '%' . $search . '%')
            // ->orWhere('email', 'like', '%' . $search . '%')
            // ->orWhere('stu_mobile', 'like', '%' . $search . '%')
            // ->orWhere('par_mobile', 'like', '%' . $search . '%')
            // ->orWhere('joining_date', 'like', '%' . $search . '%')
            // ->orWhere('status', 'like', '%' . $search . '%')
            // ->orWhere('desc', 'like', '%' . $search . '%')
            ->orWhereHas('getProcessors', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('getPowers', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
                // ->orWhere('village', 'like', '%' . $search . '%')
                // ->orWhere('taluka', 'like', '%' . $search . '%')
                // ->orWhere('district', 'like', '%' . $search . '%')
                // ->orWhere('state', 'like', '%' . $search . '%')
                // ->orWhere('pincode', 'like', '%' . $search . '%');
            })
            ->orWhereHas('getMemoryes', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
    }
}
