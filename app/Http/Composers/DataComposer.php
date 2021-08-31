<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use Auth;
use Carbon\Carbon;
use App\Models\Gelombang;
use App\Models\Berkas;

class DataComposer
{
    public function compose(View $view)
    {
        $composer = [
            'gelombang' => Gelombang::orderBy('created_at', 'ASC')->get(),
            'gelombang_now' => Gelombang::where('start_period', '<=', Carbon::now())->where('end_period', '>=', Carbon::now())->first(),
            'berkas' => Berkas::where('user_id', Auth::id())->first()
        ];
        
        if(empty($composer['gelombang_now'])) {
            $composer['gelombang_now'] = Gelombang::where('start_period', '<=', Carbon::now())->orderBy('created_at', 'DESC')->first();
        }
        
        $view->with('composer', $composer);
    }
}