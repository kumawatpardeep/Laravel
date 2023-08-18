<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Events;

class Event extends Controller
{
    public function add()
    {
        return view('admin/event/add');
    }
    public function addEvent(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'description' => 'required',
            'image' => 'required'

        ]);
        $datainsert = new Events();
        $datainsert->title = $request->get('title');
        $datainsert->description = $request->get('description');

        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            // $photo->getClientOriginalName();
            $photoName = rand(10000, 99999) . '.' . $photo->getClientOriginalName();

            $photo->move(public_path('image'), $photoName);
        }
        $datainsert->image = $photoName;
        $datainsert->save();
        return redirect()->route('admin/event/list');
    }
    public function list()
    {
        $user = Events::all();
        return view('admin/event/list', compact('user'));
    }
    public function edit($id)
    {
        $users = Events::select('*')->where('id', $id)->first();
        return view('admin/event/edit', compact('users'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([

            'title' => 'required',
            'description' => 'required',
        ]);
        $photoName = "";
        if ($photoName == "") {
            $photoName = $request->get('text_hidden');
        }
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            // $photo->getClientOriginalName();
            $photoName = rand(100, 999) . '.' . $photo->getClientOriginalName();

            $photo->move(public_path('image'), $photoName);
        }

        Events::where('id', $id)->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'image' => $photoName

        ]);
        return redirect()->route('admin/event/list');
    }
    public function delete($id)
    {
        Events::where('id', $id)->delete();
        return redirect()->back();
    }
    public function trash()
    {
        $user = Events::onlyTrashed()->get();
        return view('admin/event/event-trash', compact('user'));
    }
    public function restore($id)
    {
        Events::withTrashed()->where('id', $id)->restore();
        return redirect()->route('admin/event/list');
    }
    public function forceDelete($id)
    {
        Events::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->back();
    }
}