<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repositories\Contracts\ICategoryRepository;

class CategoryControler extends Controller
{
    protected $categoryRepository;

    public function __construct(ICategoryRepository $categoryRepository) 
    {
        $this->categoryRepository = $categoryRepository;
    }
    
    public function index()
    {
        return CategoryResource::collection($this->categoryRepository->getAll());
    }

    public function show($id)
    {
        return new CategoryResource($this->categoryRepository->find($id));
    }
}
