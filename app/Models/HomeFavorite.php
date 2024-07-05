<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeFavorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
         'home_id'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function home()
    {
        return $this->hasOne(Home::class);
    }
}
