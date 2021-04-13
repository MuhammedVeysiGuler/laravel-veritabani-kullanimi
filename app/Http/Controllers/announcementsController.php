<?php

namespace App\Http\Controllers;

use App\Models\announcements;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\DataTables\AnnouncementsDataTable;
use Carbon\Carbon;
use Symfony\Component\Console\Input\Input;
use function PHPUnit\Framework\isNull;

class announcementsController extends Controller
{

    public function announcementsList(){
        return view('CMS.announcements.list');
    }

    public function announcementsList2(){
        $question_packages = announcements::query()->where('is_deleted', 0);

        return Datatables::of($question_packages)
            ->addColumn('Detail', function ($question_packages){
                return '<a class="btn btn-success" href="'. route('announcements_detail', [$question_packages->id]) .'">'.'Detail</a>';

            })
            ->addColumn('Update', function ($question_packages){
                return '<a class="btn btn-primary" href="'. route('announcements_update', [$question_packages->id]) .'">'.'Update</a>';

            })
            ->addColumn('Delete', function ($question_packages){
                return '<a class="btn btn-danger" href="'. route('announcements_delete', [$question_packages->id]) .'">'.'Delete</a>';

            })
            ->editColumn('created_at',function ($data){
                return Carbon::parse($data->created_at)->format('d-m-Y');
            })
            ->editColumn('updated_at',function ($data){
                return Carbon::parse($data->updated_at)->format('d-m-Y');
            }
            )->rawColumns(['Detail','Update','Delete'])->make();
    }


    public function announcements(){
        return view('CMS.announcements.announcements');
    }

    //formdan gelenelri verinin üzerine yazarak kayıt olusturur daha sonra tekrardan olusturma ekranına yonlendırıyor
    public function create_announcements(Request $request){

        $ValidationData = $request->validate([
            'title' => 'required|max:100',
            'announcementscontent' => 'required',
            'slug' => 'required',
        ]);
        if($ValidationData){
            $announcements = new announcements();
            $announcements -> title = $request->title;
            $announcements -> content = $request-> announcementscontent;
            $announcements -> slug = $request->slug;
            if($file = $request -> file('img_path')){
                $names = $file->getClientOriginalName();
                $file->move('Announcements_img_path/',$names);
                $announcements->img_path = $names;
            }
            if ($announcements -> save()) {
                return view('CMS.announcements.announcements')->with('success','basarili kayit');
            } else {
                return view('CMS.announcements.announcements')->with('success','basarisiz kayit');
            }
        }
    }


    //id bulur 0 olanı 1 yapar
    public function delete($id){
        if (is_integer($id) || $id) {
            $id = $id;
        } else {
            return redirect()->route('announcements_list')->with('error' ,'silme hatasi');
        }
        $announcements = announcements::find($id);
        $announcements->update([
            'is_deleted' => 1
        ]);
        return redirect()->route('announcements_list');
    }

    //id bulur yeni gelenleri eskileri ile değiştirir
    public function update(Request $request,$id){
        announcements::find($id)->update([
           'title' => $request->title,
           'content' => $request->announcementscontent,
           'img_path' => $request->img_path,
           'slug' => $request->slug
        ]);
        return redirect()->route('announcements_list');
    }

    //güncellenen yeri göstermek için
    public function updateShow($id){
        $announcements = announcements::find($id);
        return view('CMS.announcements.announcementsUpdate',compact('announcements'));
    }


    public function detailAnnouncements($id){
        $announcements = announcements::find($id);
        return view('CMS.announcements.detail',compact('announcements'));
    }

}
