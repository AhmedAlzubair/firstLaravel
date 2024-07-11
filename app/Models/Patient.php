<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
class Patient extends Model
{
    use HasFactory;
    protected $table="patients";
    protected $fillable = [
        'name',
        'age',
        
    ];
    public $timestamps=false;
    public function doctor(){
        return  $this->HasOneThrough(Doctor::class,Medical::class,'patient_id','medical_id');
    }
}
