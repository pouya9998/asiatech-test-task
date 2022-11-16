<?php

namespace Modules\Food\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    protected $table = 'foods';
    protected $guarded = [];
    use SoftDeletes;
}
