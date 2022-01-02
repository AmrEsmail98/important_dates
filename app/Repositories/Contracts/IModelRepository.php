<?php 

namespace App\Repositories\Contracts;


interface IModelRepository {

    public function getAll();

    public function store($data);

    public function find($id);
  
    public function update($id, $data);
    
    public function destroy($id);

    public function search();
    
}