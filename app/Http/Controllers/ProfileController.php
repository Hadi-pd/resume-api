<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    public function show()
    {
        $profile = Profile::first();

        if (!$profile) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }

        return new ProfileResource($profile);
    }

    public function storeOrUpdate(ProfileRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        $profile = Profile::first();

        if ($profile) {
            $profile->update($data);
            $message = 'Profile updated successfully';
        } else {
            $profile = Profile::create($data);
            $message = 'Profile created successfully';
        }

        return response()->json([
            'message' => $message,
            'data'    => new ProfileResource($profile),
        ]);
    }
}
