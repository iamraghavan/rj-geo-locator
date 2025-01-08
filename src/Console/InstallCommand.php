<?php

namespace iamraghavan\CountryStateCity\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    protected $signature = 'rjgeo:install';
    protected $description = 'Install RJ Geo Locator package';

    public function handle()
    {
        // Adjust the path to the SQL files in the 'src/Database/SQL' folder
        $sqlPath = base_path('src/Database/SQL');  // Updated path
        $files = ['countries.sql', 'states.sql', 'cities.sql'];

        foreach ($files as $file) {
            $filePath = $sqlPath . '/' . $file;

            if (!File::exists($filePath)) {
                $this->error("SQL file not found: $file");
                return 1;
            }

            $this->info("Executing $file...");
            try {
                DB::unprepared(File::get($filePath));
                $this->info("$file executed successfully.");
            } catch (\Exception $e) {
                $this->error("Error executing $file: " . $e->getMessage());
                return 1;
            }
        }

        $this->info("RJ Geo Locator package installed successfully!");
        return 0;
    }
}
