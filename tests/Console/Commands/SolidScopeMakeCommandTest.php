<?php

declare(strict_types=1);

use Alijawadi\SolidScopes\Console\Commands\SolidScopeMakeCommand;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\assertTrue;

it('create the data transfer object when called', function (string $scope, string $model) {
    $this->artisan(SolidScopeMakeCommand::class, ['name' => $scope, 'model' => $model])
        ->assertSuccessful();

    assertTrue(File::exists(path: app_path("Models/{$model}Scopes/Scope.php")));
});