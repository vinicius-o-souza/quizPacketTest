<?php

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
        DB::table('users')->insert([
            'name'      => 'Vinicius',
            'email'     => 'viniciuso970@gmail.com',
            'password'  => bcrypt('123456')
        ]);
        $this->call(QuestionTypeSeeder::class);
        $this->call(QuestionnaireDespminasSeeder::class);
    }
}
