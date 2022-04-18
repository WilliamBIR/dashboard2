<?php

namespace Database\Seeders;

// use App\Models\AgeDetector;
// use App\Models\CountPeople;
// use App\Models\EmotionDetector;
// use App\Models\GenderDetector;
// use App\Models\ObjectDetector;
//use App\Models\User;
use App\Models\Iteraccion;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // CountPeople::factory(100)->create();
        // EmotionDetector::factory(100)->create();
        // ObjectDetector::factory(100)->create();
        // AgeDetector::factory(100)->create();
        // GenderDetector::factory(100)->create();
        Iteraccion::factory(100)->create();
/*
        $user =  new User();
        $user->name = "Angel Martinez";
        $user->email = "angel.martinez@digital-solution.mx";
        $user->password = Hash::make('3qwW36vJhNJZ5Zx');
        $user->save();

        $user =  new User();
        $user->name = "Ernesto Moreno";
        $user->email = "ernesto.moreno@digital-solution.mx";
        $user->password = '$2y$10$7KbSea2Trp1o7/CzXZu1auw1jlyBLl83gWmDkSk87.MqRFG.RsYQa';
        $user->save();

        $user =  new User();
        $user->name = "Omar Arvizu";
        $user->email = "omar.arvizu@digital-solution.mx";
        $user->password = '$2y$10$tLeipc8GA0FI5OXzcl0aTegPBa5BykgYiNvg69z0VzA.xyZgo2pKe';
        $user->save();

        */
    }
}
