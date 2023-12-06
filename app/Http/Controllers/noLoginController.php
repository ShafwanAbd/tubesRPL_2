<?php

namespace App\Http\Controllers;

use App\Models\Sepatu;
use Illuminate\Http\Request;

class noLoginController extends Controller
{
    public function index()
    {
        $i = 0;
        $overviewShoe = Sepatu::find(5);
        $hotShoe = Sepatu::inRandomOrder()->paginate(1)->first();

        $shoe = Sepatu::inRandomOrder()->paginate(10);

        return view('home.homeMain', compact(
            'hotShoe', 'shoe', 'overviewShoe'
        ));
    }

    public function faq(){
        return view('home.faq');
    }

    public function privacy(){
        return view('home.privacy');
    }
}
