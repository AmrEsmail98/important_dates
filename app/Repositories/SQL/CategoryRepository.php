<?php

namespace App\Repositories\SQL;


use App\Models\Category;
use App\Repositories\SQL\AbstractModelRepository;
use App\Repositories\Contracts\ICategoryRepository;


class CategoryRepository extends AbstractModelRepository implements ICategoryRepository
{
    /**
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }


}
