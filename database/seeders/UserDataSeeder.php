<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$user = new User;
    	$user->name = "Puji Ermanto";
    	$user->email = "pujiermanto@gmail.com";
    	$user->password = Hash::make('ujiBandung2020');
    	$user->username = "administrator";
    	$user->roles = json_encode(["ADMIN"]);
    	$user->address = "Jl. Boeing Utara 1 No.7";
    	$user->phone = "088222668778";
    	$user->avatar = "administrator/profile/VBaRe13jR3isDZO699C2BHVkrylirdPN3fAjom2N.jpg";
    	$user->status = "ACTIVE";
    	$user->achievements = "NULL";
    	$user->save();

    	// Profile seeder
    	$profile = new Profile;
    	$profile->user_id = $user->id;
    	$profile->quotes = "Kaji dan dalamilah sebelum engkau menduduki jabata...";
    	$profile->cover = "administrator/covers/Cl8rxRRBKSsrRS9UXMOqA5uTuh16caKbzp4jKB1Q.jpg";
    	$profile->about = "Halo gaess ! Perkenalkan saya puji ermanto, saya...";
    	$profile->instagram = "pujiermanto";
    	$profile->facebook = "pujiermanto";
    	$profile->youtube = "https://www.youtube.com/channel/UCxptCTRqJ5amS9nmztsG7jw";
    	$profile->city = "Kota Bandung";
    	$profile->province = "Jawa Barat";
    	$profile->parallax = "administrator/parallax/Ulj7Wu7TQTzKbTR8qc4tbyZNYek1g8g8NDpgQ6FS.png";
  		$profile->save();

    }
}
