<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ColorResource;
use App\Models\Color;
use App\Repositories\Contracts\IColorRepository;

class ColorControler extends Controller
{
    protected $colorRepository;

    public function __construct(IColorRepository $colorRepository) 
    {
        $this->colorRepository = $colorRepository;
    }

    public function index()
    {
        return ColorResource::collection($this->colorRepository->getAll());
    }

    public function show($id)
    {
        return new ColorResource($this->colorRepository->colorWithCategory($id));
    }
}
