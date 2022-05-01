<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'ProductID';
    protected $fillable = ['ProductID', 'Name', 'Price', 'CategoryID', 'Observaciones', 'AlmacenID'];
    public $timestamps = false; //Evita problemas al insertar los datos con el factory ya que inserta por defecto datos aleatorios en 2 columnas de fechas.
}
