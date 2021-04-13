<?php

namespace App\Http\Controllers;

use App\Models\events;
use App\Models\news;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class eventsController extends Controller
{
    public function events(){
        return view('CMS.events.events');
    }

    public function create_events(Request $request){
        $ValidationData = $request->validate([
            'title' => 'required|max:100',
            'eventscontent' => 'required',
            'slug' => 'required',
        ]);
        if($ValidationData){
            $events = new events();
            $events -> title = $request -> title;
            $events -> content = $request -> eventscontent;
            $events -> slug = $request -> slug;
            if($file = $request -> file('img_path')){
                $names = $file->getClientOriginalName();
                $file->move('Events_img_path/',$names);
                $events->img_path = $names;
            }
            if ($events ->save()) {
                return view('CMS.events.events')->with('success','basarili kayit');
            } else {
                return view('CMS.events.events')->with('success','basarisiz kayit');
            }
        }
    }

    public function eventsList()
    {
        return view('CMS.events.list');
    }

    public function eventsList2(){
        $question_packages = events::query()->where('is_deleted', 0);

        return Datatables::of($question_packages)
            ->addColumn('Detail', function ($question_packages){
                return '<a class="btn btn-success" href="'. route('events_detail', [$question_packages->id]) .'">'.'Detail</a>';

            })
            ->addColumn('Update', function ($question_packages){
                return '<a class="btn btn-primary" href="'. route('events_update', [$question_packages->id]) .'">'.'Update</a>';

            })
            ->addColumn('Delete', function ($question_packages){
                return '<button class="btn btn-danger" onclick="deleteEvents('. $question_packages->id . ')">'.'Delete</button>';

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
        $news = events::find($id);
        $news->update([
            'is_deleted' => 1
        ]);
        return response()->json(['success' => 'Success']);
    }

    public function update(Request $request,$id){
        events::find($id)->update([
            'title' => $request->title,
            'content' => $request->eventscontent,
            'img_path' => $request->img_path,
            'slug' => $request->slug
        ]);
        return redirect()->route('events_list');
    }

    public function updateShow($id){
        $events = events::find($id);
        return view('CMS.events.eventsUpdate',compact('events'));
    }

    public function detailEvents($id){
        $events = events::find($id);
        return view('CMS.events.detail',compact('events'));
    }



}
