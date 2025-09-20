<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Http\Resources\EducationResource;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::latest()->paginate(10);
        return EducationResource::collection($educations);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(EducationRequest $request)
    {
        $education = Education::create($request->validated());

        return response()->json([
            'message' => 'Education created successfully',
            'data'    => new EducationResource($education),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
            return new EducationResource($education);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EducationRequest $request, Education $education)
    {
        $education->update($request->validated());

        return response()->json([
            'message' => 'Education updated successfully',
            'data'    => new EducationResource($education),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        $education->delete();

        return response()->json([
            'message' => 'Education deleted successfully',
        ]);
    }
}
