<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Board;
use App\Models\Topic;
use App\Models\Category;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AddDemoData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dev:add-demo-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds the test user, and a board with several categories and topics each.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::firstOrCreate(
            [
                'email' => 'test@retrome.dev',
            ],
            [
                'name' => 'RetroMe Test User',
                'password' => '$2y$12$NCyQ22V//2/uHPz8AsA8GO2DlV33uUMh2xZKkeXF/aoHA1uKIvAS6' // retrome,
            ]
        );

        $board = Board::factory()->for($user, 'creator')->create();

        $categories = Category::factory()
            ->for($board)
            ->has(Topic::factory()->for($user, 'creator')->for($board, 'board')->count(3))
            ->count(3)
            ->create();
    }
}
