<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'id' => 1,
                'name' => 'Vladislav Aristakesyan',
                'email' => 'vladislav.aristakesyan@thrive.io',
                'password' => 'f+kSYp:fZ3<cBL>g',
            ]
        ];

        array_walk($items, function (& $item) {
            $item['password'] = \Hash::make($item['password']);
        });

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
