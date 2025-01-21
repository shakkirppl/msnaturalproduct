<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ProductSizeLanguageScope implements Scope
{
    protected $language;

    public function __construct($language)
    {
        $this->language = $language;
    }

    public function apply(Builder $builder, Model $model)
    {
        if ($this->language == 'ar') {
            $builder->select(['id', 'size_ar as size']);
        } else {
            $builder->select(['id', 'size as size']);
        }
    }
}
