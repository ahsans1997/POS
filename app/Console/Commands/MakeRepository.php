<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        //RepositoryInterface
        $repositoryInterfaceName = $name . 'RepositoryInterface';
        $repositoryInterfacePath = app_path('Repositories/Interfaces/' . $repositoryInterfaceName . '.php');

        if (file_exists($repositoryInterfacePath)) {
            $this->error('Repository interface already exists!');
            return false;
        }

        $stubs = File::get(__DIR__ . '/stubs/RepositoryInterface.stub');
        $stubs = str_replace('{{repositoryInterfaceName}}', $repositoryInterfaceName, $stubs);

        File::put($repositoryInterfacePath, $stubs);

        //Repository
        $repositoryName = $name . 'Repository';
        $repositoryPath = app_path('Repositories/' . $repositoryName . '.php');

        if (file_exists($repositoryPath)) {
            $this->error('Repository already exists!');
            return false;
        }

        $stubs = File::get(__DIR__ . '/stubs/Repository.stub');
        $stubs = str_replace('{{repositoryInterfaceName}}', $repositoryInterfaceName, $stubs);
        $stubs = str_replace('{{repositoryName}}', $repositoryName, $stubs);

        File::put($repositoryPath, $stubs);

        $this->info('Repository & RepositoryInterface created successfully.');
    }
}
