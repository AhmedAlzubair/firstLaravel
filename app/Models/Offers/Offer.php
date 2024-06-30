<?php

namespace App\Models\Offers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table="offers";
    protected $fillable = [
        'name_en',
        'name_ar',
        'price',
        'detail_ar',
        'detail_en',
        // 'social_id',
        // 'social_type'     
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        // 'two_factor_recovery_codes',
        // 'two_factor_secret',
    ];
    
}
