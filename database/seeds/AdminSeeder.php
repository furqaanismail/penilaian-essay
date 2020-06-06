<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $waktu = Carbon::now();
        DB::table('admin')->insert([
            'username' => 'admin',
            'nama' => 'agustian',
            'password' => app('hash')->make('admin123'),
            'created_at' => $waktu->toDateTimeString(),
            'updated_at' => $waktu->toDateTimeString()
        ]);
    }
}
