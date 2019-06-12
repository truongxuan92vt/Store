<?php

namespace App\Http\Repositories;

abstract class BaseRepositoryTemp
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     * @return string
     */
    abstract public function model();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->model()
        );
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->model->find($id);
        return $result;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update
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

    public function getFirstBy($key, $value)
    {
        return $this->model->where($key, $value)->first();
    }

    public function getBy($key, $value)
    {
        return $this->model->where($key, $value)->get();
    }

    public function get(){
        return $this->model->get();
    }
    public static function init(){
        return app(static::class);
    }
}