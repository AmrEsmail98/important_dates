<?php

namespace App\Http\Controllers\Admin;

use App\Models\MemberType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\IMemberTypeRepository;

class MemberTypesController extends Controller
{
    protected $memberTypesRepository;

    public function __construct(IMemberTypeRepository $memberTypesRepository)
    {
        $this->memberTypesRepository = $memberTypesRepository;
    }

    public function index()
    {
        $memberTypes = $this->memberTypesRepository->getAll();

        return view('admin.memberTypes.index', compact('memberTypes'));
    }
    public function create()
    {
        return view('admin.memberTypes.create');
    }
    
    public function store(Request $request)
    {
       $data = $request->validate([
        'name'=>'required|unique:member_types,name',
       ]);

       $this->memberTypesRepository->store($data);

        return redirect()->route('memberType.index')->withSuccess('MemberType Added Successfully');
    }
    public function edit($id)
    {
        $memberType = $this->memberTypesRepository->find($id);

        return view('admin.memberTypes.edit', compact('memberType'));

    }

    public function update($id, Request $request)

    {
        $data = $request->validate([
          'name'=>'required'
         ]);

         $this->memberTypesRepository->update($id, $data);

         return redirect()->route('memberType.index')->withSuccess('MemberType Updated Successfully');

    }

    public function destroy($id)
    {
        $this->memberTypesRepository->destroy($id);

        return redirect()->route('memberType.index')->withSuccess('MemberType Deleted Successfully');

    }

}
