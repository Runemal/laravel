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
        $news = (new News)->getNewsById($cart);

        return view ('news')->with(['id' => $news[0]->name, 'cart' => $news[0]->title, 'newsCart' => $news[0]->description]);

    }

}
