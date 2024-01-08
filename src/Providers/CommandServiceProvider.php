<?php

declare(strict_types=1);

namespace Alijawadi\SolidScopes\Providers;

use Illuminate\Support\ServiceProvider;

final class CommandServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands(
                commands: [
                    DataTransferObjectMakeCommand::class,
                ],
            );
        }
    }
}