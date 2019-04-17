<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $json = storage_path() . "/json/users.json";
        $data = json_decode(file_get_contents($json, true));
        foreach ($data as $obj) {
            App\User::create([
                'id'         => $obj->id,
                'school_id'  => $obj->school_id,
                'role_id'    => $obj->role_id,
                'rfid_code'  => $obj->rfid_code,
                'given_name' => $obj->given_name,
                'last_name'  => $obj->last_name,
                'image'      => $obj->image,
                'username'   => $obj->username,
                'email'      => $obj->email,
                'password'   => $obj->password
            ]);
        }
    }
}
