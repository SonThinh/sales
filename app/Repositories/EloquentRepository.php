<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{

    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $_model;

    public $sortBy = 'created_at';

    public $sortOrder = 'asc';

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     *
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make($this->getModel());
    }

    /**
     * Get All
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->_model->all();
    }

    public function paginate($limit)
    {
        return $this->_model->paginate($limit);
    }

    public function simplePaginate($limit)
    {
        return $this->_model->simplePaginate($limit);
    }

    public function find($id)
    {
        return $this->_model->find($id);
    }

    public function where($column, $operator)
    {
        return $this->_model->where($column, $operator)->get();
    }

    public function create($attributes = [])
    {
        return $this->_model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);

            return $result;
        }

        return false;
    }

    public function firstOrNew($attributes = [])
    {
        return $this->_model->firstOrNew($attributes);
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function destroy($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->destroy($id);

            return true;
        }

        return false;
    }

    public function whereIn($column, array $ids)
    {
        return $this->_model->whereIn($column, $ids)->get();
    }

}
