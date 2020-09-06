<?php

namespace App\Http\Controllers;


use App\RoomType;
use Exception;
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
        try{
            $roomType = RoomType::create([
                'name' => $request->name,
                'description' => $request->description,
                'hasTV' => $request->hasTV,
                'hasFacilities' => $request->hasFacilities
            ]);
            $roomType->save();

            return response()->json(['status' => 'ok', 'data' => $roomType]);
        }
        catch (Exception $exception)
        {

            return response()->json(['status' => 'failed to create room type', 'data' => $exception->getMessage()]);
        }

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
    public function update(Request $request)
    {
        //
        try {
            $roomType = RoomType::find($request->roomtype);
            $roomType->name = $request->name;
            $roomType->description = $request->description;
            $roomType->hasTV = $request->hasTV;
            $roomType->hasFacilities = $request->hasFacilities;
            $roomType->save();

            return response()->json(['status' => 'ok', 'data' => $roomType]);
        }
        catch (Exception $exception)
        {
            return response()->json(['status' => 'unable to update room type', 'data' => $exception->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse|Response
     */
    public function destroy(Request $request)
    {
        //
        try {
            RoomType::findOrFail($request->roomtype)->delete();
            return response()->json(['status' => 'ok', 'data' => $request->roomtype]);
        }
        catch (Exception $exception)
        {
            return response()->json(['status' => 'unable to delete room type', 'data' => $exception->getMessage()]);
        }
    }
}
