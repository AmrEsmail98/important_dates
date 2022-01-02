<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Http\Resources\MemberResource;
use App\Repositories\Contracts\IMemberRepository;
use App\Traits\ApiResponser;

class MemberController extends Controller
{

    use ApiResponser;
    protected $memberRepository;

    public function __construct(IMemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
        $this->middleware('guest:client');
    }

    public function index()
    {
        return MemberResource::collection($this->memberRepository->getAll());
    }


    public function store(MemberRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) 
        {
            $data['image'] = $request->file('image')->store('members');
        };

        // dd($data);

        return $this->success(MemberResource::make($this->memberRepository->store($data)), 'Member Added Successfully');
    }
}
