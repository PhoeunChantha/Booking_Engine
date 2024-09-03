<?php

namespace App\Models;

use App\helpers\AppHelper;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideoUrl extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, 'video_url_id');
    }
    public function translations()
    {
        return $this->morphMany(Translation::class, 'translationable');
    }
    public function getValueAttribute($value)
    {
        if (strpos(url()->current(), '/admin')) {

            if (!is_array($value)) {
                $value = json_decode($value, true);
            }
            return $value;
            // return $description;
        }
        $values = $this->translations[0]->value ?? $value;
        if (!is_array($values)) {
            $values = json_decode($values, true);
        }

        return $values;
    }
    public function getTitleAttribute($title)
    {
        if (strpos(url()->current(), '/admin')) {
            return $title;
        }
        return $this->translations[1]->value ?? $title;
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
