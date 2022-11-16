<?php

namespace Modules\Food\Repositories;

interface FoodInterface
{
    public function model();
    public function all($where=[], $order= [], $take=null, $paginate=false);
    public function first($where=[]);
    public function exists($where=[]);
    public function count($where=[]);
    public function create($data=[]);
    public function decrement($id,$column,$amount);

}
