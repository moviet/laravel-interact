<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class ScopeMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:scope {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create scope collection';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Scope';

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */

    protected function replaceClass($stub, $name)
    {
        $model = str_replace('/', '\\', $name);

        $dir = str_replace('/', '\\', 'App\\Models\\');

        $model = class_basename(trim($model, '\\'));

        $namespaceModel = $dir . ucfirst($model) . ' as ' . ucfirst($model) . 'Scope';

        if (Str::startsWith($model, '\\')) {
            $stub = str_replace('NamespacedDummyModel', trim($model, '\\'), $stub);
        } else {
            $stub = str_replace('NamespacedDummyModel', $namespaceModel, $stub);
        }

        $stub = str_replace(
            "use {$namespaceModel};\nuse {$namespaceModel};", "use {$namespaceModel};", $stub
        );

        $stub = str_replace('DummyScope', ucfirst($model), $stub);

        return str_replace('DummyScope', ucfirst($model), $stub);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/scope.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Scopes';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The scope class applies to'],
        ];
    }
}
