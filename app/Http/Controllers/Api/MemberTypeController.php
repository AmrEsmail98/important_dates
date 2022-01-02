<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MemberTypeResource;
use App\Repositories\Contracts\IMemberTypeRepository;

class MemberTypeController extends Controller
{
    protected $memberTypeRepository;

    public function __construct(IMemberTypeRepository $memberTypeRepository)
    {
        $this->memberTypeRepository = $memberTypeRepository;
    }

    public function index()
    {
        return MemberTypeResource::collection($this->memberTypeRepository->getAll());
    }
}
