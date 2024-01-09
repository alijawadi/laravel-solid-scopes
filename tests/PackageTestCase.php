<?php

declare(strict_types=1);

namespace Alijawadi\SolidScopes\Tests;

use Alijawadi\SolidScopes\Providers\CommandServiceProvider;
use Orchestra\Testbench\TestCase;

class PackageTestCase extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            CommandServiceProvider::class,
        ];
    }
}