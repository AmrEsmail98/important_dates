<?php 

namespace App\Repositories\Contracts;


interface IColorRepository extends IModelRepository {
    
    public function colorWithCategory($id);
}