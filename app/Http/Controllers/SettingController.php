<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gelombang;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin', 'auth','verified']);
    }

// ---------------------------------------------------------------------------------------------------------------------------------------------- GELOMBANG
    
    public function gelombang_create()
    {
        return view('pages.gelombang-create');
    }
    public function gelombang_store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'period' => 'required',
            'exam' => 'required',
            'qty' => 'required',
            'fee' => 'required',
        ]);
        
        $period = (explode(" s/d ",$request->period));
        $exam = (explode(" s/d ",$request->exam));
        $exam_start = (explode(" - ",$exam[0]));
        $exam_end = (explode(" - ",$exam[1]));        
        
        $gelombang = Gelombang::create([
            'name' =>  $request['name'],
            'start_period' =>  date("Y-m-d H:i:s", strtotime($period[0])),
            'end_period' =>  date("Y-m-d H:i:s", strtotime($period[1])),
            'start_exam' =>  date("Y-m-d", strtotime($exam_start[0])).' '.date("H:i:s", strtotime($exam_start[1])),
            'end_exam' =>  date("Y-m-d", strtotime($exam_end[0])).' '.date("H:i:s", strtotime($exam_end[1])),
            'wawancara' => date("Y-m-d H:i:s", strtotime($request->wawancara)),
            'total_quota' =>  $request['qty'],
            'remaining_quota' =>  $request['qty'],
            'fee' =>  $request['fee'],
        ]);
     
        session()->flash('success', 'Gelombang berhasil di buat !');
        
        return redirect()->route('dashboard');
    }
    
    public function gelombang_edit($id)
    {
        $gelombang = Gelombang::findOrFail($id);
        
        return view('pages.gelombang-edit', ['gelombang' => $gelombang]);
    }
    public function gelombang_update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'period' => 'required',
            'exam' => 'required',
            'qty' => 'required',
            'fee' => 'required',
        ]);
        
        $gelombang = Gelombang::findOrFail($id);
        
        $period = (explode(" s/d ",$request->period));
        $exam = (explode(" s/d ",$request->exam));
        $exam_start = (explode(" - ",$exam[0]));
        $exam_end = (explode(" - ",$exam[1]));
        
        if($request->wawancara) {
            $gelombang->wawancara = date("Y-m-d H:i:s", strtotime($request->wawancara));
            $gelombang->save();
        }
        
        $gelombang->name = $request->name;
        $gelombang->start_period = date("Y-m-d H:i:s", strtotime($period[0]));
        $gelombang->end_period = date("Y-m-d H:i:s", strtotime($period[1]));
        $gelombang->start_exam = date("Y-m-d", strtotime($exam_start[0])).' '.date("H:i:s", strtotime($exam_start[1]));
        $gelombang->end_exam = date("Y-m-d", strtotime($exam_end[0])).' '.date("H:i:s", strtotime($exam_end[1]));
        $gelombang->remaining_quota = $request->qty-($gelombang->total_quota-$gelombang->remaining_quota);
        $gelombang->total_quota = $request->qty;
        $gelombang->fee = $request->fee;
        $gelombang->save();
     
        session()->flash('success', 'Gelombang berhasil di ubah !');
        
        return redirect()->route('dashboard');
    }
    
    public function gelombang_destroy($id)
    {
        $gelombang = Gelombang::findOrFail($id);
        $gelombang->delete();
        
        session()->flash('success', 'Gelombang berhasil di hapus !');
        
        return redirect()->back();
    }
}
