<?php

namespace SmartEnem\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SmartEnem\Repositories\PublicationRepository;
use SmartEnem\Models\Publication;
use SmartEnem\Validators\PublicationValidator;

/**
 * Class PublicationRepositoryEloquent.
 *
 * @package namespace SmartEnem\Repositories;
 */
class PublicationRepositoryEloquent extends BaseRepository implements PublicationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Publication::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
