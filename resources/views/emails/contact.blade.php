@component('mail::message')
# پیام جدید از فرم تماس

**نام:** {{ $message->name }}  
**ایمیل:** {{ $message->email }}  
**موضوع:** {{ $message->subject }}  

متن پیام:  
{{ $message->message }}

@endcomponent