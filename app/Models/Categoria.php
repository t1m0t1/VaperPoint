<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'Categoria';
    protected $primaryKey = 'CategoriaID';
    protected $fillable = 
    [
        'Nombre'
    ];

    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
}
