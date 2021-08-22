<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DompetDigital;
use App\Models\HistoryValidasi;
use App\Models\Penebak;
use App\Models\User;
use App\Models\Validasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaveDataController extends Controller
{
    public function deletePenebak(Request $request)
    {
        $data = $request->all();
        $user = Penebak::find($data['inputidPenebak'])->delete();
        return response()->json(['success' => "Data berhasil dihapus"]);
    }
    public function saveCabangProfile(Request $request)
    {
        $data = $request->all();
        $user = User::find($data['inputidUser']);
        $user->name = $data['inputNamaProfile'];
        $user->email = $data['inputEmailProfile'];
        $user->save();
        return response()->json(['success' => "Data berhasil diupdate"]);
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
        return response()->json(['success' => "Data berhasil diupdate"]);
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
        return response()->json(['success' => "Data berhasil diupdate"]);
    }

    // ------------------------------------------------------

    public function saveHistory(Request $request)
    {
        $data = $request->all();
        $historyValidasi = new HistoryValidasi;
        $historyValidasi->id_penebak = $data['idPenebak'];
        $historyValidasi->id_validasi = $data['inputTglValidasi'];
        $historyValidasi->epoch = $data['inputEpoch'];
        $historyValidasi->age = $data['inputAge'];
        $historyValidasi->prevstate = $data['inputPrevState'];
        $historyValidasi->state = $data['inputState'];
        $historyValidasi->nilai = $data['inputNilai'];
        $historyValidasi->save();
        return response()->json(['success' => "Data berhasil disimpan"]);
    }

    public function editHistory(Request $request)
    {
        $data = $request->all();
        $historyValidasi = HistoryValidasi::find($data['idEditHistory']);
        $historyValidasi->id_validasi = $data['inputEditTglValidasi'];
        $historyValidasi->epoch = $data['inputEditEpoch'];
        $historyValidasi->age = $data['inputEditAge'];
        $historyValidasi->prevstate = $data['inputEditPrevState'];
        $historyValidasi->state = $data['inputEditState'];
        $historyValidasi->nilai = $data['inputEditNilai'];
        $historyValidasi->save();
        return response()->json(['success' => "Data berhasil disimpan"]);
    }


    public function deleteHistory(Request $request)
    {
        $data = $request->all();
        $historyValidasi = HistoryValidasi::find($data['idHistoryDelete'])->delete();
        return response()->json(['success' => "Data berhasil di hapus"]);
    }

    // ------------------------------------------------------

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
        return response()->json(['success' => "Data berhasil diupdate"]);
    }


    // ------------------------------------------------------
    public function addDompet(Request $request)
    {
        $data = $request->all();
        $dompet = new DompetDigital;
        $dompet->nama_dompet = $data['inputNamaDompet'];
        $dompet->save();
        return response()->json(['success' => "Data berhasil di update"]);
    }
    public function deleteDompet(Request $request)
    {
        $data = $request->all();
        $dompet = DompetDigital::find($data['inputDeleteIdDompet'])->delete();
        return response()->json(['success' => "Data berhasil di hapus"]);
    }
    public function editDompet(Request $request)
    {
        $data = $request->all();
        $dompet = DompetDigital::find($data['inputeditiddompet']);
        $dompet->nama_dompet = $data['inputeditNamaDompet'];
        $dompet->save();
        return response()->json(['success' => "Data berhasil di update"]);
    }
    // ------------------------------------------------------

    public function addValidasi(Request $request)
    {
        $data = $request->all();
        $validasi = new Validasi;
        $validasi->tanggal_validasi = $data['inputTanggalValidasi'];
        $validasi->save();
        return response()->json(['success' => "Data berhasil di update"]);
    }
    public function deleteValidasi(Request $request)
    {
        $data = $request->all();
        $validasi = Validasi::find($data['inputDeleteIdValidasi'])->delete();
        return response()->json(['success' => "Data berhasil di hapus"]);
    }
    public function editValidasi(Request $request)
    {
        $data = $request->all();
        $validasi = Validasi::find($data['inputeditidValidasi']);
        $validasi->tanggal_validasi = $data['inputeditTanggalValidasi'];
        $validasi->save();
        return response()->json(['success' => "Data berhasil di update"]);
    }
}
