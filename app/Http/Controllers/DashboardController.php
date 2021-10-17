<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Image, File, PDF, Hash, Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SoalImport;
use App\Models\Gelombang;
use App\Models\Identitas;
use App\Models\Keluarga;
use App\Models\User;
use App\Models\Country;
use App\Models\Berkas;
use App\Models\Soal;
use App\Models\Jawaban;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
// ---------------------------------------------------------------------------------------------------------------------------------------------- DASHBOARD
    
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        
        if(Auth::user()->gelombang_id !== NULL) {
            $gelombang = Gelombang::findOrFail(Auth::user()->gelombang_id);

            if($gelombang->end_period->isPast()) {
                if(!Auth::user()->status == 'Verified' || !Auth::user()->status == 'Verified') {
                    $user->gelombang_id = NULL;
                    $user->status = NULL;
                    $user->save();
                }
            }
        }
        
        return view('dashboard');
    }
    
    public function gelombang_select($id)
    { if( Auth::user()->hasRole('Admin') ) abort(404);
        $user = User::findOrFail( Auth::id() );
        
        $user->gelombang_id = $id;
        $user->status = 'Isi Identitas';
        $user->save();
        
        if( empty( Identitas::where( 'user_id', Auth::id() )->first() ) ) {
            $identitas = Identitas::create([ 'user_id' => Auth::id() ]);        
            $keluarga = Keluarga::create([ 'user_id' => Auth::id() ]);
            $berkas = Berkas::create([ 'user_id' => Auth::id()] );
        }
		
        return redirect()->route('dashboard');
    }
    
// ---------------------------------------------------------------------------------------------------------------------------------------------- ISI IDENTITAS
    
    public function identitas()
    { if( Auth::user()->hasRole('Admin') || Auth::user()->gelombang_id == NULL) abort(404);
        $identitas = Identitas::where( 'user_id', Auth::id() )->first();
        $keluarga = Keluarga::where( 'user_id', Auth::id() )->first();
        $countries = Country::orderBy('langEN', 'ASC')->get();
        
        return view('pages.data-identitas', [ 'identitas' => $identitas, 'keluarga' => $keluarga, 'countries' => $countries ]);
    }
    
    public function identitas_update(Request $request)
    { if( Auth::user()->hasRole('Admin') || Auth::user()->gelombang_id == NULL) abort(404);
        $this->validate($request,[
            // calon siswa                              // tempat tinggal
            'name' => 'required',                       'alamat' => 'required',
            'jenis_kelamin' => 'required',              'kelurahan' => 'required',
            'tempat_lahir' => 'required',               'kecamatan' => 'required',
            'tanggal_lahir' => 'required',              'kota' => 'required',
            'agama' => 'required',                      'provinsi' => 'required',
            'kewarganegaraan' => 'required',            'kode_pos' => 'required',
            'status' => 'required',                     'negara' => 'required',
            'anak_ke' => 'required',                    'no_handphone' => 'required',
            'keadaan_ayah' => 'required',               'tinggal_dengan' => 'required',
            'keadaan_ibu' => 'required',                'kesekolah_dengan' => 'required',
            
            // wali kandung                             // kesehatan
            'nama_wali' => 'required',                  'gol_darah' => 'required',
            'tempat_lahir_wali' => 'required',          'tinggi' => 'required',
            'tanggal_lahir_wali' => 'required',         'berat' => 'required',
            'agama_wali' => 'required',
            'kewarganegaraan_wali' => 'required',       // pendidikan
            'pendidikan_wali' => 'required',            'nama_sekolah' => 'required',
            'pekerjaan_wali' => 'required',             'alamat_sekolah' => 'required',
            'penghasilan_wali' => 'required',           'no_sttb' => 'required',
            'alamat_wali' => 'required',                'lama_belajar' => 'required',
            'kelurahan_wali' => 'required',
            'kecamatan_wali' => 'required',
            'kota_wali' => 'required',
            'provinsi_wali' => 'required',
            'kode_pos_wali' => 'required',
            'negara_wali' => 'required',
            'no_handphone_wali' => 'required',
        ]);
        
        $user = User::findOrFail(Auth::id());
        $identitas = Identitas::where('user_id', Auth::id())->first();
        $keluarga = Keluarga::where('user_id', Auth::id())->first();
        
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
            $user->status = 'Upload Berkas';
            $user->save();
        }
        
        session()->flash('success', 'Data berhasil diperbarui !');
        
        return redirect()->back();
    }
   
// ---------------------------------------------------------------------------------------------------------------------------------------------- UNGGAH BERKAS
    
    public function berkas()
    { if( Auth::user()->hasRole('Admin') || Auth::user()->gelombang_id == NULL) abort(404);
        
        $berkas = Berkas::where( 'user_id', Auth::id() )->first();
        $gelombang = Gelombang::findOrFail(Auth::user()->gelombang_id);
     
        return view('pages.unggah-berkas', ['berkas' => $berkas, 'gelombang' => $gelombang]);
    }
    
    public function berkas_update(Request $request)
    { if( Auth::user()->hasRole('Admin') || Auth::user()->gelombang_id == NULL) abort(404);
        $berkas = Berkas::where('user_id', Auth::id())->first();
     
        if($request->hasFile('photo')){
            
            $this->validate($request,[
                'photo' => 'required|file|image|mimes:jpeg,png|max:2048',
            ]);
            
            $photo = $request->file('photo');
            $photo_filename =  Auth::user()->no_registration.'-photo'.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('img/berkas/'.$photo_filename));
            
            $img = Image::make('img/berkas/'.$photo_filename);
            $square = 0;
            $width = $img->width();
            $height = $img->height();
            if($width > $height){
                $square = $height;
            }else {
                $square = $width;
            }
            $img->crop($width, $width);
            Image::make($img)->save(public_path('img/berkas/AVA'.$photo_filename));
            
            $berkas->photo =  $photo_filename;
            $berkas->photo_status = 'Menunggu Verifikasi';
            $berkas->save();
        }
     
        if($request->hasFile('sehat')){
            
            $this->validate($request,[
                'sehat' => 'required|file|image|mimes:jpeg,png|max:2048',
            ]);
            
            $sehat = $request->file('sehat');
            $sehat_filename =  Auth::user()->no_registration.'-sehat'.'.'.$sehat->getClientOriginalExtension();
            Image::make($sehat)->save(public_path('img/berkas/'.$sehat_filename));
            
            $berkas->surat_ket_sehat =  $sehat_filename;
            $berkas->surat_ket_sehat_status = 'Menunggu Verifikasi';
            $berkas->save();
        }
     
        if($request->hasFile('payment')){
            
            $this->validate($request,[
                'payment' => 'required|file|image|mimes:jpeg,png|max:2048',
            ]);
            
            $payment = $request->file('payment');
            $payment_filename =  Auth::user()->no_registration.'-payment'.'.'.$payment->getClientOriginalExtension();
            Image::make($payment)->save(public_path('img/berkas/'.$payment_filename));
            
            $berkas->payment =  $payment_filename;
            $berkas->payment_status = 'Menunggu Verifikasi';
            $berkas->save();
        }
        
        session()->flash('success', 'Berkas berhasil di unggah !');
        
        return redirect()->back();
    }

    public function berkas_destroy($type)
    { if( Auth::user()->hasRole('Admin') || Auth::user()->gelombang_id == NULL) abort(404);
        
        $berkas = Berkas::where('user_id', Auth::id())->first();
     
        if($type == 'Payment') {
            File::delete('img/berkas/'.$berkas->payment);
            
            $berkas->paymnet =  NULL;
            $berkas->paymnet_status = 'Belum di Upload';
            $berkas->save();
        }
     
        if($type == 'Sehat') {
            File::delete('img/berkas/'.$berkas->surat_ket_sehat);
            
            $berkas->surat_ket_sehat =  NULL;
            $berkas->surat_ket_sehat_status = 'Belum di Upload';
            $berkas->save();
        }
     
        if($type == 'Photo') {
            File::delete('img/berkas/'.$berkas->photo);
            
            $berkas->photo =  NULL;
            $berkas->photo_status = 'Belum di Upload';
            $berkas->save();
        }
     
        session()->flash('success', 'Berkas berhasil di hapus !');
        
        return redirect()->back();
    }
    
// ---------------------------------------------------------------------------------------------------------------------------------------------- DAFTAR SISWA
    
    public function daftar_siswa()
    { if( Auth::user()->hasRole('User') ) abort(404);
        $siswa = User::role('User')->paginate(20);
        $verified = User::where('status', 'Verified')->paginate(20);
        $unverified = Berkas::where('photo_status', 'Menunggu Verifikasi')
                            ->orWhere('surat_ket_sehat_status', 'Menunggu Verifikasi')
                            ->orWhere('payment_status', 'Menunggu Verifikasi')->paginate(20);
        
        return view('pages.daftar-siswa', ['siswa' => $siswa, 'unverified' => $unverified, 'verified' => $verified]);
    }
    
    public function berkas_invalid(Request $request)
    { if( Auth::user()->hasRole('User') ) abort(404);
        $berkas = Berkas::findOrFail($request->id);
        
        $this->validate($request,[
            'note' => 'required',
        ]);
        
        if($request->type == 'photo') {
            $berkas->photo_notes = $request->note;
            $berkas->photo_status = 'Berkas Invalid';
            $berkas->save();
        }
        
        if($request->type == 'sehat') {
            $berkas->surat_ket_sehat_notes = $request->note;
            $berkas->surat_ket_sehat_status = 'Berkas Invalid';
            $berkas->save();
        }
        
        if($request->type == 'payment') {
            $berkas->payment_notes = $request->note;
            $berkas->payment_status = 'Berkas Invalid';
            $berkas->save();
        }
     
        session()->flash('success', 'Berkas berhasil di kembalikan !');
        
        return redirect()->back();
    }
    
    public function berkas_valid($id, $type)
    { if( Auth::user()->hasRole('User') ) abort(404);
        $berkas = Berkas::findOrFail($id);
        $user = User::findOrFail($berkas->user_id);
        $gelombang = Gelombang::findOrFail($user->gelombang_id)->first();
        
        if($type == 'photo') {
            $berkas->photo_status = 'Terverifikasi';
            $berkas->photo_notes = NULL;
            $berkas->save();
        }
        if($type == 'sehat') {
            $berkas->surat_ket_sehat_status = 'Terverifikasi';
            $berkas->surat_ket_sehat_notes = NULL;
            $berkas->save();
        }
        if($type == 'payment') {
            $berkas->payment_status = 'Terverifikasi';
            $berkas->payment_notes = NULL;
            $berkas->save();
        }
        
        if($berkas->photo_status == 'Terverifikasi' && $berkas->surat_ket_sehat_status == 'Terverifikasi' && $berkas->payment_status == 'Terverifikasi') {
            
            $user->status = 'Verified';
            $user->save();
            
            $gelombang->remaining_quota = $gelombang->remaining_quota-1;
            $gelombang->save();
        }
        
        session()->flash('success', 'Berkas berhasil di Verifikasi !');
        
        return redirect()->back();
    }
    
// ---------------------------------------------------------------------------------------------------------------------------------------------- TES AKADEMIK
    
    public function ujian()
    { 
        if( Auth::user()->status == 'Verified' || Auth::user()->status == 'Complete' ) {
     
            $jawaban = Jawaban::where( 'user_id', Auth::id() )->first();
            return view('pages.tes-akademik', ['jawaban' => $jawaban]);
        }else {
           abort(404); 
        }
    }
    
    public function ujian_soal()
    { 
        if( Auth::user()->status == 'Verified' || Auth::user()->status == 'Complete' ) {
            
            $jawaban = Jawaban::where( 'user_id', Auth::id() )->first();
            if($jawaban) {
                if($jawaban->bhs !== NULL) abort(404);
            }

            if( empty( Jawaban::where( 'user_id', Auth::id() )->first() ) ) {
                $jawaban = Jawaban::create([ 'user_id' => Auth::id() ]);
            }

            $soal = Soal::inRandomOrder()->get();
            $jawaban = Jawaban::where( 'user_id', Auth::id() )->first();

            return view('pages.tes-akademik-soal', ['soal' => $soal, 'jawaban' => $jawaban]);
        }else {
           abort(404); 
        }
    }
    
    public function ujian_submit(Request $request)
    { 
        if( Auth::user()->status == 'Verified' || Auth::user()->status == 'Complete' ) {
            
            $jawaban = Jawaban::where( 'user_id', Auth::id() )->first();
            if($jawaban) {
                if($jawaban->bhs !== NULL) abort(404);
            }

            $soal = Soal::all();
            $jawaban = $request->jawaban;

            $BHS = 0; $BHStotal = count(Soal::where('category', 'BHS')->get());
            $ING = 0; $INGtotal = count(Soal::where('category', 'ING')->get());
            $MTK = 0; $MTKtotal = count(Soal::where('category', 'MTK')->get());
            $IPA = 0; $IPAtotal = count(Soal::where('category', 'IPA')->get());

            foreach($soal as $s) {
                if(!empty($jawaban[$s->id])) {
                    $pilih = $jawaban[$s->id];

                    if($pilih == $s->key) {
                        if($s->category == 'BHS') $BHS++;
                        if($s->category == 'ING') $ING++;
                        if($s->category == 'MTK') $MTK++;
                        if($s->category == 'IPA') $IPA++;
                    }
                }
            }

            $hasil = Jawaban::where( 'user_id', Auth::id() )->first();
            $hasil->bhs = $BHS.'/'.$BHStotal;
            $hasil->ing = $ING.'/'.$INGtotal;
            $hasil->mtk = $MTK.'/'.$MTKtotal;
            $hasil->ipa = $IPA.'/'.$IPAtotal;
            $hasil->save();
            
            $user = User::findOrFail(Auth::id());
            $user->status = 'Complete';
            $user->save();

            session()->flash('success', 'Ujian berakhir !');

            return redirect()->route('ujian');
        }else {
           abort(404); 
        }
    }
    
    public function download_wawancara()
    {
        $jawaban = Jawaban::where('user_id', Auth::id())->first();
        
        if($jawaban) {
            $n_bhs= explode("/",Auth::user()->jawaban->bhs);
            $n_ing = explode("/",Auth::user()->jawaban->ing);
            $n_ipa = explode("/",Auth::user()->jawaban->ipa);
            $n_mtk = explode("/",Auth::user()->jawaban->mtk);
            
            $j = $n_bhs[0]+$n_ing[0]+$n_mtk[0]+$n_ipa[0];
            $s = $n_bhs[1]+$n_ing[1]+$n_mtk[1]+$n_ipa[1];
            $n = number_format((($j/$s)*100), 0);
            
            if($n >= 65) {
                $pdf = PDF::setOptions(['isRemoteEnabled' => true, 'dpi' => 300, 'defaultFont' => 'sans-serif']);
                $pdf->loadview('pdf.kartu_wawancara')->setPaper('a4', 'potrait');
                return $pdf->stream('Kartu Wawancara.pdf');
            }else {
                abort(404);
            }
        }else {
            abort(404);
        }
    }
    
    public function download_datasiswa($id)
    { if (Auth::user()->hasRole('User')) abort(403);
     
        $user = User::findOrFail($id);
     
        $pdf = PDF::setOptions(['isRemoteEnabled' => true, 'dpi' => 300, 'defaultFont' => 'sans-serif']);
        $pdf->loadview('pdf.data_siswa', ['user' => $user])->setPaper('a4', 'potrait');

        return $pdf->stream('Data Siswa.pdf');
    }
    
    public function resetPassword(Request $request)
    {
        $user = User::FindOrFail(Auth::id());
        
        $this->validate($request,[
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        
        $user->password = Hash::make($request['password']);
        $user->save();
        
        session()->flash('success', 'Password Berhasil di Ubah !');
        
        return redirect()->back();
    }

    public function soal()
    { if (Auth::user()->hasRole('User')) abort(403);

        $soal = Soal::paginate(10);

        return view('pages.soal-index', ['soal' => $soal]);
    }

    public function download_excel()
    { if (Auth::user()->hasRole('User')) abort(403);

        $file= public_path(). "/file/SoalExample.xlsx";
        $headers = array(
              'Content-Type: application/octet-stream',
            );
        return Response::download($file, 'Template Soal.xlsx', $headers);
    }

    public function upload_excel(Request $request)
    { if (Auth::user()->hasRole('User')) abort(403);

        $this->validate($request,[
            'file' => 'required|max:2048',
        ]);
        
        $file = $request->file('file');
        $name = $file->getClientOriginalName();

        $file->move('file/',$file->getClientOriginalName());

        $path = public_path('/file').'/'.$name;

        Excel::import(new SoalImport, $path);

        session()->flash('success', 'Soal Berhasil di Upload !');
        
        return back();
    }

    public function soal_store(Request $request)
    { if (Auth::user()->hasRole('User')) abort(403);

        $this->validate($request,[
            'category' => 'required',
            'soal' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'key' => 'required',
        ]);
        
        Soal::create([
            'category' => $request->category,
            'soal' => $request->soal,
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'key' => $request->key
        ]);

        session()->flash('success', 'Soal Berhasil di Buat !');
        
        return back();
    }
    
    public function soal_destroy($id)
    {
        $soal = Soal::findOrFail($id);
        $soal->delete();
        
        session()->flash('success', 'Soal berhasil di hapus !');
        
        return redirect()->route('soal.index');
    }

    public function soal_update(Request $request, $id)
    { if (Auth::user()->hasRole('User')) abort(403);

        $this->validate($request,[
            'category' => 'required',
            'soal' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'key' => 'required',
        ]);
        
        $soal = Soal::findOrFail($id);

        $soal->soal = $request->soal;
        $soal->key = $request->key;
        $soal->a = $request->a;
        $soal->b = $request->b;
        $soal->c = $request->c;
        $soal->d = $request->d;
        $soal->category = $request->category;
        $soal->save();

        session()->flash('success', 'Soal Berhasil di Ubah !');
        
        return back();
    }
}