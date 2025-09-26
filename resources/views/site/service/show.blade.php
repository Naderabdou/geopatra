@extends('site.layouts.app')
@section('title', __('Home'))
@title($setting->{'site_name_' . app()->getLocale()})
@description(Str::limit($setting->{'about_desc_' . app()->getLocale()}), 160)
@image(asset('storage/' . $setting->logo))
@section('content')
    <main id="app">

        <section class="services-page">
            <div class="main-container">
                <div class="img-services-page">
                    <img src="{{ $service->image_path }}" alt="">
                </div>

                <div class="text-services-page">
                    <h2>{{ $service->name }} <a href="" class="ctm-btn-w" data-toggle="modal"
                            data-target=".bd-example-modal-lg">{{ __('Request service') }} <img
                                src="{{ asset('site/images/arrow-1.svg') }}" alt="">
                        </a></h2>

                    <div class="text-details my-3">
                        <h3> {{ __('Description') }} : </h3>
                        <p> {{ strip_tags($service->long_desc) }}</p>
                    </div>

                </div>

                {{-- <div class="more-detail mr-section">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="sub-more-detail">
                                <div class="img-more-detail">
                                    <img src="images/sd1.svg" alt="">
                                </div>
                                <div class="text-more-detail">
                                    <h2>Geospatial</h2>
                                    <p>Accurate representations of complex systems require robust maps and spatial
                                        analytics from geographic information system (GIS) technology.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sub-more-detail">
                                <div class="img-more-detail">
                                    <img src="images/sd2.svg" alt="">
                                </div>
                                <div class="text-more-detail">
                                    <h2>Geospatial</h2>
                                    <p>Accurate representations of complex systems require robust maps and spatial
                                        analytics from geographic information system (GIS) technology.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sub-more-detail">
                                <div class="img-more-detail">
                                    <img src="images/sd3.svg" alt="">
                                </div>
                                <div class="text-more-detail">
                                    <h2>Geospatial</h2>
                                    <p>Accurate representations of complex systems require robust maps and spatial
                                        analytics from geographic information system (GIS) technology.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="info-details-services mr-section">
                    {{-- <div class="title-center">
                        <h2> Digital twins drive innovation across industries </h2>
                        <p>Organizations use the exceptional data integration, visualization, and analysis
                            capabilities in geospatial digital twins to quickly understand complex systems and make
                            informed decisions.</p>
                    </div> --}}
                    <div class="row row-gap">
                        @foreach ($service->details as $detail)
                            <div class="col-lg-4">
                                <div class="sub-more-detail">
                                    <div class="img-more-detail">
                                        <img src="{{ $detail->icon_path }}" alt="">
                                    </div>
                                    <div class="text-more-detail">
                                        <h2>{{ $detail->name }}</h2>
                                        <p>{{ strip_tags($detail->desc) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>



                <div class="slider-services mr-section">
                    <div class="title-center">
                        <h3>{{ __('More services') }}</h3>
                        <h2>{{ $setting->{'services_title_' . app()->getLocale()} }}</h2>
                    </div>

                    <div class="owl-carousel owl-theme maincarousel" id="slider-news">
                        @forelse ($moreServices as $service)
                            <div class="item">
                                <a href="{{ route('site.service.show', $service->slug) }}">
                                    <div class="sub-services-index">
                                        <div class="text-services-index">
                                            <h2>{{ $service->name }}</h2>
                                            <p>
                                                {{ Str::limit(strip_tags($service->short_desc), 300) }}
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
                </div>



                <!-- start model order services -->
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="top-model-service">
                                <button class="close-service" data-dismiss="modal" aria-label="Close">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <div class="p-4">
                                <div class="title-center">
                                    <h3>{{ __('Request Service') }}</h3>
                                    <p>
                                        {{ $service->name }}
                                    </p>
                                </div>

                                <form action="{{ route('site.service.store') }}" method="POST" id="form-service">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-form">
                                                <input type="text" id="name" placeholder="{{ __('Full Name') }}"
                                                    class="form-control" name="name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-form">
                                                <input type="email" id placeholder="{{ __('Email Address') }}"
                                                    class="form-control" name="email" id="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-form">
                                                <input type="tel" id="phone" placeholder="{{ __('Phone number') }}"
                                                    class="form-control" name="phone">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="hidden"name='service_id' id='service_id' value='{{ $service->id }}'>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-form ">
                                                <textarea name="message" class="form-control" placeholder="{{ __('Additional Details') }}" id=""></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 text-center mt-3">
                                            <button class="ctm-btn2 ctm-btn-service"> <img src="{{ asset('site/images/n2.svg') }}"
                                                    alt="" /> {{ __('Send request') }} </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end model order services -->





            </div>
        </section>

    </main>

@endsection
@push('js')
    <script>
        $("#form-service").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2,
                    maxlength: 50,
                    noSpecialChars: true,
                    string: true,
                },
                email: {
                    required: true,
                    minlength: 3,
                    email: true,
                    maxlength: 50,
                },
                phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 15,
                    phone_type: true,
                },
                service_id: {
                    required: true
                },
                message: {
                    required: true,
                    minlength: 3,
                },
            },

            messages: {
                phone: {
                    minlength: window.phoneMinLengthMessage,
                    maxlength: window.phoneMaxLengthMessage,
                }
            },


            errorElement: "span",
            errorLabelContainer: ".errorTxt",
            errorClass: "text-danger small",
            highlight: function(element) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function(element) {
                $(element).removeClass("is-invalid");
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },

            submitHandler: function(form) {
                var formData = new FormData(form);
                let url = form.action;
                $('.ctm-btn-service').prop('disabled', true);
                // Hide the button
                $('.ctm-btn-service').hide();


                // Add a spinner
                $('.ctm-btn-service').parent().append(
                    `<div class="spinner-border"  style="width: 3rem;height: 3rem;margin: auto;/* padding: 24px; */display: flex;"   role="status">
                <span class="sr-only">Loading...</span>
                </div>
                    `
                );

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        form.reset();
                        Swal.fire({
                            icon: 'success',
                            title: `<h5>${data.success}</h5>`,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('.ctm-btn-service').prop('disabled', false);


                        // Show the button
                        $('.ctm-btn-service').show();

                        // Remove the spinner
                        $('.ctm-btn-service').next('.spinner-border')
                            .remove();
                    },
                    error: function(data) {
                        swal.fire({
                            icon: 'error',
                            title: `<h5>${data.responseJSON.error}</h5>`,
                            showConfirmButton: false,
                            timer: 4000
                        });
                        $('.ctm-btn-service').prop('disabled', false);


                        // Show the button
                        $('.ctm-btn-service').show();

                        // Remove the spinner
                        $('.ctm-btn-service').next('.spinner-border')
                            .remove();
                    },
                });
            },
        });
    </script>
@endpush
