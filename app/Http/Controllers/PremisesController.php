<?php

namespace App\Http\Controllers;

use App\Premises;
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
        $premises = Premises::create([
            'address' => $request->address,
            'city' => $request->city,
            'postcode' => $request->postcode,
            'tel' => $request->tel,
            'email' => $request->email,
            'description' => $request->description,
        ]);
        $premises->save();

        return response()->json(['status' => 'ok', 'data' => $premises]);
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
     * @param Premises $premises
     * @return JsonResponse|Response
     */
    public function update(Request $request, Premises $premises)
    {
        //
        $premises->address = $request->address;
        $premises->city = $request->city;
        $premises->postcode = $request->postcode;
        $premises->tel = $request->tel;
        $premises->email = $request->email;
        $premises->description = $request->description;
        $premises->save();

        return response()->json(['status' => 'ok', 'data' => $premises]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Premises $premises
     * @return JsonResponse|Response
     */
    public function destroy(Premises $premises)
    {
        //
        $premises->delete();
        return response()->json(['status' => 'ok']);
    }
}
