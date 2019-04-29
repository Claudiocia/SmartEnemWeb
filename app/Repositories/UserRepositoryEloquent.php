<?php

namespace SmartEnem\Repositories;

use Jrean\UserVerification\Facades\UserVerification;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SmartEnem\Models\User;


/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace SmartEnem\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * @param array $attributes
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function create(array $attributes)
    {
        $attributes['role'] = User::ROLE_CLIENT;
        $attributes['password'] = User::passwordGenerate();

        $model = parent::create($attributes);
        UserVerification::generate($model);
        UserVerification::send($model, 'sua conta foi criada');

        return $model;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
