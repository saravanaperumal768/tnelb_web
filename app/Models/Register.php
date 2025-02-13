<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $table = 'registers'; // Ensure this matches your actual table name
    protected $fillable = ['name', 'gender', 'mobile', 'email', 'address', 'state', 'district', 'pincode'];

}
