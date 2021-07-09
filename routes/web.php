<?php

use Illuminate\Support\Facades\Route;

Route::get('/_', function () {
    return view('test');
});

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('group', 'GroupController');

Route::resource('task', 'TaskController');

Route::get('groupTask/{group}', 'GroupController@groupTask')->name('groupTask');

Route::get('task/{task}/type/{type}', 'RequestController@moveTask')->name('movetask');

Route::get('archived/{group}', 'RequestController@archived')->name('archived');

Route::get('group/{group}/task/{task}', 'RequestController@undoArchived')->name('undoArchived');

Route::get('logs/{group}', 'RequestController@groupLogs')->name('logs');

Route::get('attachments/{group}', 'AttachmentController@index')->name('attachments');

Route::post('/group/{group}', 'AttachmentController@upload')->name('attachment');

Route::delete('/delete/{attachment}', 'AttachmentController@delete')->name('attachmentDelete');

Route::get('exploreGroup', 'RequestController@exploreGroup')->name('exploreGroup');


Route::get('request/{id}', 'RequestController@requestToJoin')->name('request');

Route::get('group/{group}', 'RequestController@requestUser')->name('requestUser');

Route::delete('/group/{group}/deleteReq/{request}', 'RequestController@deleteRequest')->name('deleteRequest');

Route::get('/group/{group}/acceptReq/{request}', 'RequestController@acceptRequest')->name('acceptRequest');

Route::get('/members/{group}', 'RequestController@members')->name('members');

Route::get('/requestGroup', 'RequestController@requestGroup')->name('requestGroup');

Route::get('/cancelGroupRequest/{request}', 'RequestController@cancelGroupRequest')->name('cancelGroupRequest');

Route::get('/collaborationGroups', 'RequestController@collaborationGroups')->name('collaborationGroups');

Route::post('/assignTask/{task}', 'RequestController@assignTask')->name('assignTask');

Route::get('test/{id}', function ($id) {
    $data = \App\Attachment::find($id);
    return response()->download($data->attachment);
});

Route::get('profile/{user}', 'RequestController@profile')->name('profile');

Route::get('removeMember/{member}', 'RequestController@removeMember')->name('removeMember'); // Remove a Member from the group

Route::post('searchedGroup', 'RequestController@searchedGroup')->name('searchedGroup');
