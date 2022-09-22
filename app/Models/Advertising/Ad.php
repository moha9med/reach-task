<?php

namespace App\Models\Advertising;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'ads';

    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function scopeFilterCategory($query, $filter)
    {
        return $query->where('category_id', $filter);
    }

    public function scopeFilterTag($query, $filter)
    {
        return $query->whereHas('tags', function ($q) use ($filter) {
            $q->where('ad_tag.tag_id', $filter);
        });
    }
}
