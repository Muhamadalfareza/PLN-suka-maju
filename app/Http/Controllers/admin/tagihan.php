<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\categori;
use App\Models\MeterReading;
use Illuminate\Http\Request;
use Carbon\Carbon; 

class tagihan extends Controller
{

public function list($id)
{
    // ambildata meteran dan tagihan dari meteran
    $meteran = MeterReading::findOrFail($id);
    $tagihan = Bill::where('meter_reading_id', $id)->get();

    // carbon not fount
    $nowdate = Carbon::now();

    if ($tagihan->isEmpty()) {
        // Jika tidak ada tagihan sebelumnya, buat tagihan baru
        $reading_date = Carbon::parse($meteran->reading_date); // Convert string to Carbon instance
        $due_date = $reading_date->addMonth(); // Add one month

        Bill::create([
            'meter_reading_id' =>$id,
            'user_id' => $meteran->user_id,
            'harga' => 0,
            'due_date' => $due_date,
            'hours' => 0,
            'paid_status' => 0,
            // 'paid_at' => null
        ]);

        $tagihan = Bill::where('meter_reading_id', $id)->get();
    } else {
        // Jika ada tagihan sebelumnya, periksa apakah sudah lewat satu bulan dari due_date terakhir
        $lastBill = $tagihan->last();

        $due_date_last = Carbon::parse($lastBill->due_date);
        $due_date_next = $due_date_last->addMonth();

        if ($nowdate->greaterThan($due_date_next)) {
            // Jika sudah lewat satu bulan, buat tagihan baru
            Bill::create([
                'meter_reading_id' =>$id,
                'user_id' => $meteran->user_id,
                'harga' => 0,
                'due_date' => $due_date_next,
                'hours' => 0,
                'paid_status' => 0,
                // 'paid_at' => null
            ]);

            $tagihan = Bill::where('meter_reading_id', $id)->get();
        }
    }

    // return $tagihan;

    return view('admin.tagihan.list', compact('meteran', 'tagihan'));
}


    public function inputHours(Request $request)
    {
        // validasi inputan
        $request->validate([
            'hours' => 'required|numeric|min:1',
            'meter_reading_id' => 'required|exists:meter_readings,id',
            'bill_id' => 'required|exists:bills,id',
        ]);

        // mengambil data kategori
        $meter = MeterReading::where('id', $request->meter_reading_id)->first();
        if ($meter) {
            $kategori = categori::where('id', $meter->category_id)->first();
        }else{
            return redirect()->back();
            
        }
        // memalukan perkalan daya dan harga kategori
        $harga = $request->hours * $kategori->price;

        // update bills
        Bill::where('id', $request->bill_id)->update([
            'hours' => $request->hours,
            'harga' => $harga,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan tagihan');
    }
}
