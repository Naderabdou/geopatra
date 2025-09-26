<?php

namespace App\Http\Controllers\Site;

use App\Models\Blog;
use App\Models\Join;
use App\Models\Team;
use App\Models\Career;
use App\Models\Project;
use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\SubscribeRequest;
use App\Http\Requests\Site\JoinUsRequest;

class HomeController extends Controller
{
    public function index()
    {

        $services = Service::take(6)->latest()->get();
        $projects = Project::take(2)->latest()->get();
        $teams = Team::latest()->get();
        $careers = Career::latest()->get();
        $blogs = Blog::take(6)->latest()->get();

        return view('site.home', [
            'services' => $services,
            'projects' => $projects,
            'teams' => $teams,
            'careers' => $careers,
            'blogs' => $blogs
        ]);
    }

    public function join(JoinUsRequest $request)
    {

        $join = Join::create($request->validated());

        $title = 'يريد العميل '.$request->name.' التواصل معك'.' بخصوص '.$request->message.' وهذا رقمه '.$request->phone;

        sendNotifyAdmin($title, 'عرض الرساله', route('filament.admin.resources.joins.index'));

        return response()->json(['success' => __('تم ارسال الرسالة بنجاح وسوف يتم الرد عليك في اقرب وقت')]);
    }


    

    public function subscribe(SubscribeRequest $request)
    {

        // $contact = Subscribe::create($request->validated());

        // $title = 'يريد العميل '.$request->name.' التواصل معك'.' بخصوص '.$request->message.' وهذا رقمه '.$request->phone;

        // sendNotifyAdmin($title, 'عرض الرساله', route('filament.admin.resources.contacts.view', $contact->id));

        return response()->json(['success' => __('تم ارسال الرسالة بنجاح وسوف يتم الرد عليك في اقرب وقت')]);
    }

    public function lang($lang)
    {

        session()->put('lang', $lang);

        return redirect()->back();
    }
}
