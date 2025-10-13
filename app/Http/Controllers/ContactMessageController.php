<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function store(ContactMessageRequest $request)
    {
        $data = $request->only(['name', 'email', 'subject', 'message']);
        $data['ip_address'] = $request->ip();

        $message = ContactMessage::create($data);

        // Mail::to(config('mail.from.address'))->send(new \App\Mail\NewContactMessage($message));

        return response()->json([
            'success' => true,
            'message' => 'پیام شما با موفقیت ثبت شد'
        ]);
    }
}
