<?php

namespace Modules\Category\Repositories;

use Modules\Category\Entities\Category;

class FoodRepository implements FoodInterface
{

    public function all($where = [], $order = [], $take = null, $paginate = false)
    {
        $result = $this->model();

        foreach ($where as $item)
        {
            $result->where($item['column'],$item['operator'],$item['value']);
        }

        foreach ($order as $item)
        {
            $result->orderBy($item['column'],$item['direction']);
        }

        if (isset($take)){
            $result->take($take);
        }

        if($paginate){
            return $result->paginate();
        }

        return $result->get();

    }

    public function first($where = [])
    {
        $result = $this->model();

        foreach ($where as $item)
        {
            $result->where($item['column'],$item['operator'],$item['value']);
        }

        $result = $result->first();
        return $result;

    }

    public function exists($where = [])
    {
        $result = $this->model();

        foreach ($where as $item)
        {
            $result->where($item['column'],$item['operator'],$item['value']);
        }



        $result = $result->exists();
        return $result;
    }

    public function count($where = [])
    {
        $result = $this->model();

        foreach ($where as $item)
        {
            $result->where($item['column'],$item['operator'],$item['value']);
        }

        $result = $result->count();
        return $result;
    }

    public function model()
    {
        return Category::query();
    }

    public function create($data = [])
    {
        return $this->model()->create($data);
    }
}
