<?php

declare(strict_types=1);

namespace Alijawadi\SolidScopes;

use Illuminate\Database\Eloquent\Builder;

trait HasSolidScope
{
    public function scopeFilterBy($query, $filters): Builder
    {
        $filter = new ScopeBuilder($query, $filters, $this::class);

        return $filter->apply();
    }
}
