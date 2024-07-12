<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Landmarks extends Model
{

    protected $table = 'resordlmark';
    protected $primaryKey = 'ResOrdID';
    public $timestamps = false;

    protected $fillable = [
        'ResOrdNum',
        'Title',
        'ImgName',
    ];
}
