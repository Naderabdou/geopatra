@extends('site.layouts.app')
@section('title', __('Home'))
@title($setting->{'site_name_' . app()->getLocale()})
@description(Str::limit($setting->{'about_desc_' . app()->getLocale()}), 160)
@image(asset('storage/' . $setting->logo))
@section('content')
    <main id="app">

        <section class="news-page mr-section">
            <div class="main-container" id='my_blogs'>
                <div class="title-center">
                    <h3>{{ __('Latest News') }} </h3>
                    <h2>{{ $setting->{'blog_title_' . app()->getLocale()} }}</h2>
                </div>
                <div class="row row-gap list">
                    @forelse ($blogs as $blog)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('site.blog.show', $blog->slug) }}">
                                <div class="sub-blog-index">

                                    <div class="img-blog-index">
                                        <img src="{{ $blog->image_path }}" alt="" />
                                    </div>
                                    <div class="text-blog-index">

                                        <h2 class="username">{{ $blog->title }}</h2>
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
                var addressList = new List('my_blogs', options);
            }

            // Initialize List.js on page load
            initializeListJS();
        });
    </script>
@endpush
