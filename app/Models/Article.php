<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;
use App\Models\Category;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function login()
    {
        return $this->belongsTo(Login::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
