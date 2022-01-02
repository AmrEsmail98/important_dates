<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterationRequest;
use App\Repositories\Contracts\IClientRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponser;

class RegisterController extends Controller
{
    use ApiResponser;

    protected $clientRepository;

    public function __construct(IClientRepository $clientRepository)
    {
        $this->middleware('guest:client');
        $this->clientRepository = $clientRepository;
    }


    public function register(RegisterationRequest $request)
    {
        $client = $request->all();
        $client['password'] = Hash::make($request->password);

        if($request->image){
            $client['image'] = $request->image->store('clients');
        };       

       $client = $this->clientRepository->store($client);

        return $this->success([
            'token' => $client->createToken('auth-token')->plainTextToken
        ], 'You are registerd successfully');
    }
}
