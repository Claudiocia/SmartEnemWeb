<?php

namespace SmartEnem\Repositories;

use Illuminate\Support\Arr;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SmartEnem\Media\ThumbUploads;
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
    use ThumbUploads;

    public function create(array $attributes)
    {

        $model =  parent::create(Arr::except($attributes, 'imagem_file'));
        $this->uploadThumb($model->id, $attributes['imagem_file']);
        return $model;

    }

    public function update(array $attributes, $id)
    {
        $model =  parent::update(Arr::except($attributes, 'imagem_file'), $id);
        if (isset($attributes['imagem_file'])){
            $this->uploadThumb($model->id, $attributes['imagem_file']);
        }
        return $model;
    }

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
