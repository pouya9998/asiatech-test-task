<?php

namespace Modules\Order\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Food\Entities\Food;

class Order extends Model
{

    protected $guarded = [];

    public function food()
    {
        return $this->belongsTo(Food::class)->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

}
