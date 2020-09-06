<?php

namespace App\Http\Controllers;

use App\Premises;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PremisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse|Response
     */
    public function index()
    {
        //
        return response()->json(['status' => 'ok', 'data' => Premises::all()]);
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
            $premises = Premises::create([
                'address' => $request->address,
                'city' => $request->city,
                'postcode' => $request->postcode,
                'tel' => $request->tel,
                'email' => $request->email,
                'description' => $request->description
            ]);
            $premises->save();

            return response()->json(['status' => 'ok', 'data' => $premises]);
        }
        catch (Exception $exception)
        {
            return response()->json(['status' => 'failed to create premises', 'data' => $exception->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param Premises $premises
     * @return JsonResponse|Response
     */
    public function show(Premises $premises)
    {
        //
        return response()->json(['status' => 'ok', 'data' => $premises]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Premises $premises
     * @return JsonResponse|Response
     */
    public function edit(Premises $premises)
    {
        //
        return response()->json(['status'=>'ok','data' => $premises]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function update(Request $request)
    {
        //
        try {
            $premises = Premises::find($request->premise);
            $premises->address = $request->address;
            $premises->city = $request->city;
            $premises->postcode = $request->postcode;
            $premises->tel = $request->tel;
            $premises->email = $request->email;
            $premises->description = $request->description;
            $premises->save();

            return response()->json(['status' => 'ok', 'data' => ["premises" => $premises, "update" => $request->address]]);
        }
        catch (Exception $exception)
        {
            return response()->json(['status' => 'unable to update premises', 'data' => $premises]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function destroy(Request $request)
    {
        //
        try{
            $premises = Premises::findOrFail($request->premise);
                $premises->delete();
            return response()->json(['status' => 'ok', 'data' => $request->premise]);
        }
        catch (Exception $exception)
        {
            return response()->json(['status' => 'problem deleting premises', 'data'=>$exception->getMessage()]);
        }

    }
}
