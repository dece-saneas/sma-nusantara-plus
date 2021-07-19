<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\Models\Gelombang;

class DataComposer
{
    public function compose(View $view)
    {
        $composer = [
            'gelombang' => Gelombang::orderBy('created_at', 'ASC')->get()
        ];
        
        $view->with('composer', $composer);
    }
}