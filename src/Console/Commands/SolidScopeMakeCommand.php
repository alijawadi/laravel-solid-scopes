<?php

declare(strict_types=1);

namespace Alijawadi\SolidScopes\Console\Commands;

use Illuminate\Console\GeneratorCommand;

final class SolidScopeMakeCommand extends GeneratorCommand
{
    protected $signature = "make:solid-scope {name : The Scope Name} {model : The Eloquent Model Name}";

    protected $description = "Create a new Solid Scope";

    protected $type = 'Scope';

    protected function getStub(): string
    {
        return $this->resolveStubPath('/stubs/solid.scope.stub');
    }

    protected function resolveStubPath($stub): string
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__.$stub;
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return is_dir(app_path('Models')) ? $rootNamespace."\\Models\\".
            $this->getModelInput()."Scopes" : $rootNamespace.'\Scopes';
    }

    protected function getModelInput(): string
    {
        return trim($this->argument('model'));
    }
}