<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * User achievements
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_achievements');
    }
}
