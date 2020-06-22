<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    protected $table = 'tblProducto';
    protected $primaryKey = 'codigoProd';

    protected $fillable = [
        'nombreProd',
        'precioProd',
    ];

    public static $rules = [
        'nombreProd' => 'required|string|max:50',
        'precioProd' => 'required|integer',
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
