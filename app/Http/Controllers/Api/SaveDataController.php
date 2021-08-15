<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penebak;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaveDataController extends Controller
{
    public function deletePenebak(Request $request)
    {
        $data = $request->all();
        $user = Penebak::find($data['inputidPenebak'])->delete();
        return response()->json(['success' => "Data berhasil di hapus"]);
    }
    public function saveCabangProfile(Request $request)
    {
        $data = $request->all();
        $user = User::find($data['inputidUser']);
        $user->name = $data['inputNamaProfile'];
        $user->email = $data['inputEmailProfile'];
        $user->save();
        return response()->json(['success' => "Data berhasil di update"]);
    }

    public function savePenebak(Request $request)
    {
        $data = $request->all();
        $penebak = Penebak::find($data['idPenebak']);
        $penebak->name = $data['inputNama'];
        $penebak->alamat_idena = $data['inputAddress'];
        $penebak->tipe_pembayaran = $data['inputJenisPembayaran'];
        $penebak->no_hp_pembayaran = $data['inputNoPembayaran'];
        $penebak->kepala_cabang = $data['inputKepalaCabang'];
        $penebak->save();
        return response()->json(['success' => "Data berhasil di update"]);
    }

    public function addPenebak(Request $request)
    {
        $data = $request->all();
        $penebak = new Penebak;
        $penebak->name = $data['inputNama'];
        $penebak->alamat_idena = $data['inputAddress'];
        $penebak->tipe_pembayaran = $data['inputJenisPembayaran'];
        $penebak->no_hp_pembayaran = $data['inputNoPembayaran'];
        $penebak->kepala_cabang = $data['inputKepalaCabang'];
        $penebak->save();
        return response()->json(['success' => "Data berhasil di update"]);
    }

    public function saveSSDompet(Request $request)
    {
        $extension = $request->file('imgupload')->extension();
        $imgname = date('dmyHis') . '.' . $extension;
        $this->validate($request, ['imgupload' => 'required|file|max:5000']);
        $path = Storage::putFileAs('public/SSDompet', $request->file('imgupload'), $imgname);

        $idPenebak = $request['id_penebak'];
        $penebak = Penebak::find($idPenebak);
        $penebak->image_dompet = $imgname;
        $penebak->save();
        return response()->json(['success' => "Data berhasil di update"]);
    }
}
