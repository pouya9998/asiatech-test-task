<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\Repositories\OrderInterface;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->getOrders();
        return view('order::index', compact('orders'));
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
