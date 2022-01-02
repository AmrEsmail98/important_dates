<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ICountryRepository;

class CountryController extends Controller

{

    protected $countryRepository;

    public function __construct(ICountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }
    public function index()
    {
        $data['countries'] = $this->countryRepository->getAll();
        return view('admin.countries.index')->with($data);
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:countries,name',
        ]);

        $this->countryRepository->store($data);
        
        return redirect()->route('country.index')->withSuccess('Country Added Successfully');

    }

    public function edit($id)
    {
       $data['country'] = $this->countryRepository->find($id);

        return view('admin.countries.edit')->with($data);
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:countries,name,' . $id,
        ]);

         $this->countryRepository->update( $id, $data);

        return redirect()->route('country.index');
    }


    public function destroy($id)
    {
        $this->countryRepository->destroy($id);

        return redirect()->route('country.index')
            ->with('success', 'Country Deleted successfully.');
    }

}
