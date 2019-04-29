<?php

namespace SmartEnem\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Publication.
 *
 * @package namespace SmartEnem\Models;
 */
class Publication extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'texto', 'resumo', 'fonte',
        'imagem', 'publicada', 'atualizada',
        'tag', 'user_id'
        ];

    /**
     *  * A list of headers to be used when a table is displayed
     *
     * @return array|void
     */
    public function getTableHeaders()
    {
        return['Id', 'Titulo', 'Resumo', 'Data'];
    }

    /**
     * * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed|void
     */
    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Id':
                return $this->id;
            case 'Titulo':
                return $this->titulo;
            case 'Resumo':
                return $this->resumo;
            case 'Data':
                return $this->data;
        }
    }

    public function users()
    {
        return $this->belongsToMany(User::class);

    }
}
