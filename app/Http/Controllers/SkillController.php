<?php 
namespace App\Http\Controllers;

use App\Models\Skill;
use App\Http\Resources\SkillResource;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::latest()->paginate(30);
        return SkillResource::collection($skills);
    }

    public function store(StoreSkillRequest $request)
    {
        $skill = Skill::create($request->validated());
        return new SkillResource($skill);
    }

    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }

    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $skill->update($request->validated());
        return new SkillResource($skill);
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json(['message' => 'Skill deleted successfully']);
    }
}
