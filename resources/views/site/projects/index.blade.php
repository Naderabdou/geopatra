@extends('site.layouts.app')
@section('title', __('Home'))
@title($setting->{'site_name_' . app()->getLocale()})
@description(Str::limit($setting->{'about_desc_' . app()->getLocale()}), 160)
@image(asset('storage/' . $setting->logo))
@section('content')
    <main id="app">
        <!-- start products-page -->
        <section class="products-page pg-section">
            <div class="main-container">
                <div class="title-center">
                    <h3>{{ __('Our projects') }}</h3>
                    <h2>{{ $setting->{'projects_title_' . app()->getLocale()} }}</h2>
                </div>


                @forelse ($projects as $project)
                    <div class="sub-projects-index" data-aos="fade-up-right" data-aos-easing="linear" data-aos-duration="700">
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






            </div>



        </section>
        <!-- end products-page -->

    </main>

@endsection
{{-- @push('js')
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
@endpush --}}
