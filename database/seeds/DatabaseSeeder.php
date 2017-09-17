<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("admins")->insert([
            "login" => "admin",
            "password" => Hash::make("admin"),
            "name" => "Александр Воронков",
            "status" => 1
        ]);
    }
}
