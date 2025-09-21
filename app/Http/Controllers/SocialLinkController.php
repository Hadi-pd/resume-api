<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use App\Http\Requests\SocialLinkRequest;
use App\Http\Resources\SocialLinkResource;

class SocialLinkController extends Controller
{
    public function index()
    {
        return SocialLinkResource::collection(SocialLink::all());
    }

    public function store(SocialLinkRequest $request)
    {
        $socialLink = SocialLink::create($request->validated());
        return new SocialLinkResource($socialLink);
    }

    public function show(SocialLink $socialLink)
    {
        return new SocialLinkResource($socialLink);
    }

    public function update(SocialLinkRequest $request, SocialLink $socialLink)
    {
        $socialLink->update($request->validated());
        return new SocialLinkResource($socialLink);
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
