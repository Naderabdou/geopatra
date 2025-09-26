@extends('site.layouts.app')
@section('title', __('Home'))
@title($setting->{'site_name_' . app()->getLocale()})
@description(Str::limit($setting->{'about_desc_' . app()->getLocale()}), 160)
@image(asset('storage/' . $setting->logo))
@section('content')
    <main id="app">

        <section class="product-details">
            <div class="main-container">
                <div class="title-product-details">
                    <div class="img-product-details">
                        <img src="{{ $project->image_path }}" alt="">
                    </div>
                    <div class="text-product-details">
                        <h2>{{ $project->name }}</h2>
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
                <div class="text-details my-4">
                    <p>
                        {{ strip_tags($project->desc) }}
                    </p>
                </div>
            </div>
        </section>


    </main>


@endsection

