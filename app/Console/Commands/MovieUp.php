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
            $pathInfo = pathinfo($file);

            $fileSize = Storage::size($file);
            $baseName = $pathInfo['basename'];
            $extension = $pathInfo['extension'];
            $hashName = hash_file('sha512', storage_path('app/' . $file));
            $filePath = $hashName . '.' . $extension;
            Storage::move('temp/movies/' . $pathInfo['basename'], 'public/movies/' . $filePath);
            $movie = Movie::create([
                'name'      => $hashName,
                'status'    => 'public',
                'title'     => $pathInfo['filename'],
                'path'      => $filePath,
                'extension' => $extension,
                'size'      => $fileSize,
                'time'      => 0,
            ]);

            $this->info("[$movie->path] $movie->title");
        }
    }
}
