<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DompetDigital;
use App\Models\HistoryValidasi;
use App\Models\Penebak;
use App\Models\User;
use App\Models\Validasi;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
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
        $penebak->name_penebak = $data['inputNama'];
        $penebak->alamat_idena = $data['inputAddress'];
        $penebak->id_dompet = $data['inputJenisPembayaran'];
        $penebak->no_pembayaran = $data['inputNoPembayaran'];
        $penebak->id_kepala_cabang = $data['inputKepalaCabang'];
        $penebak->save();
        return response()->json(['success' => "Data berhasil diupdate"]);
    }

    public function addPenebak(Request $request)
    {
        $data = $request->all();
        $penebak = new Penebak;
        $penebak->name_penebak = $data['inputNama'];
        $penebak->alamat_idena = $data['inputAddress'];
        $penebak->id_dompet = $data['inputJenisPembayaran'];
        $penebak->no_pembayaran = $data['inputNoPembayaran'];
        $penebak->id_kepala_cabang = $data['inputKepalaCabang'];
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
    // ------------------------------------------------------

    public function syncData(Request $request)
    {
        $data = $request->all();
        $dataId = request()->segment(3);
        $arrEpoch = [];
        $lastEpoch = DB::table('validasi_history')
            ->select("epoch")
            ->where('id_penebak', $dataId)
            ->get();

        foreach ($lastEpoch as $epochTemp) {
            array_push($arrEpoch, $epochTemp->epoch);
        };

        foreach ($data['result'] as $dataLoop) {
            if (in_array($dataLoop['epoch'], $arrEpoch)) {
                continue;
            } else {
                $url = "https://api.idena.io/api/Epoch/" . $dataLoop['epoch'];
                $tgl_validasi = Http::get($url)['result']['validationTime'];

                $historyValidasi = new HistoryValidasi;
                $historyValidasi->id_penebak = $dataId;
                $historyValidasi->epoch = $dataLoop['epoch'];
                $historyValidasi->tgl_validasi = date('Y-m-d h:i:s', strtotime($tgl_validasi));
                $historyValidasi->age =  ($dataLoop['epoch'] - $dataLoop['birthEpoch']) + 1;
                $historyValidasi->prevstate = $dataLoop['prevState'];
                $historyValidasi->state = $dataLoop['state'];

                if ($dataLoop['totalShortAnswers']['point'] == "0" || $dataLoop['totalShortAnswers']['point'] == 0) {
                    $score = 0;
                } else {
                    $point = $dataLoop['totalShortAnswers']['point'];
                    $flipsCount = $dataLoop['totalShortAnswers']['flipsCount'];
                    $score = round((($point / $flipsCount) * 100), 2);
                }



                $historyValidasi->nilai = $score;


                $state = $dataLoop['state'];
                $prevState = $dataLoop['prevState'];
                $statusNilai = "";
                $jumlahPembayaran = 0;

                if ($state == "Newbie") {
                    $statusNilai = "Newbie";
                    $jumlahPembayaran = 20000;;
                } else if ($state == "Verified") {
                    if ($prevState == "Newbie") {
                        $statusNilai = "Newbie => Verified";
                        $jumlahPembayaran = 75000;
                    } else {
                        if ($score < 100) {
                            $statusNilai = "Verified < 100%";
                            $jumlahPembayaran = 35000;
                        } else {
                            $statusNilai = "Verified 100%";
                            $jumlahPembayaran = 40000;
                        }
                    }
                } else if ($state == "Human") {
                    if ($score < 100) {
                        $statusNilai = "Human < 100%";
                        $jumlahPembayaran = 40000;
                    } else {
                        $statusNilai = "Human 100%";
                        $jumlahPembayaran = 50000;
                    }
                } else {
                    $statusNilai = "Gagal";
                    $jumlahPembayaran = 10000;
                }

                $historyValidasi->status_nilai = $statusNilai;
                $historyValidasi->jumlah_pembayaran = $jumlahPembayaran;


                $historyValidasi->save();
            }
        }
        return response()->json(['success' => "Data berhasil disimpan"]);
    }
    public function syncBalance(Request $request)
    {
        $dataId = request()->segment(3);

        $penebak = Penebak::where("id_kepala_cabang", $dataId)->get();

        foreach ($penebak as $row) {

            $url = "https://api.idena.io/api/Address/" . $row->alamat_idena;

            $penebakSave = Penebak::find($row->id_penebak);
            $dataSave = Http::get($url);
            $penebakSave->balance = $dataSave['result']['balance'];
            $penebakSave->stake = $dataSave['result']['stake'];
            $penebakSave->save();
        }

        return response()->json(['success' => "Data berhasil disimpan"]);
    }
    // ------------------------------------------------------

    public function editStatusPembayaran(Request $request)
    {
        $data = $request->all();
        $validasi = HistoryValidasi::find($data['data']);
        if ($validasi->status_pembayaran == "Belum") {
            $validasi->status_pembayaran = "Selesai";
        } else {
            $validasi->status_pembayaran = "Belum";
        }
        $validasi->save();
        return response()->json(['success' => "Berhasil di update"]);
    }

    public function editKeterangan(Request $request)
    {
        $data = $request->all();
        $history = HistoryValidasi::find($data['id_history']);
        $history->keterangan = $data['inputKeterangan'];
        $history->save();
        return response()->json(['success' => "Data berhasil di update"]);
    }
}
