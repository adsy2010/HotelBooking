<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse|Response
     */
    public function index()
    {
        //
        return response()->json(['status' => 'ok', 'data' => Room::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function store(Request $request)
    {
        //
        $room = Room::create([
            'premise' => $request->premise,
            'roomType' => $request->roomType,
            'room' => $request->room,
        ]);
        $room->save();

        return response()->json(['status' => 'ok', 'data' => $room]);
    }

    /**
     * Display the specified resource.
     *
     * @param Room $room
     * @return JsonResponse|Response
     */
    public function show(Room $room)
    {
        //
        return response()->json(['status' => 'ok', 'data' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Room $room
     * @return JsonResponse|Response
     */
    public function edit(Room $room)
    {
        //
        return response()->json(['status'=>'ok','data' => $room]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Room $room
     * @return JsonResponse|Response
     */
    public function update(Request $request, Room $room)
    {
        //
        $room->premise = $request->premise;
        $room->roomType = $request->roomType;
        $room->room = $request->room;
        $room->save();

        return response()->json(['status' => 'ok', 'data' => $room]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Room $room
     * @return JsonResponse|Response
     */
    public function destroy(Room $room)
    {
        //
        $room->delete();
        return response()->json(['status' => 'ok']);
    }
}
