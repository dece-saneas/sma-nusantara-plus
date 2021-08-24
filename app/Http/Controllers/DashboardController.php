<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Gelombang;
use App\Models\Identitas;
use App\Models\Keluarga;
use App\Models\User;
use App\Models\Country;
use App\Models\Berkas;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        
        if(Auth::user()->gelombang_id !== NULL) {
            $gelombang = Gelombang::findOrFail(Auth::user()->gelombang_id);

            if($gelombang->end_period->isPast()) {
                if(Auth::user()->status !== 'Verified') {
                    $user->gelombang_id = NULL;
                    $user->status = NULL;
                    $user->save();
                }
            }
        }
        
        return view('dashboard');
    }
    
    public function select_gelombang($id)
    {
        $user = User::findOrFail(Auth::id());
        $gelombang = Gelombang::findOrFail($id);
        
        $user->gelombang_id = $id;
        $user->status = 'Isi Identitas';
        $user->save();
        
        $identitas = Identitas::create([ 'user_id' =>  Auth::id() ]);        
        $keluarga = Keluarga::create([ 'user_id' =>  Auth::id() ]);
		
        return redirect()->route('dashboard');
    }
    
    public function identitas()
    { if(Auth::user()->gelombang_id == NULL) abort(404);
        $identitas = Identitas::where('user_id', Auth::id())->first();
        $keluarga = Keluarga::where('user_id', Auth::id())->first();
        $countries = Country::orderBy('langEN', 'ASC')->get();
        
        return view('pages.identitas', ['identitas' => $identitas, 'keluarga' => $keluarga, 'countries' => $countries]);
    }
    
    public function identitas_update(Request $request)
    {        
        $user = User::findOrFail(Auth::id());
        $identitas = Identitas::where('user_id', Auth::id())->first();
        $keluarga = Keluarga::where('user_id', Auth::id())->first();
        
        $this->validate($request,[
            // calon siswa
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'status' => 'required',
            'anak_ke' => 'required',
            'keadaan_ayah' => 'required',
            'keadaan_ibu' => 'required',
            
            // tempat tinggal
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'negara' => 'required',
            'no_handphone' => 'required',
            'tinggal_dengan' => 'required',
            'kesekolah_dengan' => 'required',
            
            // kesehatan
            'gol_darah' => 'required',
            'tinggi' => 'required',
            'berat' => 'required',
            
            // pendidikan
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'no_sttb' => 'required',
            'lama_belajar' => 'required',
            
            // wali kandung
            'nama_wali' => 'required',
            'tempat_lahir_wali' => 'required',
            'tanggal_lahir_wali' => 'required',
            'agama_wali' => 'required',
            'kewarganegaraan_wali' => 'required',
            'pendidikan_wali' => 'required',
            'pekerjaan_wali' => 'required',
            'penghasilan_wali' => 'required',
            'alamat_wali' => 'required',
            'kelurahan_wali' => 'required',
            'kecamatan_wali' => 'required',
            'kota_wali' => 'required',
            'provinsi_wali' => 'required',
            'kode_pos_wali' => 'required',
            'negara_wali' => 'required',
            'no_handphone_wali' => 'required',
        ]);
        
        if($request->keadaan_ayah == 'Masih Ada') {
            $this->validate($request,[
                'nama_ayah' => 'required',
                'tempat_lahir_ayah' => 'required',
                'tanggal_lahir_ayah' => 'required',
                'agama_ayah' => 'required',
                'kewarganegaraan_ayah' => 'required',
                'pendidikan_ayah' => 'required',
                'pekerjaan_ayah' => 'required',
                'penghasilan_ayah' => 'required',
                'alamat_ayah' => 'required',
                'kelurahan_ayah' => 'required',
                'kecamatan_ayah' => 'required',
                'kota_ayah' => 'required',
                'provinsi_ayah' => 'required',
                'kode_pos_ayah' => 'required',
                'negara_ayah' => 'required',
                'no_handphone_ayah' => 'required',
            ]);
            
            $keluarga->nama_ayah = $request->nama_ayah;
            $keluarga->tempat_lahir_ayah = $request->tempat_lahir_ayah;
            $keluarga->tanggal_lahir_ayah = date("Y-m-d", strtotime($request->tanggal_lahir_ayah)).' 00:00:00';
            $keluarga->agama_ayah = $request->agama_ayah;
            $keluarga->kewarganegaraan_ayah = $request->kewarganegaraan_ayah;
            $keluarga->pendidikan_ayah = $request->pendidikan_ayah;
            $keluarga->pekerjaan_ayah = $request->pekerjaan_ayah;
            $keluarga->penghasilan_ayah = $request->penghasilan_ayah;
            $keluarga->alamat_ayah = $request->alamat_ayah;
            $keluarga->kelurahan_ayah = $request->kelurahan_ayah;
            $keluarga->kecamatan_ayah = $request->kecamatan_ayah;
            $keluarga->kota_ayah = $request->kota_ayah;
            $keluarga->provinsi_ayah = $request->provinsi_ayah;
            $keluarga->kode_pos_ayah = $request->kode_pos_ayah;
            $keluarga->negara_ayah = $request->negara_ayah;
            $keluarga->no_handphone_ayah = $request->no_handphone_ayah;
            $keluarga->save();
        }else {
            $keluarga->nama_ayah = NULL;
            $keluarga->tempat_lahir_ayah = NULL;
            $keluarga->tanggal_lahir_ayah = NULL;
            $keluarga->agama_ayah = NULL;
            $keluarga->kewarganegaraan_ayah = NULL;
            $keluarga->pendidikan_ayah = NULL;
            $keluarga->pekerjaan_ayah = NULL;
            $keluarga->penghasilan_ayah = NULL;
            $keluarga->alamat_ayah = NULL;
            $keluarga->kelurahan_ayah = NULL;
            $keluarga->kecamatan_ayah = NULL;
            $keluarga->kota_ayah = NULL;
            $keluarga->provinsi_ayah = NULL;
            $keluarga->kode_pos_ayah = NULL;
            $keluarga->negara_ayah = NULL;
            $keluarga->no_handphone_ayah = NULL;
            $keluarga->save();
            
        }
        
        if($request->keadaan_ibu == 'Masih Ada') {
            $this->validate($request,[
                'nama_ibu' => 'required',
                'tempat_lahir_ibu' => 'required',
                'tanggal_lahir_ibu' => 'required',
                'agama_ibu' => 'required',
                'kewarganegaraan_ibu' => 'required',
                'pendidikan_ibu' => 'required',
                'pekerjaan_ibu' => 'required',
                'penghasilan_ibu' => 'required',
                'alamat_ibu' => 'required',
                'kelurahan_ibu' => 'required',
                'kecamatan_ibu' => 'required',
                'kota_ibu' => 'required',
                'provinsi_ibu' => 'required',
                'kode_pos_ibu' => 'required',
                'negara_ibu' => 'required',
                'no_handphone_ibu' => 'required',
            ]);
            
            $keluarga->nama_ibu = $request->nama_ibu;
            $keluarga->tempat_lahir_ibu = $request->tempat_lahir_ibu;
            $keluarga->tanggal_lahir_ibu = date("Y-m-d", strtotime($request->tanggal_lahir_ibu)).' 00:00:00';
            $keluarga->agama_ibu = $request->agama_ibu;
            $keluarga->kewarganegaraan_ibu = $request->kewarganegaraan_ibu;
            $keluarga->pendidikan_ibu = $request->pendidikan_ibu;
            $keluarga->pekerjaan_ibu = $request->pekerjaan_ibu;
            $keluarga->penghasilan_ibu = $request->penghasilan_ibu;
            $keluarga->alamat_ibu = $request->alamat_ibu;
            $keluarga->kelurahan_ibu = $request->kelurahan_ibu;
            $keluarga->kecamatan_ibu = $request->kecamatan_ibu;
            $keluarga->kota_ibu = $request->kota_ibu;
            $keluarga->provinsi_ibu = $request->provinsi_ibu;
            $keluarga->kode_pos_ibu = $request->kode_pos_ibu;
            $keluarga->negara_ibu = $request->negara_ibu;
            $keluarga->no_handphone_ibu = $request->no_handphone_ibu;
            $keluarga->save();
        }else {
            $keluarga->nama_ibu = NULL;
            $keluarga->tempat_lahir_ibu = NULL;
            $keluarga->tanggal_lahir_ibu = NULL;
            $keluarga->agama_ibu = NULL;
            $keluarga->kewarganegaraan_ibu = NULL;
            $keluarga->pendidikan_ibu = NULL;
            $keluarga->pekerjaan_ibu = NULL;
            $keluarga->penghasilan_ibu = NULL;
            $keluarga->alamat_ibu = NULL;
            $keluarga->kelurahan_ibu = NULL;
            $keluarga->kecamatan_ibu = NULL;
            $keluarga->kota_ibu = NULL;
            $keluarga->provinsi_ibu = NULL;
            $keluarga->kode_pos_ibu = NULL;
            $keluarga->negara_ibu = NULL;
            $keluarga->no_handphone_ibu = NULL;
            $keluarga->save();
            
        }
        
        $identitas->jenis_kelamin = $request->jenis_kelamin;
        $identitas->tempat_lahir = $request->tempat_lahir;
        $identitas->tanggal_lahir = date("Y-m-d", strtotime($request->tanggal_lahir)).' 00:00:00';
        $identitas->agama = $request->agama;
        $identitas->kewarganegaraan = $request->kewarganegaraan;
        $identitas->status = $request->status;
        $identitas->anak_ke = $request->anak_ke;
        $identitas->jumlah_saudara_kandung = $request->jumlah_saudara_kandung;
        $identitas->jumlah_saudara_tiri = $request->jumlah_saudara_tiri;
        $identitas->alamat = $request->alamat;
        $identitas->kelurahan = $request->kelurahan;
        $identitas->kecamatan = $request->kecamatan;
        $identitas->kota = $request->kota;
        $identitas->provinsi = $request->provinsi;
        $identitas->kode_pos = $request->kode_pos;
        $identitas->negara = $request->negara;
        $identitas->no_handphone = $request->no_handphone;
        $identitas->tinggal_dengan = $request->tinggal_dengan  ;
        $identitas->jarak_ke_sekolah = $request->jarak_ke_sekolah;
        $identitas->kesekolah_dengan = $request->kesekolah_dengan;
        $identitas->gol_darah = $request->gol_darah;
        $identitas->tinggi = $request->tinggi;
        $identitas->berat = $request->berat;
        $identitas->penyakit = $request->penyakit;
        $identitas->kelainan = $request->kelainan;
        $identitas->nama_sekolah = $request->nama_sekolah;
        $identitas->alamat_sekolah = $request->alamat_sekolah;
        $identitas->no_sttb = $request->no_sttb;
        $identitas->lama_belajar = $request->lama_belajar;
        $identitas->dari_sekolah = $request->dari_sekolah;
        $identitas->alasan = $request->alasan;
        $identitas->iq = $request->iq;
        $identitas->kesenian = $request->kesenian;
        $identitas->olahraga = $request->olahraga;
        $identitas->organisasi = $request->organisasi;
        $identitas->karya = $request->karya;
        $identitas->save();
        
        $keluarga->nama_wali = $request->nama_wali;
        $keluarga->tempat_lahir_wali = $request->tempat_lahir_wali;
        $keluarga->tanggal_lahir_wali = date("Y-m-d", strtotime($request->tanggal_lahir_wali)).' 00:00:00';
        $keluarga->agama_wali = $request->agama_wali;
        $keluarga->kewarganegaraan_wali = $request->kewarganegaraan_wali;
        $keluarga->pendidikan_wali = $request->pendidikan_wali;
        $keluarga->pekerjaan_wali = $request->pekerjaan_wali;
        $keluarga->penghasilan_wali = $request->penghasilan_wali;
        $keluarga->alamat_wali = $request->alamat_wali;
        $keluarga->kelurahan_wali = $request->kelurahan_wali;
        $keluarga->kecamatan_wali = $request->kecamatan_wali;
        $keluarga->kota_wali = $request->kota_wali;
        $keluarga->provinsi_wali = $request->provinsi_wali;
        $keluarga->kode_pos_wali = $request->kode_pos_wali;
        $keluarga->negara_wali = $request->negara_wali;
        $keluarga->no_handphone_wali = $request->no_handphone_wali;
        $keluarga->save();
        
        if($user->status == 'Isi Identitas') {
            $user->status = 'Upload';
            $user->save();
        
            $berkas = Berkas::create([ 'user_id' =>  Auth::id() ]);
        }
        
        session()->flash('success', 'Data berhasil di diperbarui !');
        
        return redirect()->back();
    }
    
    public function unggah()
    { if(Auth::user()->gelombang_id == NULL) abort(404);
        
        $berkas = Berkas::where('user_id', Auth::id())->first();
        $gelombang = Gelombang::findOrFail(Auth::user()->gelombang_id);
     
        return view('pages.unggah-berkas', ['berkas' => $berkas, 'gelombang' => $gelombang]);
    }
}
