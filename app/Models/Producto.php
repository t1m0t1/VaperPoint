<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'Producto';
    protected $primaryKey = 'ProductoID';
    protected $fillable = [
        'nombre',
        'precio',
        'cantidad',
        'imagen',
        'categoriaID',
        'descripcion',
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'CategoriaID');
    }



}
