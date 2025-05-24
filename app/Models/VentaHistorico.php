<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VentaHistorico extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'VentaHistorico';
    protected $primaryKey = 'VentaHistoricoID';
    protected $fillable = [
        "VentaID",
        "ProductoID",
        "Cantidad",
        "Precio",
    ];
}
