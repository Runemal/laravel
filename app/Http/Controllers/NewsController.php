<?php


namespace App\Http\Controllers;


class NewsController extends Controller
{
    private $news = [
        1 => [
            '1' => 'This is news 1 text.',
            '2' => 'This is news 2 text.',
            '3' => 'This is news 3 text.',
        ],
        2 => [
            '1' => 'This is news 1 text.',
            '2' => 'This is news 2 text.',
            '3' => 'This is news 3 text.',
        ],
        3 => [
            '1' => 'This is news 1 text.',
            '2' => 'This is news 2 text.',
            '3' => 'This is news 3 text.',
        ]
    ];
    public function index()
    {

        return view ('news')->with(['id' => '', 'newsCart' => '', 'news' => $this->news]);
        exit;
    }

    public function category($id)
    {
        $news = $this->news[$id];
//
//        echo $news['title'];
        return view ('news')->with(['newsCart' => '', 'id' => $id, 'news' => $news]);

        exit;
    }
    public function cart($id, $cart)
    {
        $newsCart = $this->news[$id][$cart];

        return view ('news')->with(['id' => $id, 'cart' => $cart, 'newsCart' => $newsCart]);

        exit;
    }

}
