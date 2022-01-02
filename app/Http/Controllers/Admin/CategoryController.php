<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\Contracts\ICategoryRepository;
use App\Repositories\Contracts\IColorRepository;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    protected $categoryRepository;
    
    public function __construct(ICategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function index() {
        $categories = $this->categoryRepository->getAll();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(IColorRepository $iColorRepository) {
        $colors = $iColorRepository->getAll();
        return view('admin.categories.create', compact('colors'));
    }

    public function store(CategoryRequest $request) {

        $attributes = $request->only(['name', 'color_id']);
        if($request->image){
            $attributes['image'] = $request->image->store('categories');
        };

        $this->categoryRepository
            ->store($attributes);
            return redirect()->route('categories.index')->withSuccess('Category Created Successfully!');
    }

    public function edit($id, IColorRepository $iColorRepository) {
        $category = $this->categoryRepository->find($id);
        $colors = $iColorRepository->getAll();
        return view('admin.categories.edit', ['category' => $category, 'colors' => $colors]);
    }

    public function update($id, UpdateCategoryRequest $request) {

        $attributes = $request->only(['name', 'color_id']);
        if($request->image){
            Storage::delete($this->categoryRepository->find($id)->image);
            $attributes['image'] = $request->image->store('categories');
        };

        $this->categoryRepository->update($id, $attributes);
        return redirect()->route('categories.index')->withSuccess('Category Updated Successfully!');

    }

    public function destroy($id) {
        $this->categoryRepository->destroy($id);
        return redirect()->route('categories.index')->withSuccess('Category Deleted Successfully!');

    }
}
