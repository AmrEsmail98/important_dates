<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\ProfileSettingResource;
use App\Repositories\Contracts\IClientRepository;

class ProfileSettingController extends Controller
{
    use ApiResponser;

    protected $clientRepository;

    public function __construct(IClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function getProfile()
    {
        $client_id =request()->user()->id;

        return  $this->success(ProfileSettingResource::make($this->clientRepository->find($client_id)), 'Profile Data');
    }


    public function updateProfile(UpdateProfileRequest $request)
    {
        $client_id = request()->user()->id;

       $client = $this->clientRepository->find($client_id);

       $client = $request->all();
       if ($request->hasFile('image')) 
       {
           Storage::delete($this->clientRepository->find($client_id)->image);
           $client['image'] = $request->file('image')->store('clients');
       };


        return  $this->success(ProfileSettingResource::collection($this->clientRepository->update($client_id, $client)), 'Profile Data Updated Successfully');
    }


}
