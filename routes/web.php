<?php

use App\Http\Controllers\submenusController;
use Illuminate\Support\Facades\Route;


Route::view('/','CMS.master')->name('master_blade');

Route::get('/new',[App\Http\Controllers\newsController::class,'news'])->name('news_index');
Route::group(['prefix'=>'news'], function (){
    Route::get('/',[App\Http\Controllers\newsController::class,'newsList'])->name('news_list');
    Route::get('/list2',[\App\Http\Controllers\newsController::class,'newsList2'])->name('news_list2');

    Route::post('/create',[\App\Http\Controllers\newsController::class,'create_news'])->name('news_create');
    Route::get('/create',[\App\Http\Controllers\newsController::class,'create_news']);

    Route::post('/update{id}',[\App\Http\Controllers\newsController::class,'update'])->name('news_update');
    Route::get('/update{id}',[\App\Http\Controllers\newsController::class,'updateShow']);

    Route::post('/delete',[\App\Http\Controllers\newsController::class,'delete'])->name('news_delete');
    Route::get('/delete{id}',[\App\Http\Controllers\newsController::class,'delete']);

    Route::get('/detail{id}',[\App\Http\Controllers\newsController::class,'detailNews'])->name('news_detail');
});
    Route::get('/new/{path}',function ($path){
       $file = public_path()."\News_img_path\\".$path;
       return response()->download($file);
    })->name('new_download');


Route::get('/event',[\App\Http\Controllers\eventsController::class,'events'])->name('events_index');
Route::get('/events',[\App\Http\Controllers\eventsController::class,'eventsList'])->name('events_list');

Route::get('/list22',[\App\Http\Controllers\eventsController::class,'eventsList2'])->name('events_list2');

Route::post('/events/create',[\App\Http\Controllers\eventsController::class,'create_events'])->name('events_create');
Route::get('/events/create',[\App\Http\Controllers\eventsController::class,'create_events']);

Route::post('/events/update/{id}',[\App\Http\Controllers\eventsController::class,'update'])->name('events_update');
Route::get('/events/update/{id}',[\App\Http\Controllers\eventsController::class,'updateShow']);

Route::post('/events/delete',[\App\Http\Controllers\eventsController::class,'delete'])->name('events_delete');
Route::get('/events/delete/{id}',[\App\Http\Controllers\eventsController::class,'delete']);

Route::get('/events/detail/{id}' , [\App\Http\Controllers\eventsController::class,'detailEvents'])->name('events_detail');

Route::get('/event/{path}',function ($path){
    $file = public_path()."\Events_img_path\\".$path;
    return response()->download($file);
})->name('event_download');



Route::get('/announcement',[\App\Http\Controllers\announcementsController::class,'announcements'])->name('announcements_index');
Route::get('/announcements',[\App\Http\Controllers\announcementsController::class,'announcementsList'])->name('announcements_list');

Route::get('/list2',[\App\Http\Controllers\announcementsController::class,'announcementsList2'])->name('announcements_list2');

Route::post('/announcements/create',[\App\Http\Controllers\announcementsController::class,'create_announcements'])->name('announcements_create');
Route::get('/announcements/create',[\App\Http\Controllers\announcementsController::class,'create_announcements']);

Route::post('/announcements/update/{id}',[\App\Http\Controllers\announcementsController::class,'update'])->name('announcements_update');
Route::get('/announcements/update/{id}',[\App\Http\Controllers\announcementsController::class,'updateShow']);

Route::post('/announcements/delete/{id}',[\App\Http\Controllers\announcementsController::class,'delete'])->name('announcements_delete');
Route::get('/announcements/delete/{id}',[\App\Http\Controllers\announcementsController::class,'delete']);

Route::get('/announcements/detail/{id}' , [\App\Http\Controllers\announcementsController::class,'detailAnnouncements'])->name('announcements_detail');

Route::get('/download/{path}',function ($path){
    $file = public_path()."\Announcements_img_path\\".$path;
    return response()->download($file);
})->name('announcement_download');


Route::get('/menu',[\App\Http\Controllers\menusController::class,'menus'])->name('menus_index');
Route::group(['prefix'=>'menus'],function(){
    Route::get('/',[\App\Http\Controllers\menusController::class,'menusList'])->name('menus_list');

    Route::get('/list222',[\App\Http\Controllers\menusController::class,'menusList2'])->name('menus_list2');

    Route::post('/create',[\App\Http\Controllers\menusController::class,'create_menus'])->name('menus_create');
    Route::get('/create',[\App\Http\Controllers\menusController::class,'create_menus']);

    Route::post('/update/{id}',[\App\Http\Controllers\menusController::class,'update'])->name('menus_update');
    Route::get('/update/{id}',[\App\Http\Controllers\menusController::class,'updateShow']);

    Route::post('/delete',[\App\Http\Controllers\menusController::class,'delete'])->name('menus_delete');
    Route::get('/delete/{id}',[\App\Http\Controllers\menusController::class,'delete']);

    Route::get('/detail/{id}',[\App\Http\Controllers\menusController::class,'detailMenus'])->name('menus_detail');

});

Route::get('/submenu',[submenusController::class,'submenus'])->name('submenus_index');
Route::group(['prefix'=>'submenus'],function(){
    Route::get('/',[submenusController::class,'submenusList'])->name('submenus_list');
    Route::get('/list2222',[submenusController::class,'submenusList2'])->name('submenus_list2');
    Route::post('/create',[submenusController::class,'create_submenus'])->name('submenus_create');
    Route::get('/create',[submenusController::class,'create_submenus']);
    Route::post('/update/{id}',[submenusController::class,'update'])->name('submenus_update');
    Route::get('/update/{id}',[submenusController::class,'updateShow']);
    Route::post('/delete',[submenusController::class,'delete'])->name('submenus_delete');
    Route::get('/delete/{id}',[ submenusController::class,'delete']);
    Route::get('/detail/{id}',[submenusController::class,'detailSubMenus'])->name('submenus_detail');
});

