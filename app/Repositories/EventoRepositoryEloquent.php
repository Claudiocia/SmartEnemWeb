<?php

namespace SmartEnem\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SmartEnem\Repositories\EventoRepository;
use SmartEnem\Models\Evento;
use SmartEnem\Validators\EventoValidator;

/**
 * Class EventoRepositoryEloquent.
 *
 * @package namespace SmartEnem\Repositories;
 */
class EventoRepositoryEloquent extends BaseRepository implements EventoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Evento::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
