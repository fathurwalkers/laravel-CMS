<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;

class Galery extends Model
{
    use HasFactory;

    protected $table = 'galeries';

    protected $primaryKey = 'id';
    
    protected $guarded = [];

    public function login()
    {
        return $this->belongsTo(Login::class);
    }
}
