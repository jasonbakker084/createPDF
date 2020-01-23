<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificaat extends Model
{
    public $table = 'certificaats';
    protected $fillable = ['name', 'date', 'company', 'course', 'beginTime', 'endTime'];
}
