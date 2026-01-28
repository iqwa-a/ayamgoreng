<?php

/**
 * File: database/seeders/DatabaseSeeder.php
 * Tujuan: Titik masuk untuk menjalankan semua seeder di aplikasi.
 * Penjelasan singkat:
 * - Seeder bertugas mengisi (seed) database dengan data awal atau contoh.
 * - `DatabaseSeeder` biasanya memanggil seeder-seeder lain melalui `$this->call()`.
 * - Setelah menulis seeder, jalankan `php artisan db:seed` atau `php artisan migrate --seed`.
 */

namespace Database\Seeders;

use App\Models\User;
// Jika ingin menonaktifkan event model saat seeding, uncomment baris berikut.
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * Class `DatabaseSeeder`
 * - Extends `Seeder` dari Laravel.
 * - Method `run()` dieksekusi saat perintah `db:seed` dijalankan.
 * - Gunakan method ini untuk memanggil seeder lain atau membuat data langsung.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Penjelasan method:
     * - Method ini dipanggil oleh framework ketika menjalankan seeder utama.
     * - Di sini kita memanggil `AdminUserSeeder` agar data admin terbuat.
     * - Contoh pembuatan user dengan factory disertakan sebagai referensi.
     *
     * Cara menjalankan:
     * - `php artisan db:seed`  -> menjalankan `DatabaseSeeder` saja
     * - `php artisan db:seed --class=SomeOtherSeeder` -> menjalankan seeder tertentu
     */
    public function run(): void
    {
        // Memanggil seeder lain:
        // Baris ini akan mengeksekusi kelas seeder `AdminUserSeeder`.
        // Pastikan file `AdminUserSeeder` ada di folder yang sama.
        $this->call(AdminUserSeeder::class);

        // Contoh penggunaan factory untuk membuat satu user test.
        // - `User::factory()` membuat instance factory untuk model User.
        // - `create()` menyimpan record ke database.
        // Anda bisa menghapus atau mengubah data ini sesuai kebutuhan.
        User::factory()->create([
            'name' => 'doni',
            'email' => 'doni@mail.com',
        ]);
    }
}
