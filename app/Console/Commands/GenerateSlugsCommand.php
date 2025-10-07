<?php

namespace App\Console\Commands;

use App\Models\Dosen;
use App\Models\Lab;
use Illuminate\Console\Command;

class GenerateSlugsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate slugs for models that use HasSlug trait';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating slugs for Dosen model...');
        $dosenCount = 0;
        
        // Generate slugs for Dosen model
        Dosen::all()->each(function ($dosen) use (&$dosenCount) {
            // Force regenerate the slug
            if (empty($dosen->slug)) {
                $dosen->slug = null; // Reset slug to ensure it's regenerated
                $dosen->save();
                $this->line("Generated slug '{$dosen->slug}' for dosen: {$dosen->nama}");
                $dosenCount++;
            }
        });
        
        $this->info("Generated slugs for {$dosenCount} dosen records.");
        
        // Generate slugs for Lab model
        $this->info('Generating slugs for Lab model...');
        $labCount = 0;
        
        Lab::all()->each(function ($lab) use (&$labCount) {
            // Force regenerate the slug if needed
            if (empty($lab->slug)) {
                $lab->slug = null; // Reset slug to ensure it's regenerated
                $lab->save();
                $this->line("Generated slug '{$lab->slug}' for lab: {$lab->nama_lab}");
                $labCount++;
            }
        });
        
        $this->info("Generated slugs for {$labCount} lab records.");
        
        $this->info('All slugs have been generated successfully!');
        
        return Command::SUCCESS;
    }
}
