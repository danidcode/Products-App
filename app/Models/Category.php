<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "Category";
    protected $primaryKey = 'CategoryID';
    protected $fillable = ['CategoryID', 'Name'];
    public $timestamps = false; //Evita problemas al insertar los datos con el factory ya que inserta por defecto datos aleatorios en 2 columnas de fechas.
}
