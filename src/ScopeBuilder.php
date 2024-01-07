<?php

namespace Alijawadi\SolidScopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ScopeBuilder
{

    public function __construct(
        protected Builder $builder,
        protected array $filters,
        protected string $namespace
    ) {
        $this->setNamespace();
    }

    public function apply(): Builder
    {
        foreach ($this->filters as $name => $value) {
            $normailizedName = ucfirst(Str::camel($name));
            $class = $this->namespace."\\{$normailizedName}";

            if (!class_exists($class)) {
                continue;
            }

            if (strlen($value)) {
                (new $class())->handle($this->builder, $value);
            } else {
                (new $class())->handle($this->builder);
            }
        }

        return $this->builder;
    }

    private function setNamespace(): void
    {
        $this->namespace = $this->namespace."Scopes";
    }
}
