<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    # Es necesario especificar los valores que se podrán mandar a la DB
    protected $fillable = [
        'medicamento', 'tipo', 'cantidad', 'distribuidor', 'sucursal'
    ];
    use HasFactory;
}
