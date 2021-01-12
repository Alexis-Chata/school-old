<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anio_academico extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function getRouteKeyName()
    {
        return 'name';
    }
}
