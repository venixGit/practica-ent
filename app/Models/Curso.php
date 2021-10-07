<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Curso
 *
 * @property $id
 * @property $nombre
 * @property $creditos
 * @property $horario
 * @property $profersor_id
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 *
 * @property Profesor $profesor
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Curso extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'creditos' => 'required',
		'horario' => 'required',
		'profersor_id' => 'required',
		'fecha' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','creditos','horario','profersor_id','fecha'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profesor()
    {
        return $this->hasOne('App\Models\Profesor', 'id', 'profersor_id');
    }
    

}
