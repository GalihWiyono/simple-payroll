<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Gaji;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index() {
        return view('gaji/gaji', [
            "slipData" => Gaji::with('pegawai')->orderBy('tanggal', 'DESC')->get()
        ]);
    }

    public function store(Request $request) {
        try {
            $cekID = Pegawai::where('id', $request->id)->first();
            if ($cekID == null) {
                return back()->with([
                    "message" => "Absensi Gagal, ID tidak ditemukan!",
                    "status" => false,
                ]);
            }

            $countTerlambat = Absensi::select('*')->whereMonth('tanggal', Carbon::now()->month)->where('status', 'Terlambat')->get()->count();
            $denda = $countTerlambat * 50000;
            $gajiPokok = (int)$cekID->salary;
            $gajiBersih = $gajiPokok - $denda;
            $tanggal = Carbon::now()->format('Y-m-d');
            
            $slip = new Gaji([
                'pegawai_id' => $cekID->id,
                'gaji_pokok' => $cekID->salary,
                'denda' => $denda,
                'gaji_bersih' => $gajiBersih,
                'tanggal' => $tanggal
            ]);

            if($slip->save()) {
                return back()->with([
                    "message" => "Berhasil Generate Slip Gaji",
                    "status" => true,
                ]);
            }

        } catch (\Throwable $th) {
            return back()->with([
                "message" => "Generate Slip Gaji Gagal, Error: " . json_encode($th->getMessage(), true),
                "status" => false,
            ]);
        }
    }
 
}
