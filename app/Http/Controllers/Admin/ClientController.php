<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\IClientRepository;

class ClientController extends Controller
{

    protected $clientRepository;

    public function __construct(IClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index()
    {
        $clients = $this->clientRepository->getAll();
        
        $clients = $this->clientRepository->search();

        return view('admin.clients.index', compact('clients'));
    }
    

    public function show($clientId)
    {
        $clients = $this->clientRepository->find($clientId);

        return view('admin.clients.show',compact('clients') );
    }

    public function destroy($id)
    {
        $this->clientRepository->destroy($id);

        return redirect()->route('client.index')->withSuccess('Client Deleted Successfully!');
    }
}


