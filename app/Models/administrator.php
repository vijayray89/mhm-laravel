<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administrator extends Model
{
    public $timestamps = false;
    protected $table = "administrator";
    protected $primaryKey = "admin_id";
    use HasFactory;
}
