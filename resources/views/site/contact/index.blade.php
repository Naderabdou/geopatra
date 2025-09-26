@extends('site.layouts.app')
@section('title', __('Home'))
@title($setting->{'site_name_' . app()->getLocale()})
@description(Str::limit($setting->{'about_desc_' . app()->getLocale()}), 160)
@image(asset('storage/' . $setting->logo))
@section('content')
    <main id="app">
        <div class="contactus pg-section">
            <div class="main-container">
                <div class="row row-gap align-items-center">
                    <div class="col-lg-6">
                        <form action="{{ route('site.contact.store') }}" class="form-contactus" id="contact_form">
                            @csrf
                            <div class="title-contactus">
                                <h2>{{ __('Get in touch !') }}</h2>
                                <p>
                                    {{ $setting->{'contact_title_' . app()->getLocale()} }}
                                </p>
                            </div>
                            <div class="input-form">
                                <input type="text" placeholder="{{ __('Name') }}" class="form-control" name="name"
                                    id="name">
                            </div>
                            <div class="input-form">
                                <input type="email" placeholder="{{ __('Email') }}" class="form-control" name="email"
                                    id="email">
                            </div>
                            <div class="input-form">
                                <input type="phone" class="form-control" name="phone" id="phone"
                                    placeholder="{{ __('Phone') }}">
                            </div>
                            <div class="input-form">
                                <textarea name="message" id="message" placeholder="message" class="form-control" id=""></textarea>
                            </div>

                            <button class="ctm-btn-w ctm-btn-contact"> {{ __('Send') }} <img
                                    src="{{ asset('site/images/arrow-1.svg') }}" alt=""></button>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <div class="title-contactus">
                            <h2>{{ __('Get in touch !') }}</h2>
                            <p>
                                {{ $setting->{'contact_title_' . app()->getLocale()} }}
                            </p>
                        </div>

                        <div id="map" style="height: 300px; border-radius: 20px; margin: 25px 0;"></div>
                        <div class="media-footer">
                            <ul>
                                <li>
                                    <a target="_blank" href="{{ $setting->linkedin }}"><i class="fab fa-linkedin-in"></i>
                                        {{ __('Linkedin') }}</a>
                                </li>
                                <li>
                                    <a target="_blank" href="{{ $setting->instagram }}"><i class="fab fa-instagram"></i>
                                        {{ __('Instagram') }}</a>
                                </li>
                                <li>
                                    <a target="_blank" href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i>
                                        {{ __('Facebook') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pg-none">
                <div id="map" style="height: 100%; width: 100%;" data-address="{{ $setting->address }}">
                </div>
                <input type="hidden" name="lat" value="{{ $setting->location['lat'] }}">
                <input type="hidden" name="lng" value="{{ $setting->location['lng'] }}">
            </div>
        </div>

    </main>
@endsection
@push('js')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdarVlRZOccFIGWJiJ2cFY8-Sr26ibiyY&libraries=places&callback=initAutocomplete&language=ar"
        async defer></script>
    <script src="{{ asset('site/js/map.js') }}"></script>
@endpush
