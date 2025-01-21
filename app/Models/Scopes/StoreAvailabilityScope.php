<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class StoreAvailabilityScope implements Scope
{
    protected $storeId;

    public function __construct($storeId)
    {
        $this->storeId = $storeId;
    }

    public function apply(Builder $builder, Model $model)
    {
        $builder->where('store_id', $this->storeId)
                ->where('is_available', 1);
    }
}
