<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;
use App\Models\Movie;

class MovieUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:up';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $files = Storage::disk('local')->files('temp/movies');
        $files = array_diff($files, ['temp/movies/.gitkeep']);

        foreach ($files as $file) {
            $pathinfo = pathinfo($file);
            Storage::move('temp/movies/' . $pathinfo['basename'], 'public/movies/' . $pathinfo['basename']);
            Movie::create([
                'name'  => $pathinfo['basename'],
                'title' => $pathinfo['filename'],
                'path'  => 'movies/' . $pathinfo['basename'],
                'size'  => 0,
                'time'  => 0,
            ]);
        }
    }
}
