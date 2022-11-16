<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Food\Repositories\FoodInterface;
use Modules\Order\Repositories\OrderInterface;

class OrderController extends Controller
{
    private $orderRepository;
    private $foodRepository;

    public function __construct(OrderInterface $orderRepository, FoodInterface $foodRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->foodRepository = $foodRepository;
    }

    public function index()
    {
        $orders = $this->getOrders();
        return view('order::index', compact('orders'));
    }

    public function create($food_id)
    {
        $food = $this->orderRepository->create([
            'food_id' => $food_id,
            'user_id' => auth()->id()
        ]);

        return redirect(route('order.index'))->with('success',__('word.successfully'));
    }

    private function getOrders(){
        $user_type = auth()->user()->type;
        $search = [];

        if ($user_type == 'user'){
            $search[] = [
                'column' => 'user_id',
                'operator' => '=',
                'value' => auth()->id()
            ];
        }

        return $this->orderRepository->all($search,[[
            'column' => 'id',
            'direction' => 'DESC'
        ]],null,true);

    }
}
