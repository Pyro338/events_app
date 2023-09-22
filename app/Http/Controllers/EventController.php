<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events.index', [
            'events' => Event::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Event::create([
            'title'      => $request->title,
            'text'       => $request->text,
            'date'       => $request->date,
            'created_by' => Auth::user()->id
        ]);

        return redirect()->route('events');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.view', [
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit', [
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event        $event
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $event->update([
            'title' => $request->title,
            'text'  => $request->text,
            'date'  => $request->date
        ]);

        return redirect()->route('event.show', $event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events');
    }

    public function subscribe(Event $event)
    {
        $event->users()->attach(Auth::user()->id);

        return redirect()->route('event.show', $event);
    }

    public function unsubscribe(Event $event)
    {
        $event->users()->detach(Auth::user()->id);

        return redirect()->route('event.show', $event);
    }

    public function getEvents() {
        $my_events = Event::where('created_by', Auth::user()->id)->get();
        $all_events = Event::all();

        return view('layouts.events', [
            'my_events' => $my_events,
            'all_events' => $all_events
        ]);
    }
}
