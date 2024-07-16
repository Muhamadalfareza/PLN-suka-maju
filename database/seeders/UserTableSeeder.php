<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Bill;
use App\Models\categori;
use App\Models\MeterReading;
use Carbon\Carbon;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Panggil seeder kategori
        $this->call(CategorySeeder::class);

        // Membuat user admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@pln.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Membuat beberapa user biasa
        $users = User::factory()->count(5)->create();

        // Mengisi data tagihan dan pengukuran kWh untuk setiap user
        foreach ($users as $user) {
            // Membuat beberapa pengukuran kWh untuk setiap user
            for ($j = 0; $j < 2; $j++) {
                $meterReading = MeterReading::create([
                    'user_id' => $user->id,
                    'number_parameter' => str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT), // Nomor parameter acak 10 digit
                    'category_id' => rand(
                        1,
                        8
                    ), // Pilih secara acak dari kategori yang sudah ada
                    'reading_date' => Carbon::now()->subMonths(12)->addMonths(rand(0, 11)), // Tanggal pengukuran kWh dalam 12 bulan terakhir
                ]);

                // Ambil kategori untuk mendapatkan harga yang sesuai
                $category = categori::find($meterReading->category_id);

                // Pastikan kategori ditemukan
                if ($category) {
                    // Hitung jumlah tagihan berdasarkan harga kategori
                    $harga = $category->price; // Sesuaikan perhitungan sesuai dengan logika aplikasi Anda
                    $hours = rand(1, 100);
                    // Buat tagihan pertama bulan ini yang sudah dibayar
                    Bill::create([
                        'user_id' => $user->id,
                        'meter_reading_id' => $meterReading->id,
                        'hours' => $hours, // Penggunaan daya acak antara 1-100 kWh
                        'harga' => $harga * $hours, // Jumlah tagihan berdasarkan penggunaan daya
                        'due_date' => Carbon::now()->subDays(rand(1, 15)), // Tagihan jatuh tempo acak dalam 15 hari terakhir
                        'paid_status' => 1, // Status pembayaran (1: sudah dibayar)
                        'paid_at' => Carbon::now()->subDays(rand(1, 15)), // Tanggal pembayaran acak dalam 15 hari terakhir
                    ]);

                    // Buat tagihan bulan ini yang belum dibayar
                    Bill::create([
                        'user_id' => $user->id,
                        'meter_reading_id' => $meterReading->id,
                        'hours' => 0,
                        'harga' => $harga * 0,
                        'due_date' => Carbon::now()->addDays(rand(1, 30)), // Tagihan jatuh tempo acak dalam 30 hari
                        'paid_status' => 0, // Status pembayaran (0: belum dibayar)
                        'paid_at' => null, // Tanggal pembayaran null karena belum dibayar
                    ]);
                }
            }
        }
    }
}
