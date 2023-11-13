<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index() {
        return view('pegawai/pegawai', [
            "pegawai" => Pegawai::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function store(Request $request) {
        try {
            $cekPegawai = Pegawai::where('id', $request->id)->first();
            if($cekPegawai) {
                return back()->with([
                    "message" => "Gagal menambahkan pegawai, ID $request->id sudah ada!",
                    "status" => false,
                ]);
            }

            $pegawai = new Pegawai([
                'id' => $request->id,
                'nama_pegawai' => $request->nama_pegawai,
                'divisi' => $request->divisi,
                'phone'=> $request->phone,
                'email' => $request->email,
                'salary' => $request->salary
            ]);

            if($pegawai->save()) {
                return back()->with([
                    "message" => "Berhasil membuat data pegawai baru dengan ID $request->id",
                    "status" => true,
                ]);
            }
        } catch (\Throwable $th) {
            return back()->with([
                "message" => "Gagal membuat data pegawai, Error: " . json_encode($th->getMessage(), true),
                "status" => false,
            ]);
        }
    }

    public function edit($id) {
        try {
            $dataPegawai = Pegawai::where('id', $id)->first();
            return view('pegawai/pegawai-edit', [
                "data" => $dataPegawai
            ]);
        } catch (\Throwable $th) {
            return back()->with([
                "message" => "Gagal membuka data pegawai, Error: " . json_encode($th->getMessage(), true),
                "status" => false,
            ]);
        }
    }

    public function update(Request $request) {
        try {
            $pegawai = Pegawai::where('id', $request->id)->first();

            $pegawai->update([
                'nama_pegawai' => $request->nama_pegawai,
                'divisi' => $request->divisi,
                'phone' => $request->phone,
                'email' => $request->email,
                'salary' => $request->salary
            ]);

            return redirect()->route('pegawai')->with([
                "message" => "Berhasil mengubah data pegawai",
                "status" => true,
            ]);
        } catch (\Throwable $th) {
            return back()->with([
                "message" => "Gagal mengubah data pegawai, Error: " . json_encode($th->getMessage(), true),
                "status" => false,
            ]);
        }
    }

    public function destroy(Request $request) {
        try {
            foreach (Pegawai::where('id', $request->id)->get() as $deleteItem) {
                $deleteItem->delete();
            }
    
            return back()->with([
                "message" => "Hapus Pegawai Berhasil",
                "status" => true,
            ]);
        } catch (\Throwable $th) {
            return back()->with([
                "message" => "Hapus Pegawai Gagal, Error: " . json_encode($th->getMessage(), true),
                "status" => false,
            ]);
        }
    }
}
