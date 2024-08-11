<?php

namespace App\Repositories\SQL;

use App\Models\User;
use App\Repositories\Contracts\AccountContract;
use App\Repositories\Contracts\UserContract;
use App\Repositories\SQL\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserContract
{
     /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
