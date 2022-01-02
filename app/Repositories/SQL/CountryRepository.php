<?php

namespace App\Repositories\SQL;


use App\Models\Country;
use App\Repositories\SQL\AbstractModelRepository;
use App\Repositories\Contracts\ICountryRepository;

class CountryRepository extends AbstractModelRepository implements ICountryRepository
{
    /**
     * @param Country $model
     */
    public function __construct(Country $model)
    {
        parent::__construct($model);
    }

}
