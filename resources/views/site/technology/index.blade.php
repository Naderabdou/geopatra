@extends('site.layouts.app')
@section('title', __('Home'))
@title($setting->{'site_name_' . app()->getLocale()})
@description(Str::limit($setting->{'about_desc_' . app()->getLocale()}), 160)
@image(asset('storage/' . $setting->logo))
@section('content')
    <main id="app">
        <!-- start technology page :> -->
        <section class="technology-page ">
            <div class="main-container">
                <div class="bg-technology"
                    style="background-image:url({{ asset('storage/' . $setting->technology_image) }});">
                    <div class="content-technology">
                        <div class="title-start">
                            <h3>{{ $setting->{'technology_span_' . app()->getLocale()} }}</h3>
                            <h2>{{ $setting->{'technology_title_' . app()->getLocale()} }}</h2>
                            <p>
                                {{ $setting->{'technology_desc_' . app()->getLocale()} }}
                            </p>
                        </div>

                    </div>
                </div>


                <!-- start main-technology-page -->
                {{-- <div class="main-technology-page mr-section">
                    <div class="tabs-technology">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach ($technologies as $index => $tech)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link @if ($loop->first) active @endif"
                                        id="pills-{{ $tech->id }}" data-toggle="pill"
                                        data-target="#pills-{{ $tech->id }}-content" type="button" role="tab"
                                        aria-controls="pills-{{ $tech->id }}-content"
                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        <div class="img-tabs-technology">
                                            <img src="{{ $tech->icon_path }}" alt="{{ $tech->name }}">
                                        </div>
                                        <h2>{{ $tech->name }}</h2>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        @foreach ($technologies as $tech)
                            <div class="tab-pane fade @if ($loop->first) show active @endif"
                                id="pills-{{ $tech->id }}-content" role="tabpanel"
                                aria-labelledby="pills-{{ $tech->id }}">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="img-details-technology">
                                            <img src="{{ $tech->image_path }}" alt="{{ $tech->title }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="text-details-technology">
                                            <h2>{{ $tech->title }}</h2>
                                            <p>{{ strip_tags($tech->desc) }}</p>

                                            <ul>
                                                @foreach ($tech->features as $feature)
                                                    <li>{{ $feature }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> --}}

            <div class="main-technology-page mr-section">
    <div class="tabs-technology">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @foreach ($technologies as $index => $tech)
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if ($loop->first) active @endif"
                        id="pills-{{ $tech->id }}-tab"
                        data-toggle="pill"
                        data-target="#pills-{{ $tech->id }}"
                        type="button" role="tab"
                        aria-controls="pills-{{ $tech->id }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">

                        <div class="img-tabs-technology">
                            <img src="{{ $tech->icon_path }}" alt="">
                        </div>
                        <h2>{{ $tech->name }}</h2>
                    </button>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="tab-content" id="pills-tabContent">
        @foreach ($technologies as $tech)
            <div class="tab-pane fade @if ($loop->first) show active @endif"
                id="pills-{{ $tech->id }}"
                role="tabpanel"
                aria-labelledby="pills-{{ $tech->id }}-tab">

                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="img-details-technology">
                            <img src="{{ $tech->image_path }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-details-technology">
                            <h2>{{ $tech->title }} </h2>
                            <p>{{ strip_tags($tech->desc) }}</p>
                            <ul>
                                @foreach ($tech->features as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</div>






                <!--end main-technology-page -->


                <div class="principles mr-section">
                    <div class="title-center">
                        <h3>{{ __('Our principles') }}</h3>
                        <h2>{{ $setting->{'principles_title_' . app()->getLocale()} }}</h2>
                    </div>
                    <div class="row row-gap">
                        @foreach ($principles as $principle)
                            <div class="col-lg-4">
                                <div class="sub-principles">
                                    <div class="img-principles">
                                        <img src="{{ $principle->image_path }}" alt="">
                                    </div>
                                    <div class="text-principles">
                                        <h2>{{ $principle->title }}</h2>
                                        <p>
                                            {{ strip_tags($principle->desc) }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

            </div>

            <div class="newsletter mr-section">
                <div class="text-newsletter">
                    <h3> {{ $setting->{'span_banner_' . app()->getLocale()} }}</h3>
                    <h2>{{ $setting->{'title_banner_' . app()->getLocale()} }}</h2>
                    <p>
                        {{ $setting->{'desc_banner_' . app()->getLocale()} }}
                    </p>
                    <a href="{{ route('site.contact.index') }}" class="ctm-btn-w">{{ __('Get in Touch') }} <img
                            src="{{ asset('site/images/arrow-1.svg') }}" alt="" />
                    </a>
                </div>
            </div>

        </section>
        <!-- end technology page :> -->


    </main>


@endsection
