@extends('site.layouts.app')
@section('title', __('Home'))
@title($setting->{'site_name_' . app()->getLocale()})
@description(Str::limit($setting->{'about_desc_' . app()->getLocale()}), 160)
@image(asset('storage/' . $setting->logo))
@section('content')
    <main id="app">
        <!-- start hero -->
        <section class="hero">
            <div class="bg-video">
                <video src="{{ asset('storage/' . $setting->hero_media) }}" autoplay loop muted playsinline></video>
            </div>
            <div class="main-container">
                <div class="text-hero">
                    <h3>
                        {{ $setting->{'site_name_' . app()->getLocale()} }}
                    </h3>
                    <h2>
                        {{ $setting->{'hero_desc_one_' . app()->getLocale()} }}
                    </h2>
                    <p>
                        {{ $setting->{'hero_desc_two_' . app()->getLocale()} }}
                    </p>
                    <a href="{{ route('site.about') }}" class="ctm-btn-w">
                        {{ __('Learn more') }} <img src="{{ __('site/images/arrow-1.svg') }}" alt="" /></a>
                </div>
            </div>
        </section>
        <!-- end hero -->

        <!-- start about us -->
        <section class="aboutus-index mr-section">
            <div class="main-container">
                <div class="row align-items-center row-gap">
                    <!-- start text aboutus-index -->
                    <div class="col-lg-7">
                        <div class="text-aboutus-index">
                            <div class="title-start">
                                <h3>{{ __('About us') }}</h3>
                                <h2>
                                    {{ $setting->{'about_title_' . app()->getLocale()} }}
                                </h2>
                            </div>
                            <p>
                                {{ $setting->{'about_desc_' . app()->getLocale()} }}
                            </p>
                        </div>
                        <div class="our-vision">
                            <div class="row pg-none row-gap">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="sub-our-vision">
                                        <div class="title-our-vision">
                                            <div class="img-our-vision">
                                                <img src="{{ asset('site/images/a1.png') }}" alt="" />
                                            </div>
                                            <h2>{{ __('Our Mission') }}</h2>
                                        </div>
                                        <p>
                                            {{ $setting->{'our_mission_' . app()->getLocale()} }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="sub-our-vision">
                                        <div class="title-our-vision">
                                            <div class="img-our-vision">
                                                <img src="{{ asset('site/images/a2.png') }}" alt="" />
                                            </div>
                                            <h2>{{ __('Our Vision') }}</h2>
                                        </div>
                                        <p>
                                            {{ $setting->{'our_vision_' . app()->getLocale()} }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 ">
                                    <div class="sub-our-vision">
                                        <div class="title-our-vision">
                                            <div class="img-our-vision">
                                                <img src="{{ asset('site/images/a3.png') }}" alt="" />
                                            </div>
                                            <h2>{{ __('Our Goals') }}</h2>
                                        </div>
                                        <p>
                                            {{ $setting->{'our_goals_' . app()->getLocale()} }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-center mt-4">
                                        <a href="{{ route('site.about') }}" class="ctm-btn-w">{{ __('Read more') }} <img
                                                src="{{ asset('site/images/arrow-1.svg') }}" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end text aboutus-index -->

                    <!-- start img-aboutus-index  -->
                    <div class="col-lg-5">
                        <div class="img-aboutus-index">
                            <img src="{{ asset('storage/' . $setting->about_image) }}" alt="" />
                        </div>
                    </div>
                    <!-- end img-aboutus-index -->
                </div>
            </div>
        </section>
        <!-- end about us -->

        <!-- start services-index  -->
        <section class="services-index mr-section ">
            <div class="main-container">
                <div class="title-center">
                    <h3>{{ __('Our services') }}</h3>
                    <h2>{{ $setting->{'services_title_' . app()->getLocale()} }}</h2>
                </div>

                <div class="row row-gap">
                    @forelse ($services as $service)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('site.service.show', $service->slug) }}">

                                <div class="sub-services-index">
                                    <div class="text-services-index">
                                        <h2>{{ $service->name }}</h2>
                                        <p>{{ Str::limit(strip_tags($service->short_desc), 300) }}</p>
                                    </div>
                                    <div class="img-services-index">
                                        <div class="img-mask">
                                            <img src="{{ $service->image_path }}" alt="" />
                                        </div>
                                        <div class="stroke-bg">
                                            <object data="{{ asset('site/images/s1.svg') }}" type="">
                                                <img src="{{ asset('site/images/s1.svg') }}" alt="" />
                                            </object>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @empty
                        <div class="item">
                            <div
                                class="sub-program flex flex-col items-center justify-center text-center p-6 rounded-xl shadow-md bg-gray-50 min-h-[250px]">
                                <h2 class="text-2xl font-bold text-gray-700 mb-2">{{ __('لا توجد بيانات حاليا') }}</h2>
                                <p class="text-gray-500">
                                    {{ __('تابعنا باستمرار لمعرفة الجديدة قريباً.') }}
                                </p>
                            </div>
                        </div>
                    @endforelse



                    <div class="col-lg-12">
                        <div class="text-center mt-6">
                            <a href="{{ route('site.services.index') }}" class="ctm-btn-w">
                                {{ __('View more') }} <img src="{{ asset('site/images/arrow-1.svg') }}"
                                    alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end services-index  -->

        <!-- start projects-index  -->
        <section class="projects-index mr-section pg-section">
            <div class="main-container">
                <div class="title-center">
                    <h3>{{ __('Our projects') }}</h3>
                    <h2>{{ $setting->{'projects_title_' . app()->getLocale()} }}</h2>
                </div>
                @forelse ($projects as $project)
                    <div class="sub-projects-index" data-aos="fade-up-right" data-aos-easing="linear"
                        data-aos-duration="700">
                        <div class="img-projects-index">
                            <a href="{{ route('site.project.show', $project->slug) }}">
                                <img src="{{ $project->image_path }}" alt="" />
                            </a>
                        </div>
                        <div class="text-projects-index">
                            <h2>
                                {{ $project->name }}
                            </h2>
                            <p>
                                {{ Str::limit(strip_tags($project->desc), 400) }}
                            </p>
                            <ul>
                                <li>
                                    <div class="img-ele-projects-index">
                                        <img src="{{ asset('site/images/sp1.png') }}" alt="" />
                                    </div>
                                    <h2>{{ __('Location') }}: {{ $project->location }}</h2>
                                </li>
                                <li>
                                    <div class="img-ele-projects-index">
                                        <img src="{{ asset('site/images/sp2.png') }}" alt="" />
                                    </div>
                                    <h2>{{ __('Site space') }}: {{ $project->space }}</h2>
                                </li>
                                <li>
                                    <div class="img-ele-projects-index">
                                        <img src="{{ asset('site/images/sp3.png') }}" alt="" />
                                    </div>
                                    <h2>{{ __('Duration') }}: {{ $project->duration }}</h2>
                                </li>
                            </ul>
                        </div>
                    </div>
                @empty
                    <div class="item">
                        <div
                            class="sub-program flex flex-col items-center justify-center text-center p-6 rounded-xl shadow-md bg-gray-50 min-h-[250px]">
                            <h2 class="text-2xl font-bold text-gray-700 mb-2">{{ __('لا توجد بيانات حاليا') }}</h2>
                            <p class="text-gray-500">
                                {{ __('تابعنا باستمرار لمعرفة الجديدة قريباً.') }}
                            </p>
                        </div>
                    </div>
                @endforelse



                <div class="btn-projects-index mt-5 text-center">
                    <a href="{{ route('site.projects.index') }}" class="ctm-btn-w">{{ __('View more') }} <img
                            src="{{ asset('site/images/arrow-1.svg') }}" alt="" />
                    </a>
                </div>
            </div>
        </section>
        <!-- end projects-index  -->

        <!-- start our-team  -->
        <section class="our-team pg-section">
            <div class="main-container">
                <div class="title-center">
                    <h3>{{ __('Our team') }}</h3>
                    <h2>
                        {{ $setting->{'team_title_' . app()->getLocale()} }}
                    </h2>
                </div>

                <div class="owl-carousel owl-theme maincarousel" id="slider-team">
                    @forelse ($teams as $team)
                        <div class="item">
                            <div class="sub-our-team">
                                <img src="{{ $team->image_path }}" alt="" />
                                <div class="content-our-team">
                                    <h2>{{ $team->name }}</h2>
                                    <span>{{ $team->job_title }}</span>
                                    <p>
                                        {{ strip_tags($team->desc) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="item">
                            <div
                                class="sub-program flex flex-col items-center justify-center text-center p-6 rounded-xl shadow-md bg-gray-50 min-h-[250px]">
                                <h2 class="text-2xl font-bold text-gray-700 mb-2">{{ __('لا توجد بيانات حاليا') }}</h2>
                                <p class="text-gray-500">
                                    {{ __('تابعنا باستمرار لمعرفة الجديدة قريباً.') }}
                                </p>
                            </div>
                        </div>
                    @endforelse


                </div>
            </div>
        </section>
        <!-- end our-team  -->

        <!-- start careers-index -->
        <section class="careers-index pg-section">
            <div class="main-container">
                <div class="title-center">
                    <h3>{{ __('Our Careers') }}</h3>
                    <h2>{{ $setting->{'careers_title_' . app()->getLocale()} }}</h2>
                </div>

                <div class="owl-carousel owl-theme maincarousel" id="slider-careers">
                    @forelse ($careers as $career)
                        <div class="item">
                            <div class="sub-careers-index">
                                <div class="title-careers-index">
                                    <img src="{{ $career->icon_path }}" alt="" />
                                    <h2>{{ $career->name }}</h2>
                                </div>
                                <div class="text-careers-index">
                                    <h3>{{ __('Description') }}:</h3>
                                    <p>
                                        {{ strip_tags($career->desc) }}
                                    </p>
                                    <h3>{{ __('Requirements') }}:</h3>
                                    <ul>
                                        @foreach ($career->requirements as $requirement)
                                            <li>{{ $requirement }}</li>
                                        @endforeach
                                    </ul>
                                    <div class="mt-3 text-center">
                                        {{-- <a data-toggle="modal" data-target=".join-us" href="" data-name="{{ $career->name }}" class="ctm-btn-w ctm-join">
                                            {{ __('Apply Now') }} <img src="{{ asset('site/images/arrow-1.svg') }}"
                                                alt="" />
                                        </a> --}}
                                        <a data-toggle="modal" data-target=".join-us" href="#"
                                            data-id="{{ $career->id }}" data-name="{{ $career->name }}"
                                            class="ctm-btn-w ctm-join">
                                            {{ __('Apply Now') }}
                                            <img src="{{ asset('site/images/arrow-1.svg') }}" alt="" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
            <canvas id="nokey" width="800" height="800"> </canvas>
        </section>
        <!-- end careers-index -->

        <!-- start blog-index -->
        <section class="blog-index mr-section">
            <div class="main-container">
                <div class="title-center">
                    <h3>{{ __('Latest News') }}</h3>
                    <h2>
                        {{ $setting->{'blog_title_' . app()->getLocale()} }}
                    </h2>
                </div>
                <div class="row row-gap">
                    @forelse ($blogs as $blog)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('site.blog.show', $blog->slug) }}">

                                <div class="sub-blog-index">
                                    <div class="img-blog-index">
                                        <img src="{{ $blog->image_path }}" alt="" />
                                    </div>
                                    <div class="text-blog-index">
                                        <h2>{{ $blog->title }}</h2>
                                        <p>
                                            {{ Str::limit(strip_tags($blog->desc), 300) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @empty
                        <div class="item">
                            <div
                                class="sub-program flex flex-col items-center justify-center text-center p-6 rounded-xl shadow-md bg-gray-50 min-h-[250px]">
                                <h2 class="text-2xl font-bold text-gray-700 mb-2">{{ __('لا توجد بيانات حاليا') }}
                                </h2>
                                <p class="text-gray-500">
                                    {{ __('تابعنا باستمرار لمعرفة الجديدة قريباً.') }}
                                </p>
                            </div>
                        </div>
                    @endforelse

                    <div class="col-lg-12">
                        <div class="text-center mt-5">
                            <a href="{{ route('site.blogs.index') }}" class="ctm-btn-w">{{ __('View more') }} <img
                                    src="{{ asset('site/images/arrow-1.svg') }}" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end blog-index -->

        <!-- start newsletter -->
        <section class="newsletter mr-section">
            <div class="text-newsletter">
                <h3>
                    {{ $setting->{'span_banner_' . app()->getLocale()} }}
                </h3>
                <h2>
                    {{ $setting->{'title_banner_' . app()->getLocale()} }}
                </h2>
                <p>
                    {{ $setting->{'desc_banner_' . app()->getLocale()} }}
                </p>
                <a href="{{ route('site.contact.index') }}" class="ctm-btn-w">{{ __('Get in Touch') }} <img
                        src="{{ asset('site/images/arrow-1.svg') }}" alt="" />
                </a>
            </div>
        </section>
        <!-- end newsletter -->
    </main>
@endsection
