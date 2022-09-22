<?php

namespace App\Models\Advertising;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'tags';

    public function ads()
    {
        return $this->belongsToMany(Ad::class)->withTimestamps();
    }
}
