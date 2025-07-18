<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDocument extends Model
{
    use HasFactory;
    protected $fillable = ['document_title', 'date', 'report_no', 'document_type', 'pdf_file'];

}
