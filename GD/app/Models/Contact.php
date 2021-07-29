<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;


    protected $table = 'contacts';
    public $timestamps = true;


    protected $fillable = [
        'name',
        'email',
        'mobile_number',
        'message',
        'created_at'
    ];
}
