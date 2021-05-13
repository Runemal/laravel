<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\News;
use function Swoole\Coroutine\Http\get;

class NewsController extends Controller
{

    public function index()
    {
        $news = (new Category)->getAllNewsCategories();

//        $news = Category::query()
//            ->select( 'id', 'name')
//            ->get();

        return view ('news')->with(['id' => '', 'newsCart' => '', 'news' => $news]);
    }

    public function category($id)
    {

        $news = (new News)->getNewsByCategoryId($id);

//        $news = News::query()
//            ->where('category', $id)
//            ->join('category', 'news.category', '=', 'category.id')
//            ->select('news.id','title', 'name')
//            ->get();

        return view ('news')->with(['newsCart' => '', 'id' => $id, 'news' => $news, 'categoryName' => $news[0]->name]);

    }


    public function cart($id, $cart)
    {

//        $news = News::find($cart)

        $news = (new News)->getNewsById($cart);

//        $news = News::query()
//            ->where('news.id', '=', $cart)
//            ->Join('category', 'news.category', '=', 'category.id')
//            ->select('title', 'description', 'name')
//            ->get();

        return view ('news')->with(['id' => $news[0]->name, 'cart' => $news[0]->title, 'newsCart' => $news[0]->description]);

    }

}
