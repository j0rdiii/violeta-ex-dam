<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dam;
use Illuminate\Http\Request;


class DamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dams = Dam::all();

        return response()->json([
            'status' => true,
            'message' => 'Records retrieved successfully',
            'data' => $dams,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lenguajes_marcas_grade' => 'required|numeric|min:0|max:10',
            'sistemas_informaticos_grade' => 'required|numeric|min:0|max:10',
            'fol_student_count' => 'required|integer|min:1',
            'desarrollo_interfaces_status' => 'required|in:pending,completed,in_progress'
        ]);

        $dam = Dam::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Records created successfully',
            'data' => $dam,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dam = Dam::find($id);
        
        if (!$dam) {
            return response()->json([
                'status' => false,
                'message' => 'Record not found',
            ], 404);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Record retrieved successfully',
            'data' => $dam,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $dam = Dam::find($id);
        return view('dams.edit', compact('dam'));
    }

    /** 
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dam = Dam::find($id);

        if (!$dam) {
            return response()->json([
                'status' => false,
                'message' => 'Record not found',
            ], 404);
        }

        $request->validate([
            'lenguajes_marcas_grade' => 'required|numeric|min:0|max:10',
            'sistemas_informaticos_grade' => 'required|numeric|min:0|max:10',
            'fol_student_count' => 'required|integer|min:1',
            'desarrollo_interfaces_status' => 'required|in:pending,completed,in_progress'
        ]);

        $dam->update($request->all());


        return response()->json([
            'status' => true,
            'message' => 'Record updated successfully',
            'data' => $dam,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dam = Dam::find($id);

        if (!$dam) {
            return response()->json([
                'status' => false, 
                'message' => 'Record not found',
            ], 404);
        }

        $dam->delete();


        return response()->json([
            'status' => true,
            'message' => 'Record deleted successfully',
        ], 200);
    }

    public function storeBodyReq(Request $request) 
    {
        if (($request->getContentTypeFormat() != "json") ||
            ($request->headers->get('Content-Type') != "application/json")) {

            return response()->json([
                'status' => 'error: Bad Request',
                'message' => 'Content-Type must be application/json',
            ], 400);
        } 
        else 
        {
            $data = json_decode($request->getContent(), true);
            $dam = new Dam;

            $dam->lenguajes_marcas_grade = $data['lenguajes_marcas_grade'];
            $dam->sistemas_informaticos_grade = $data['sistemas_informaticos_grade'];
            $dam->fol_student_count = $data['fol_student_count'];
            $dam->desarrollo_interfaces_status = $data['desarrollo_interfaces_status'];
            
            $dam->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Enrollments created successfully',
                '$request->all()' => $request->all(),
                '$request->collect()' => $request->collect(),
                '$request->getContent()' => $request->getContent(),
                '$request->getHost()' => $request->getHost(),
                '$request->getPort()' => $request->getPort(),
                '$request->getUri()' => $request->getUri(),
                //'$request->getUriForPath()' => getUriForPath($request->getUriForPath()),
                '$request->headers->get(\'Content-Type\')' => $request->headers->get('Content-Type'), 
                '$request->headers->get(\'Content-Length\')' => $request->headers->get('Content-Length'), 
            ]);
        }
    }
}
