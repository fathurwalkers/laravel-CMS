<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detail;
use App\Models\Article;
use App\Models\Activity;
use App\Models\Galery;

class Login extends Model
{
    use HasFactory;

    protected $table = 'login';

    protected $guarded = [];

    public function detail()
    {
        return $this->belongsTo(Detail::class);
    }

    public function article()
    {
        return $this->hasOne(Article::class);
    }

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    public function galery()
    {
        return $this->hasOne(Galery::class);
    }
}
