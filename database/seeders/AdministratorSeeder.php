<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $administrator = new \App\Models\User;
        $administrator->username = "administrator";
        $administrator->name = "puji ermanto";
        $administrator->email = "pujiermanto@gmail.com";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = \Hash::make("ujiBandung2020");
        $administrator->avatar = "";
        $administrator->address = "Jl. Boeing Utara 1 No.7";
        $administrator->phone = "6288222668778";
        $administrator->save();

        $this->command->info("User Admin Berhasil di Insert");
    }
}
