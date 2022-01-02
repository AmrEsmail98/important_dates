<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateAdminRequest;
use App\Repositories\Contracts\IUserRepository;

class AdminController extends Controller
{

    protected $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $admins = $this->userRepository->getAll();
        return view('admin.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(AdminRequest $request)
    {
        $admin = $request->all();
        $admin['password'] = Hash::make($request->password);

        if($request->image){
            $admin['image'] = $request->image->store('admins');
        };
        $this->userRepository->store($admin);

        return redirect()->route('admin.index')->withSuccess('Admin Added Successfully!');
    }


    public function edit($id)
    {
        $admin = $this->userRepository->find($id);
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(UpdateAdminRequest $request, $id)
    {
        $admin = $request->all();
        $admin['password'] = Hash::make($request->password);

        if($request->image){
            Storage::delete($this->userRepository->find($id)->image);
            $admin['image'] = $request->image->store('admins');
        };

        $this->userRepository->update($id, $admin);

        return redirect()->route('admin.index')->withSuccess('Admin Updated Successfully!');
    }

    public function destroy($id)
    {
        $this->userRepository->destroy($id);

        return redirect()->route('admin.index')->withSuccess('Admin Deleted Successfully!');
    }
}
