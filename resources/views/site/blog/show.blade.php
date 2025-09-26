@extends('site.layouts.app')
@section('title', __('Home'))
@title($setting->{'site_name_' . app()->getLocale()})
@description(Str::limit($setting->{'about_desc_' . app()->getLocale()}), 160)
@image(asset('storage/' . $setting->logo))
@section('content')
    <main id="app">

        <section class="news-page">
            <div class="main-container">
                <div class="img-news-page">
                    <img src="{{ $blog->image_path }}" alt="">
                </div>
                <div class="text-news-page">
                    <h2>{{ $blog->title }} <span> <img src="{{ asset('site/images/data.png') }}" alt="">
                            {{ $blog->date_formatted }} </span></h2>
                    <div class="text-details my-4">
                        <p>
                            {{ strip_tags($blog->desc) }}
                        </p>
                    </div>
                </div>


                <div class="more-news-details mr-section">
                    <div class="title-center">
                        <h3>{{ __('More news') }}</h3>
                        <h2>
                            {{ $setting->{'blog_title_' . app()->getLocale()} }}
                        </h2>
                    </div>
                    <div class="owl-carousel owl-theme maincarousel" id="slider-news">
                        @forelse ($moreNews as $news)
                            <div class="item">
                                <a href="{{ route('site.blog.show', $news->id) }}">
                                    <div class="sub-blog-index">

                                        <div class="img-blog-index">
                                            <img src="{{ $news->image_path }}" alt="" />
                                        </div>
                                        <div class="text-blog-index">

                                            <h2>{{ $news->title }}</h2>
                                            <p>
                                                {{ Str::limit(strip_tags($news->desc), 300) }}
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
                </div>
            </div>
        </section>



    </main>
@endsection
