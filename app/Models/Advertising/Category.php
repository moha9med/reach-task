<?php

namespace App\Models\Advertising;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'categories';

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

}
