<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Repositories\CategoryInterface;
use Modules\Food\Repositories\FoodInterface;

class FrontController extends Controller
{
    private $foodInstance;
    private $categoryInstance;

    public function __construct(FoodInterface  $food, CategoryInterface $category)
    {
        $this->foodInstance = $food;
        $this->categoryInstance = $category;
    }

    public function index(Request $request)
    {
        $search = [];
        if ($request->filled('search')){
            $search[0] = [
                    'column' => 'title',
                    'operator' => 'LIKE',
                    'value' => '%'. $request->input('search') .'%'
                ];
        }
        if ($request->filled('category_id')){
            $search[1] =
                [
                    'column' => 'category_id',
                    'operator' => '=',
                    'value' =>  $request->input('category_id')
                ];

        }



        $foods = $this->foodInstance->all($search,[],null,true);
        return view('front::index',compact('foods'));
    }
}
