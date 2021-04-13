<?php

namespace App\Http\Controllers;

use App\Models\menus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\submenus;
use Yajra\DataTables\DataTables;

class submenusController extends Controller
{
    public function submenus(){
        $menus = menus::where('is_deleted',0)->get();
        return view('CMS.submenus.submenus',)->with('menus',$menus);
    }

    public function create_submenus(Request $request ){
        $ValidationData = $request->validate([
            'title' => 'required|max:100',
            'submenuscontent' => 'required',
        ]);

        if($ValidationData){
            $submenus = new submenus();
            $submenus -> title = $request->title;
            $submenus -> content = $request-> submenuscontent;
            $submenus->menu_id = $request->menu_id;
            //menu id tanımlanmıyor
            if ($submenus -> save()) {
                return redirect()->route('submenus_list');
            } else {
                return redirect()->route('submenus_index')->with('success' ,'basarisiz kayit');
            }
        }
    }

    public function submenusList(){
        return view('CMS.submenus.list');
    }

    public function submenusList2(){
        $question_packages = submenus::query()->where('is_deleted', 0);

        return Datatables::of($question_packages)
            ->addColumn('Detail', function ($question_packages){
                return '<a class="btn btn-success" href="'. route('submenus_detail', [$question_packages->id]) .'">'.'Detail</a>';

            })
            ->addColumn('Update', function ($question_packages){
                return '<a class="btn btn-primary" href="'. route('submenus_update', [$question_packages->id]) .'">'.'Update</a>';

            })
            ->addColumn('Delete', function ($question_packages){
                return '<button class="btn btn-danger" onclick="deleteSubmenus('. $question_packages->id . ')">'.'Delete</button>';

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
        $news = submenus::find($id);
        $news->update([
            'is_deleted' => 1
        ]);
        return response()->json(['success' => 'Success']);
    }

    public function update(Request $request, $id){
        submenus::find($id)->update([
            'title'=>$request->title,
            'content'=>$request->submenuscontent,
        ]);
        return redirect()->route('submenus_list');
    }

    public function updateShow($id){
        $submenus = submenus::find($id);
        return view('CMS.submenus.submenusUpdate',compact('submenus'));
    }

    public function detailSubMenus($id){
        $submenus = submenus::find($id);
        return view('CMS.submenus.detail',compact('submenus'));
    }
}
