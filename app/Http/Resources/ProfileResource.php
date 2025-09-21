<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'full_name' => $this->full_name,
            'job_title' => $this->job_title,
            'about_me'  => $this->about_me,
            'email'     => $this->email,
            'phone'     => $this->phone,
            'address'   => $this->address,
            'avatar'    => $this->avatar ? asset('storage/' . $this->avatar) : null,
            'age'       => $this->age,
            'marital'   => $this->marital,
            'military'  => $this->military,
        ];
    }
}
