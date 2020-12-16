<?php

namespace App\Repositories;

use \App\Http\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    protected $model;
    
    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function all() 
    {
        // TODO: Implement all() method.
    }
    public function create(array $data) 
    {
        // TODO: Implement create() method.
    }  
    public function update(array $data, $id) 
    {
        // TODO: Implement update() method.
    }
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function getModel()
    {
        return $this->model;
    }
    
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}