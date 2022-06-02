<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $dates = ['created_at'];

    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'email',
        'phone',
        'address',
        'about_us',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
