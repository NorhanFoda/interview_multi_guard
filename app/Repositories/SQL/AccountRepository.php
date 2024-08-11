<?php

namespace App\Repositories\SQL;

use App\Models\Account;
use App\Models\User;
use App\Repositories\Contracts\AccountContract;
use App\Repositories\SQL\BaseRepository;

class AccountRepository extends BaseRepository implements AccountContract
{
     /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(Account $model)
    {
        parent::__construct($model);
    }
}
