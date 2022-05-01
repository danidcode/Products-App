<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Almacenes extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "almacenes";
    protected $primaryKey = 'AlmacenID';
    protected $fillable = ['AlmacenID', 'Name'];
    public $timestamps = false; //Evita problemas al insertar los datos con el factory ya que inserta por defecto datos aleatorios en 2 columnas de fechas.
}
