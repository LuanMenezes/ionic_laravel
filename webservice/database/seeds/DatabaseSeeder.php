<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Offer;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $email = 'admin@test.com';

        $users = User::where('email', '=', $email);
        if ($users->count()) {
            $user = $users->first();
        } else {
            $user = new User;
        }

        $user->name = "Admin";
        $user->email = $email;
        $user->password = bcrypt("123123");

        $user->save();

        $offer = [
            'title' => "Offer001",
            'description' => "Description 001",
            'price' => 3.99,
            'price_f' => 'R$ 3,99',
            'validity' => '2018-01-31',
            'img' => 'https://upload.wikimedia.org/wikipedia/commons/6/66/Box_ballonicon2.png'
        ];

        Offer::create($offer);
    }
}
