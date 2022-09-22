<?php

namespace App\Models\Advertising;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Advertiser extends Model
{
    use HasFactory;
    use Notifiable;


    protected $guarded = [];
    protected $table = 'advertisers';

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
