<?php


namespace App\Http\Controllers;


class NewsController extends Controller
{
    private $news = [];


    public function index()
    {
//        $sql = "SELECT * FROM news";
        $this->news = \DB::table('news')
            ->Join('category', 'news.category', '=', 'category.id')
            ->select( 'category.name')
            ->get();
        //Почему не выводит статус?

//        dd($this->news);
        return view ('news')->with(['id' => '', 'newsCart' => '', 'news' => $this->news]);
        exit;
    }

    public function category($id)
    {
//        $news = $this->news[$id];

        $this->news = \DB::table('news')
            ->where('category', '=',$id + 1)
//            ->Join('category', 'category', '=', 'category.id')
//            ->Join('status','status', '=', 'status.id')
            ->select('title', 'description')

            ->get();

        dd($this->news);

//        echo $news['title'];
        return view ('news')->with(['newsCart' => '', 'id' => $id, 'news' => $this->news]);

        exit;
    }
    public function cart($id, $cart)
    {
//        $newsCart = $this->news[$id][$cart];

        $this->news = \DB::table('news')
            ->where('id', '=',$id + 1)
//            ->Join('category', 'category', '=', 'category.id')
//            ->Join('status','status', '=', 'status.id')
            ->select('title', 'description')

            ->get();

//        dd($this->news);

        return view ('news')->with(['id' => $id, 'cart' => $this->news[0]->title, 'newsCart' => $this->news[0]->description]);

        exit;
    }

}
