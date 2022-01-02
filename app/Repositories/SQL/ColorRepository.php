<?php

namespace App\Repositories\SQL;


use App\Models\Color;
use App\Repositories\SQL\AbstractModelRepository;
use App\Repositories\Contracts\IColorRepository;

class ColorRepository extends AbstractModelRepository implements IColorRepository
{
    /**
     * @param Color $model
     */
    public function __construct(Color $model)
    {
        parent::__construct($model);
    }

    public function colorWithCategory($id)
    {
        return Color::with('categories')->findOrFail($id);
    }


}
