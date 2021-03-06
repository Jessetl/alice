<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    protected $fillable = ['nombres_re', 'nacionalidad_ce', 'cedula_re', 'parentesco', 'nacionalidad_re', 'telefono_re', 'direccion_re', 'vive_con'];

    protected $table = 'datos_representantes';	

    public function estudiante()
    {
    	return $this->hasMany('App\Estudiante', 'id_representante', 'id');
    }

    public function getCedulaFAttribute()
    {
        return $this->nacionalidad_ce.$this->cedula_re;
    }

}
