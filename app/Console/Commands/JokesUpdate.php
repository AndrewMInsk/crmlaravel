<?php

namespace App\Console\Commands;

use App\Services\Joke\JokeService;
use Illuminate\Console\Command;

class JokesUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:jokes-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Забирает одну шутку и сохраняет ее в базу';

    /**
     * Execute the console command.
     */
    public function handle(JokeService $jokeService)
    {
        $jokeData = $jokeService->getRandomJoke();
        
        if ($jokeData) {
            $joke = $jokeService->saveJoke($jokeData);
            
            if ($joke) {
                $this->info('Все ок');
            } else {
                $this->error('Что-то пошло не так');
            }
        } else {
            $this->error('API отвалилось');
        }
    }
}