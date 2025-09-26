@extends('site.layouts.app')
@section('title', __('Home'))
@title($setting->{'site_name_' . app()->getLocale()})
@description(Str::limit($setting->{'about_desc_' . app()->getLocale()}), 160)
@image(asset('storage/' . $setting->logo))
@section('content')
    <main id="app">


        <section class="services-page mr-section">
            <div class="main-container" id="myServices">
                <div class="title-center">
                    <h3>{{ __('Our services') }}</h3>
                    <h2>{{ $setting->{'services_title_' . app()->getLocale()} }}</h2>
                </div>
                <div class="row row-gap list">
                    @forelse ($services as $service)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('site.service.show', $service->slug) }}">
                                <div class="sub-services-index">
                                    <div class="text-services-index">
                                        <h2 class="username">{{ $service->name }}</h2>
                                        <p>
                                            {{ strip_tags($service->short_desc) }}
                                        </p>
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
                </div>
                <ul class="pagination custom-pagination"></ul>

            </div>
        </section>

    </main>

@endsection
@push('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    <script>
        $(document).ready(function() {
            function initializeListJS() {
                var options = {
                    valueNames: ['username'],
                    page: 6,
                    pagination: true
                };
                var addressList = new List('myServices', options);
            }

            // Initialize List.js on page load
            initializeListJS();
        });
    </script>
@endpush
