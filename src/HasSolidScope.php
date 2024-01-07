<?php

namespace Alijawadi\SolidScopes;

use App\Filter\FilterBuilder;
use Illuminate\Database\Eloquent\Builder;

trait HasFilter
{
    public function scopeFilterBy($query, $filters): Builder
    {
        $filter = new FilterBuilder($query, $filters, $this->getName());

        return $filter->apply();
    }

    private function getName(): ?string
    {
        $path = explode('\\', $this::class);

        return array_pop($path);
    }
}
