<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job_postings';

    protected $fillable = [
        'title',
        'description',
        'location',
        'salary',
        'deadline',
    ];
}