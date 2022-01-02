<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Repositories\Contracts\ICountryRepository;

class CountryControler extends Controller
{

    protected $countryRepository;

    public function __construct(ICountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }
    
    public function index()
    {
        return CountryResource::collection($this->countryRepository->getAll());
    }

    public function show($id)
    {
        return new CountryResource($this->countryRepository->find($id));
    }
}
