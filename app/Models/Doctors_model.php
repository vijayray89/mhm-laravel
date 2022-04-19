<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors_model extends Model
{
    public $timestamps = false;
    protected $table = "doctor_master";
    protected $primaryKey = "doc_id";
    use HasFactory;
}
