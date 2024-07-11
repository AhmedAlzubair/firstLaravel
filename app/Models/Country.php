<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Country extends Model
{
    use HasFactory;
    protected $table="countries";
    protected $fillable = [
        'name',
        
    ];
    public $timestamps=false;
    public function doctor(){
        return  $this->HasManyThrough(Doctor::class,Hospital::class,'country_id','hospital_id');
    }
    public function hospital(): HasMany
    {
        return $this->HasMany(Hospital::class,'country_id');
    }
}
