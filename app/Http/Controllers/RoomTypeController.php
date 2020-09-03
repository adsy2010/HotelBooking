<?php

namespace App\Http\Controllers;

use App\RoomType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse|Response
     */
    public function index()
    {
        //
        return response()->json(['status' => 'ok', 'data' => RoomType::all()]);
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
        $roomType = RoomType::create([
            'name' => $request->name,
            'description' => $request->description,
            'hasTV' => $request->hasTV,
            'hasFacilities' => $request->hasFacilities
        ]);
        $roomType->save();

        return response()->json(['status' => 'ok', 'data' => $roomType]);
    }

    /**
     * Display the specified resource.
     *
     * @param RoomType $roomType
     * @return JsonResponse|Response
     */
    public function show(RoomType $roomType)
    {
        //
        return response()->json(['status' => 'ok', 'data' => $roomType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RoomType $roomType
     * @return JsonResponse|Response
     */
    public function edit(RoomType $roomType)
    {
        //
        return response()->json(['status'=>'ok','data' => $roomType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param RoomType $roomType
     * @return JsonResponse|Response
     */
    public function update(Request $request, RoomType $roomType)
    {
        //
        $roomType->name = $request->name;
        $roomType->description = $request->description;
        $roomType->hasTV = $request->hasTV;
        $roomType->hasFacilities = $request->hasFacilities;
        $roomType->save();

        return response()->json(['status' => 'ok', 'data' => $roomType]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RoomType $roomType
     * @return JsonResponse|Response
     */
    public function destroy(RoomType $roomType)
    {
        //
        $roomType->delete();
        return response()->json(['status' => 'ok']);
    }
}
