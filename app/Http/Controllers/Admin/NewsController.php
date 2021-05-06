<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminNewsSaveRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('admin.news.index', ['news' => $news,
            'category' => $this->getCategoriesList()
        ]);

    }

    public function create()
    {

        return view("admin.news.create", [
                'model' => new News(),
                'category' => $this->getCategoriesList()
            ]
        );

    }

    public function update($id)
    {
        return view("admin.news.create", [
                'model' => News::find($id),
                'category' => $this->getCategoriesList()
            ]
        );
    }

    public function delete($id)
    {
        News::destroy([$id]);
        return redirect()->route("admin::news::index");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    public function show(AdminNewsSaveRequest $request)
    {

        $id = $request->post('id');
        /** @var News $model */
        $model = $id ? News::find($id) : new News();
        $model->fill($request->all());
        $model->save();
        return redirect()->route("admin::news::index", ['id' => $model->id])
            ->with('success', __('labels.data_saved') );

    }

    protected function getCategoriesList()
    {
        return Category::query()
            ->select(['id', 'name'])
            ->get()
            ->pluck('name', 'id');
    }

}
