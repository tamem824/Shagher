<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            'name' => 'Damascus',
            'created_at' => now(),
            'updated_at' => now(),]);

        DB::table('locations')->insert([
            'name' => 'Qonetra',
            'created_at' => now(),
            'updated_at' => now(),]);

        DB::table('locations')->insert([
            'name' => 'Daraah',
            'created_at' => now(),
            'updated_at' => now(),]);

        DB::table('locations')->insert([
            'name' => 'Aleppo',
            'created_at' => now(),
            'updated_at' => now(),]);

        DB::table('locations')->insert([
            'name' => 'Swidaa',
            'created_at' => now(),
            'updated_at' => now(),]);

        DB::table('locations')->insert([
            'name' => 'AlRaqah',
            'created_at' => now(),
            'updated_at' => now(),]);

        DB::table('locations')->insert([
            'name' => 'Latakia',
            'created_at' => now(),
            'updated_at' => now(),]);
        DB::table('locations')->insert([
            'name' => 'Tartus',
            'created_at' => now(),
            'updated_at' => now(),]);
        DB::table('locations')->insert([
            'name' => 'Homs',
            'created_at' => now(),
            'updated_at' => now(),]);
        DB::table('locations')->insert([
            'name' => 'Alhasakeh',
            'created_at' => now(),
            'updated_at' => now(),]);
        DB::table('locations')->insert([
            'name' => 'Hamaah',
            'created_at' => now(),
            'updated_at' => now(),]);
        DB::table('locations')->insert([
            'name' => 'Edleab',
            'created_at' => now(),
            'updated_at' => now(),]);
    }
}


