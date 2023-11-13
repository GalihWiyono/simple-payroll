<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        return view('absensi/absensi');
    }

    public function show() {
        return view('absensi/master-absensi', [
            'dataAbsensi' => Absensi::with('pegawai')->orderBy('tanggal', 'DESC')->get()
        ]);
    }

    public function store(Request $request)
    {
        try {
            $cekID = Pegawai::where('id', $request->id)->first();
            $time = Carbon::now();
            $cekAbsensi = Absensi::where([
                'id' => $request->id,
                'tanggal' => $time->format('Y-m-d')
            ])->first();

            if ($cekID == null) {
                return back()->with([
                    "message" => "Absensi Gagal, ID tidak ditemukan!",
                    "status" => false,
                ]);
            }

            if($cekAbsensi != null) {
                return back()->with([
                    "message" => "Absensi Gagal, ID sudah melakukan absensi!",
                    "status" => false,
                ]);
            }

            $waktuMulaiKerja = "08:00:00";
            $status = "Ontime";
            if ($waktuMulaiKerja < $time->format('H:i')) {
                $status = "Terlambat";
            }
            $absensi = new Absensi([
                'pegawai_id' => $request->id,
                'tanggal' => $time->format('Y-m-d'),
                'waktu_absensi' => $time->format('H:i'),
                'status' => $status
            ]);

            $absensi->save();

            return back()->with([
                "message" => "Absensi Berhasil!",
                "status" => true,
            ]);
        } catch (\Throwable $th) {
            return back()->with([
                "message" => "Absensi Gagal, Error: " . json_encode($th->getMessage(), true),
                "status" => false,
            ]);
        }
    }
}
