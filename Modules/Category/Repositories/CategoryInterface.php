<?php

namespace Modules\Category\Repositories;

interface CategoryInterface
{
    public function model();
    public function all($where=[], $order= [], $take=null, $paginate=false);
    public function first($where=[]);
    public function exists($where=[]);
    public function count($where=[]);
    public function create($data=[]);

}
