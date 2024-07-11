<?php

namespace App\Models\Offers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\OfferScope;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'photo',
        'status',
        // 'social_id',
        // 'social_type'     
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        // 'two_factor_recovery_codes',
        // 'two_factor_secret',
    ];
    public function scopeInactive($q){
        return  $q->where('status',0);
    }

    protected static function booted(): void
    {
        // parent::booted();
        static::addGlobalScope(new OfferScope);
    }
    // accessors
    protected function getStatusAttribute($val){

        return $val==1?'active':'nactive';
    }
    // protected function firstName(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => ucfirst($value),
    //         set: fn (string $value) => strtolower($value),
    //     );
    // }
    protected function setNameEnAttribute($val){

        return $this->attributes['name_en']=strtoupper($val);
    }
}
