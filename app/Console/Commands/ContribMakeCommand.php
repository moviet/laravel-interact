<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class ContribMakeCommand extends GeneratorCommand
{
    /**
     * 
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:contrib {name} {--c}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new contributions';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Contribs';

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    public function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);

        $names = $this->argument('name');
        $names = str_replace('/', ' ', $names);
        $names = explode(' ', $names);

        if ($this->option('c')) {       
            $stubs = str_replace('trait', 'class', $stub);  

        } else {
            $stubs = str_replace('trait', 'trait', $stub);  
        }

        return str_replace('DummyTraits', $names[1], $stubs);     
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/contrib.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Contribs';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The contrib traits applies to'],
        ];
    }

    
    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['cls', 'c', InputOption::VALUE_OPTIONAL, 'Create contribs class'],
        ];
    }
}
