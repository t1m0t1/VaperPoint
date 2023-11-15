<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';
    protected $primaryKey = 'CategoriaID';
    protected $fillable = ['nombre'];

    public function Productos(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
}
