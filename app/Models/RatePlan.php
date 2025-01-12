<?php

namespace App\Models;

use App\Models\User;
use App\helpers\AppHelper;
use App\Models\Translation;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RatePlan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rate_plans';
    protected $fillable = ['room_id','title','description','special_package'];
    protected $guarded = ['id'];
    protected $casts = [
        'special_package' => 'array',
        'guest_included' => 'array'
    ];
    public function createdBy ()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function roomtype()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function Amenity()
    {
        return $this->belongsToMany(HomeStayAmenity::class);
    }
    public function translations()
    {
        return $this->morphMany(Translation::class, 'translationable');
    }
    public function getTitleAttribute($title)
    {
        if (strpos(url()->current(), '/admin')) {
            return $title;
        }
        return $this->translations[0]->value ?? $title;
    }
    public function getDescriptionAttribute($description)
    {
        if (strpos(url()->current(), '/admin')) {
            return $description;
        }
        return $this->translations[1]->value ?? $description;
    }
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('translate', function (Builder $builder) {
            $builder->with(['translations' => function ($query) {
                if (strpos(url()->current(), '/api')) {
                    return $query->where('locale', App::getLocale());
                } else {
                    return $query->where('locale', AppHelper::default_lang());
                }
            }]);
        });
    }
}
