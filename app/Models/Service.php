<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;
    protected $table="services";
    protected $fillable = [
        'name',    
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot',
    ];
    public $timestamps=true;
    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class,'doctors_services','doctor_id','service_id');
    }
}
