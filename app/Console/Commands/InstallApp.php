<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notes:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install notes application';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Artisan::call('migrate:fresh');
        Category::create([
            'name' => 'Uncategorized',
            'description' => 'Notes that has no category assigned',
        ]);

        if ($this->confirm('Do you want testing data?')) {
            Artisan::call('db:seed');
        }
    }
}
