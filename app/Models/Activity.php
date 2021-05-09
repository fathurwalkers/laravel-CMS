<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;

class Activity extends Model
{
    use HasFactory;
    
    protected $table = "activities";

    protected $primaryKey = "id";

    protected $guarded = [];
}
