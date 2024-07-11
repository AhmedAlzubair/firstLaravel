<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Phone extends Model
{
    use HasFactory;
    protected $table="phones";
    protected $fillable = [
        'phone',
        'code',
        
    ];
    protected $hidden = [
        'user_id',
    ];
    public $timestamps=false;
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
