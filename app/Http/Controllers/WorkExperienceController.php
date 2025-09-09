<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkExperienceRequest;
use App\Http\Requests\UpdateWorkExperienceRequest;
use App\Http\Resources\WorkExperienceResource;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    public function index()
    {
        $items = WorkExperience::latest()->paginate(10);
        return WorkExperienceResource::collection($items);
    }

    public function store(StoreWorkExperienceRequest $request)
    {
        $item = WorkExperience::create($request->validated());
        return new WorkExperienceResource($item);
    }

    public function show(WorkExperience $workExperience)
    {
        return new WorkExperienceResource($workExperience);
    }

    public function update(UpdateWorkExperienceRequest $request, WorkExperience $workExperience)
    {
        $workExperience->update($request->validated());
        return new WorkExperienceResource($workExperience);
    }

    public function destroy(WorkExperience $workExperience)
    {
        $workExperience->delete();
        return response()->json(['message' => 'Work experience deleted successfully']);
    }
}