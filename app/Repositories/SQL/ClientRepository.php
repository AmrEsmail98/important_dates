<?php

namespace App\Repositories\SQL;

use App\Models\Client;
use App\Repositories\SQL\AbstractModelRepository;
use App\Repositories\Contracts\IClientRepository;

class ClientRepository extends AbstractModelRepository implements IClientRepository
{
    /**
     * @param Client $model
     */
    public function __construct(Client $model)
    {
        parent::__construct($model);
    }
}
