<?php

namespace App\Repositories\SQL;


use App\Models\Member_Type;
use App\Repositories\SQL\AbstractModelRepository;
use App\Repositories\Contracts\IMember_TypeRepository;


class Member_TypeRepository extends AbstractModelRepository implements IMember_TypeRepository
{
    /**
     * @param Member_Type $model
     */
    public function __construct(Member_Type $model)
    {
        parent::__construct($model);
    }


}
