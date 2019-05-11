<?php

namespace SmartEnem\Http\Controllers;

use Illuminate\Http\Request;
use Jrean\UserVerification\Traits\VerifiesUsers;
use SmartEnem\Models\User;
use SmartEnem\Repositories\UserRepository;

class EmailVerificationController extends Controller
{
    use VerifiesUsers;
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * EmailVerification constructor.
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function redirectAfterVerification()
    {
        return url('admin/index');
    }

    protected function loginUser(){
    $email = \Request::get('email');
    $user = $this->repository->findByField('email', $email)->first();
        \Auth::logout($user);
        $this->redirectAfterVerification()->route('home');

    }

}
