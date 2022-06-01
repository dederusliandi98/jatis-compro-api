<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['created_at'];

    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'position',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
