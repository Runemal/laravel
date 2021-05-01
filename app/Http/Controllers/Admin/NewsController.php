<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        echo "index";
        exit;
    }

    public function create()
    {

        return view('admin.news/create');
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function show(Request $request)
    {

            echo "<script>alert('Данные получены!')</script>";

//            dd($request);
//            return redirect()->route('admin::news::create');
            $id = 'FormNews';
            $cart = $request->input('title');
            $newsCart = $request->input('content');
            return view ('news')->with(['id' => $id, 'cart' => $cart, 'newsCart' => $newsCart]);

    }
}
