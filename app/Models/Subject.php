<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Subject extends Model // Changed from Class to ClassModel
{
    use HasFactory;

    protected $fillable = ['name'];
}