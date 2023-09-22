<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        $this->middleware('auth:sanctum');
    }

    public function create(Request $request)
    {
        $event = Event::create([
            'title'      => $request->title,
            'text'       => $request->text,
            'date'       => $request->date,
            'created_by' => Auth::user()->id
        ]);

        return response()->json([
            'error'  => null,
            'result' => $event
        ], 200);
    }

    public function list()
    {
        return response()->json([
            'error'  => null,
            'result' => Event::all()
        ], 200);
    }

    public function subscribe(Request $request)
    {
        $event = Event::find($request->event_id);

        if (!$event) {
            return response()->json([
                'error' => ['Event not exist']
            ], 200);
        }

        $event->users()->attach(Auth::user()->id);

        return response()->json([
            'error'  => null,
            'result' => [
                'success' => true
            ]
        ], 200);
    }

    public function unsubscribe(Request $request)
    {
        $event = Event::find($request->event_id);

        if (!$event) {
            return response()->json([
                'error' => ['Event not exist']
            ], 200);
        }

        $event->users()->detach(Auth::user()->id);

        return response()->json([
            'error'  => null,
            'result' => [
                'success' => true
            ]
        ], 200);
    }

    public function delete(Request $request)
    {
        try {
            $event = Event::find($request->event_id);

            if (!$event) {
                return response()->json([
                    'error' => ['Event not exist']
                ], 200);
            }

            if ($event->delete()) {
                return response()->json([
                    'error'  => null,
                    'result' => [
                        'success' => true
                    ]
                ], 200);
            } else {
                if ($event->delete()) {
                    return response()->json([
                        'error' => ['Event not exist']
                    ], 200);
                }
            }
        } catch (\Exception $exception) {
            return response()->json([
                'error' => ['Event not exist']
            ], 200);
        }
    }
}
