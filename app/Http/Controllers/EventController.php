<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (request()->ajax()) {
        //     $all_event = Event::query();
        //     return DataTables::of($all_event)->make();
        // }
        // return view('event');
        $all_event = Event::get();
        return view('event', compact('all_event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_event = Event::get();
        $jenis = Jenis::get();
        return view('create', compact('all_event', 'jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:events'
        ]);


        //upload image
        $image = $request->file('image');
        $image->storeAs('public/event', $image->hashName());

        //create event
        Event::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content,
            'kode_event' => $request->kode_event,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_tlp' => $request->no_tlp123,
            'kategori' => $request->kategori
        ]);
        //redirect to index
        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('detail', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $event == '20';
        return view('edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/event', $image->hashName());

            //delete old image
            Storage::delete('public/event/' . $event->image);

            //update event with new image
            $event->update([
                'image'     => $image->hashName(),
                'kode_event' => $request->kode_event,
                'nama' => $request->nama,
                'email' => $request->email,
                'no_tlp' => $request->no_tlp,
                'foto' => $request->foto,
                'kategori' => $request->kategori
            ]);
        } else {

            //update event without image
            $event->update([
                'kode_event' => $request->kode_event,
                'nama' => $request->nama,
                'email' => $request->email,
                'no_tlp' => $event->no_tlp,
                'foto' => $request->foto,
                'kategori' => $event->kategori
            ]);
        }

        //redirect to index
        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //delete image
        Storage::delete('public/posts/' . $event->image);

        //delete post
        $event->delete();

        //redirect to index
        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
