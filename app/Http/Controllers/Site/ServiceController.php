<?php

namespace App\Http\Controllers\Site;

use App\Models\Service;
use App\Models\ServiceRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ServiceStoreRequest;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();

        return view('site.service.index', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->with('details')->firstOrFail();
        $moreServices = Service::where('id', '!=', $service->id)
            ->latest()
            ->take(3)
            ->get();

        return view('site.service.show', compact('service', 'moreServices'));
    }
    public function store(ServiceStoreRequest $request)
    {
        ServiceRequest::create($request->validated());
        $title = 'يريد العميل ' . $request->name . ' التواصل معك' . 'بخصوص طلب خدمة' . $request->message . ' وهذا رقمه ' . $request->phone;

        sendNotifyAdmin($title, 'عرض الرساله', route('filament.admin.resources.contacts.index'));

        return response()->json(['success' => __('تم ارسال الطلب بنجاح وسوف يتم الرد عليك في اقرب وقت')]);
    }
}
