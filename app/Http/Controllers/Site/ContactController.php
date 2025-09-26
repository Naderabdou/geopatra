<?php

namespace App\Http\Controllers\Site;

use App\Models\Conact;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactUsRequest;

class ContactController extends Controller
{


    public function index(): View
    {
        return view('site.contact.index');
    }

    public function store(ContactUsRequest $request)
    {


        $contact =  Conact::create($request->validated());

        $title = 'يريد العميل ' . $request->name . ' التواصل معك' . ' بخصوص ' . $request->message . ' وهذا رقمه ' . $request->phone;

        sendNotifyAdmin($title, 'عرض الرساله', route('filament.admin.resources.contacts.view', $contact->id));

        return response()->json(['success' => __('تم ارسال الرسالة بنجاح وسوف يتم الرد عليك في اقرب وقت')]);
    }
}
