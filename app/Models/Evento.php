<?php

namespace SmartEnem\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Evento.
 *
 * @package namespace SmartEnem\Models;
 */
class Evento extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
        [
            'inicio', 'final', 'titulo', 'texto',
            'resumo', 'imagem', 'publicada', 'atualizada',
            'status', 'tag', 'user_id'
        ];

    public function getTableHeaders()
    {
        return [ 'Id', 'Inicio', 'Final', 'Titulo', 'Resumo', 'Status'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Id':
                return $this->id;
            case 'Inicio':
                return $this->inicio;
            case 'Final':
                return $this->final;
            case 'Titulo':
                return $this->titulo;
            case 'Resumo':
                return $this->resumo;
            case 'Status':
                return $this->status;
        }
    }

    public function users()
    {
        return $this->belongsToMany(User::class);

    }
}
