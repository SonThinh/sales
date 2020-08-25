<?php

namespace App\Repositories;

abstract class EloquentRepository
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
        return $this->_model->orderBy($this->sortBy, $this->sortOrder)->get();
    }

    public function query()
    {
        return $this->_model->newQuery();
    }

    public function getByLimit($limit)
    {
        return $this->_model->take($limit)->get();
    }

    public function take($limit)
    {
        return $this->_model->take($limit);
    }

    public function findByCode($code, $with = [])
    {
        return $this->_model->with($with)->where('code', $code)->first();
    }

    public function findWith(int $id, $with = [])
    {
        return $this->_model->with($with)->find($id);
    }

    public function findMany(array $ids)
    {
        return $this->_model->findMany($ids);
    }

    public function paginate($limit)
    {
        return $this->_model->latest()->paginate($limit);
    }

    /**
     * Get one
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->_model->find($id);
    }

    /**
     * Get one
     *
     * @param $id
     * @return mixed
     */
    public function where(array $conditions)
    {
        return $this->_model->where($conditions);
    }

    public function with($conditions)
    {
        return $this->_model->with($conditions);
    }

    /**
     * Create
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->_model->create($attributes);
    }

    /**
     * Update
     *
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);

            return $result;
        }

        return false;
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
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
            $result->destroy();

            return true;
        }

        return false;
    }
}
