<?php

namespace App\Http\Controllers;

use App\Models\announcements;
use App\Models\news;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use function PHPUnit\Framework\isNull;

class newsController extends Controller
{
    public function news()
    {
        return view('CMS.news.news');
    }

    public function create_news(Request $request){
        $ValidationData = $request->validate([
            'title' => 'required|max:100',
            'newscontent' => 'required',
            'slug' => 'required',
        ]);
        if ($ValidationData) {
            $news = new news();
            $news->title = $request->title;
            $news->content = $request->newscontent;
            $news->slug = $request->slug;
            if ($file = $request->file('img_path')) {
                $names = $file->getClientOriginalName();
                $file->move('news_img_path/', $names);
                $news->img_path = $names;
            }
            if ($news->save()) {
                return view('CMS.news.news')->with('success','basarili kayit');
            } else {
                return view('CMS.news.news')->with('success','basarisiz kayit');
            }
        }
    }

    public function delete()
    {
        $id = \request('id');
        if (is_numeric($id)) {
        } else {
            return response()->json(['success' => 'ID değeri hatalı']);
        }
        $news = news::find($id);
        $news->update([
            'is_deleted' => 1
        ]);
        return response()->json(['success' => 'Success']);
    }

    public function newsList()
    {
        return view('CMS.news.list');
    }

    public function newsList2(){
        $question_packages = news::query()->where('is_deleted', 0);

        return Datatables::of($question_packages)
            ->addColumn('Detail', function ($question_packages){
                return '<a class="btn btn-success" href="'. route('news_detail', [$question_packages->id]) .'">'.'Detail</a>';

            })
            ->addColumn('Update', function ($question_packages){
                return '<a class="btn btn-primary" href="'. route('news_update', [$question_packages->id]) .'">'.'Update</a>';

            })
            ->addColumn('Delete', function ($question_packages){
                return '<button class="btn btn-danger" onclick="deleteNews('. $question_packages->id . ')">'.'Delete</button>';

            })
            ->editColumn('created_at',function ($data){
                return Carbon::parse($data->created_at)->format('d-m-Y');
            })
            ->editColumn('updated_at',function ($data){
                return Carbon::parse($data->updated_at)->format('d-m-Y');
            }
            )->rawColumns(['Detail','Update','Delete'])->make();
    }

    public function update(Request $request, $id)
    {
        news::find($id)->update([
            'title' => $request->title,
            'content' => $request->newscontent,
            'img_path' => $request->img_path,
            'slug' => $request->slug
        ]);
        return redirect()->route('news_list');
    }

    public function updateShow($id)
    {
        $news = news::find($id);
        return view('CMS.news.newsUpdate', compact('news'));
    }

    public function detailNews($id)
    {
        $news = news::find($id);
        return view('CMS.news.detail', compact('news'));
    }

}
