@extends('site.layouts.app')
@section('title', __('Home'))
@title($setting->{'site_name_' . app()->getLocale()})
@description(Str::limit($setting->{'about_desc_' . app()->getLocale()}), 160)
@image(asset('storage/' . $setting->logo))
@section('content')
    <main id="app">


        <!-- start about us page  :> -->
        <section class="aboutus-page">
            <div class="aboutus-index mr-section">
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
            </div>




            <!-- start our-values :>  -->
            <div class="our-values pg-section mr-section">
                <div class="title-center">
                    <h3>{{ __('Our Values') }}</h3>
                    <h2>{{ $setting->{'values_title_' . app()->getLocale()} }}</h2>
                </div>

                <div class="main-our-values">
                    <div class="main-container">
                        <div class="row-values">
                            @foreach ($ourValues as $value)
                                <div class="main-sub-values">
                                    <div class="sub-our-values">
                                        <div class="title-values">
                                            <img src="{{ $value->icon_path }}" alt="">
                                            <h2>{{ $value->name }}</h2>
                                        </div>
                                        <p> {{ $value->description }}</p>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>

                <canvas id="nokey" width="800" height="800"> </canvas>

            </div>
            <!-- end our-values :< -->


            <div class="our-team-about mr-section">
                <div class="main-container">
                    <div class="title-center ">
                        <h3>{{ __('Our team') }}</h3>
                        <h2>{{ $setting->{'team_title_' . app()->getLocale()} }}</h2>
                    </div>
                    <div class="row row-gap">
                        @forelse ($teams as $team)
                            <div class="col-lg-3 col-md-4 col-sm-6">
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
            </div>
        </section>
        <!-- end about us page  :< -->

    </main>

@endsection
