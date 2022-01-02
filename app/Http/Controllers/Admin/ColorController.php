<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\IColorRepository;

class ColorController extends Controller
{
    protected $colorRepository;

    public function __construct(IColorRepository $colorRepository)
    {
        $this->colorRepository = $colorRepository;
    }
    public function index()
    {
        $data['colors'] = $this->colorRepository->getAll();
        return view('admin.colors.index')->with($data);
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:colors',
            'code' => 'required',
        ]);

        $this->colorRepository->store($data);

        return redirect()->route('color.index')
            ->withSuccess('Color created successfully.');
    }


    public function edit($id)
    {
       $data['color'] = $this->colorRepository->find($id);
        return view('admin.colors.edit')->with($data);

    }


    public function update($id, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:colors,name,'. $id,
            'code' => 'required',
        ]);

         $this->colorRepository->update( $id, $data);

        return redirect()->route('color.index');
    }

    public function destroy($id)
    {
        $this->colorRepository->destroy($id);

        return redirect()->route('color.index')
            ->with('success', 'Color Deleted successfully.');
    }
}
