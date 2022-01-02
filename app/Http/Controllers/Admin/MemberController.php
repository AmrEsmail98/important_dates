<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\IMemberRepository;

class MemberController extends Controller
{
    protected $memberRepository;
    
    public function __construct(IMemberRepository $memberRepository) {
        $this->memberRepository = $memberRepository;
    }

    public function index() {
        $members = $this->memberRepository->getAll();

        $members = $this->memberRepository->search();

        return view('admin.members.index', compact('members'));
    }

}
