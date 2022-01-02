<?php

namespace App\Repositories\SQL;

use App\Models\MemberType;
use App\Repositories\SQL\AbstractModelRepository;
use App\Repositories\Contracts\IMemberTypeRepository;

class MemberTypeRepository extends AbstractModelRepository implements IMemberTypeRepository
{
    /**
     * @param MemberType $model
     */
    public function __construct(MemberType $model)
    {
        parent::__construct($model);
    }

}
