<?php

namespace App\Http\Controllers;

use App\Models\events;
use App\Models\menus;
use App\Models\news;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class menusController extends Controller
{
    public function menus(){
        return view('CMS.menus.menus');
    }

    public function create_menus(Request $request){
        $ValidationData = $request->validate([
            'title' => 'required|max:100',
            'menuscontent' => 'required',
            'slug' => 'required',
        ]);
        if($ValidationData){
            $menus = new menus();
            $menus -> title = $request->title;
            $menus -> content = $request-> menuscontent;
            $menus -> slug = $request->slug;
            if ($menus -> save()) {
                return view('CMS.menus.menus')->with('success','basarili kayit');
            } else {
                return view('CMS.menus.menus')->with('success','basarisiz kayit');
            }
        }
    }

    public function menusList(){
        return view('CMS.menus.list');
    }

    public function menusList2(){
        $question_packages = menus::query()->where('is_deleted', 0);

        return Datatables::of($question_packages)
            ->addColumn('Detail', function ($question_packages){
                return '<a class="btn btn-success" href="'. route('menus_detail', [$question_packages->id]) .'">'.'Detail</a>';

            })
            ->addColumn('Update', function ($question_packages){
                return '<a class="btn btn-primary" href="'. route('menus_update', [$question_packages->id]) .'">'.'Update</a>';

            })
            ->addColumn('Delete', function ($question_packages){
                return '<button class="btn btn-danger" onclick="deleteMenus('. $question_packages->id . ')">'.'Delete</button>';

            })
            ->editColumn('created_at',function ($data){
                return Carbon::parse($data->created_at)->format('d-m-Y');
            })
            ->editColumn('updated_at',function ($data){
                return Carbon::parse($data->updated_at)->format('d-m-Y');
            }
            )->rawColumns(['Detail','Update','Delete'])->make();
    }

    public function delete(){
        $id = \request('id');
        if (is_numeric($id)) {
        } else {
            return response()->json(['success' => 'ID değeri hatalı']);
        }
        $news = menus::find($id);
        $news->update([
            'is_deleted' => 1
        ]);
        return response()->json(['success' => 'Success']);
    }

    public function update(Request $request, $id){
        menus::find($id)->update([
            'title'=>$request->title,
            'content'=>$request->menuscontent,
            'slug'=>$request->slug
        ]);
        return redirect()->route('menus_list');
    }

    public function updateShow($id){
        $menus = menus::find($id);
        return view('CMS.menus.menusUpdate',compact('menus'));
    }

    public function detailMenus($id){
        $menus = menus::find($id);
        return view('CMS.menus.detail',compact('menus'));
    }

}
