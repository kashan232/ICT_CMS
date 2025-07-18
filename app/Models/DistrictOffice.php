<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictOffice extends Model
{
    use HasFactory;
    protected $fillable = ['number', 'district_name', 'headquarters', 'area', 'population', 'density'];

}
