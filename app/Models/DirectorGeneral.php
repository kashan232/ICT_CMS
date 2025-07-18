<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


    class DirectorGeneral extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'dg_extension', 'know_us', 'types', 'main_image'];

    protected $casts = [
        'types' => 'array'
    ];
}

