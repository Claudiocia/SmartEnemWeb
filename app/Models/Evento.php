<?php

namespace SmartEnem\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
        [
            'inicio', 'final', 'titulo', 'resumo',
            'publicada', 'atualizada', 'status',
            'tag', 'year', 'mes', 'ordmes', 'user_id',
            'category_id'
        ];

    public function getTableHeaders()
    {
        return [ 'Evento', 'Inicio', 'Final', 'Status'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Evento':
                return $this->titulo;
            case 'Inicio':
                if ($this->inicio == null){
                    return 'Data a ser definida';
                }else {
                    return date('d-m-Y', strtotime($this->inicio));
                }
            case 'Final':
                if ($this->final == null){
                    return 'Data a ser definida';
                }else {
                    return date('d-m-Y', strtotime($this->final));
                }
            case 'Status':
                return $this->status;
        }
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
