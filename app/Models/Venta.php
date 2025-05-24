<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'Venta';
    protected $primaryKey = 'VentaID';
    protected $fillable = ["MontoTotal","FechaVenta","ClienteID"];
    

}
