<?php

namespace App\Repositories\SQL;

use App\Models\Member;
use App\Repositories\SQL\AbstractModelRepository;
use App\Repositories\Contracts\IMemberRepository;


class MemberRepository extends AbstractModelRepository implements IMemberRepository
{
    /**
     * @param Member $model
     */
    public function __construct(Member $model)
    {
        parent::__construct($model);
    }


}
