<?php


namespace App\Http\Controllers;


class NewsController extends Controller
{
    private $news = [];


    public function index()
    {

        $this->news = \DB::table('category')
            ->select( 'id', 'name')
            ->get();

//        dd($this->news);

        return view ('news')->with(['id' => '', 'newsCart' => '', 'news' => $this->news]);
        exit;
    }

    public function category($id)
    {
//        $news = $this->news[$id];

        $this->news = \DB::table('news')
            ->where('category', '=', $id)
            ->Join('category', 'news.category', '=', 'category.id')
//            ->Join('status','status', '=', 'status.id')
            ->select('news.id', 'title', 'category.name')

            ->get();

//        dd($this->news);

//        echo $news['title'];
        return view ('news')->with(['newsCart' => '', 'id' => $id, 'news' => $this->news, 'categoryName' => $this->news[0]->name]);

        exit;
    }
    public function cart($id, $cart)
    {
//        $newsCart = $this->news[$id][$cart];

        $this->news = \DB::table('news')
            ->where(
                'news.id', '=', $cart
            )
            ->Join('category', 'news.category', '=', 'category.id')
//            ->Join('status','status', '=', 'status.id')

            ->select()

            ->get();

//        dd($this->news);

        return view ('news')->with(['id' => $this->news[0]->name, 'cart' => $this->news[0]->title, 'newsCart' => $this->news[0]->description]);

        exit;
    }

}
