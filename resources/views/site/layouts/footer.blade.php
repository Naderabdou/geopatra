  <footer class="footer">
      <div class="main-container">
          <div class="element-footer">
              <ul>
                  <li><a href="/">{{ __('Home') }}</a></li>
                  <li><a href="{{ route('site.about') }}">{{ __('About us') }}</a></li>
                  <li><a href="{{ route('site.services.index') }}">{{ __('Services') }}</a></li>
                  <li><a href="{{ route('site.projects.index') }}">{{ __('Projects') }}</a></li>
                  <li><a href="{{ route('site.technologys.index') }}">{{ __('Technologys') }}</a></li>
                  <li><a href="{{ route('site.blogs.index') }}">{{ __('News') }}</a></li>
                  <li><a href="{{ route('site.contact.index') }}">{{ __('Contact us') }}</a></li>
              </ul>
          </div>
          <h2>{{ __('Stay Connected') }}</h2>
          <div class="form-newsletter">
              <form action="">
                  <input type="text" placeholder="{{ __('Email Address') }}" class="form-control"
                      name="newsletter" />
                  <button><img src="{{ asset('site/images/n2.svg') }}" alt="" />
                      {{ __('Subscribe') }}</button>
              </form>
          </div>
          <div class="end-page">
              <a href="">
                  <span> By : </span>
                  <img src="{{ asset('site/images/logo-route-w.svg') }}" alt="" />
              </a>
              <p>{{ __('كل الحقوق محفوظة') }} {{ $setting->{'site_name_' . app()->getLocale()} }} &copy;

                  {{ date('Y') }}
              </p>
              <div class="media-footer">
                  <ul>
                      <li>
                          <a href="{{ $setting->linkedin }}"><i class="fab fa-linkedin-in"></i>
                              {{ __('Linkedin') }}</a>
                      </li>
                      <li>
                          <a href="{{ $setting->instagram }}"><i class="fab fa-instagram"></i>
                              {{ __('Instagram') }}</a>
                      </li>
                      <li>
                          <a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i>
                              {{ __('Facebook') }}</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </footer>
  <div class="bg_menu"></div>
  <div class="menu_responsive" id="menu-div">
      <div class="logo-menu">
          <img src="{{ asset('storage/' . $setting->logo) }}" alt="" />
      </div>
      <div class="search-mune"></div>
      <div class="element_menu_responsive">
          <ul>
              <li>
                  <a href="/">{{ __('Home') }}</a>
              </li>

              <li>
                  <a href="{{ route('site.about') }}">{{ __('About us') }}</a>
              </li>

              <li>
                  <a href="{{ route('site.services.index') }}">{{ __('Services') }}</a>
              </li>

              <li>
                  <a href="{{ route('site.technologys.index') }}">{{ __('Technologys') }}</a>
              </li>
              <li>
                  <a href="{{ route('site.projects.index') }}">{{ __('Projects') }}</a>
              </li>

              <li>
                  <a href="{{ route('site.blogs.index') }}">{{ __('News') }}</a>
              </li>
              <li>
                  <a href="{{ route('site.contact.index') }}">{{ __('Contact us') }}</a>
              </li>
              <li>
                  <a data-toggle="modal" data-target=".join-us" class='join-ele' href="">{{ __('Join now') }}</a>
              </li>
          </ul>
      </div>

      <div class="remove-mune">
          <span></span>
      </div>
  </div>
  </div>
  <div class="modal fade join-us" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">

              <div class="top-model-service">
                  <button class="close-service" data-dismiss="modal" aria-label="Close">
                      <i class="bi bi-x-lg"></i>
                  </button>
              </div>
              <div class="p-4">
                  <div class="title-center">
                      <h3>{{ __('Join Our Team') }}</h3>
                      <p>{{ __('Submit your application and take the next step in your career with us.') }}</p>
                  </div>

                  <form action="{{ route('site.join.store') }}" method="post" id="join_form">
                      @csrf
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="input-form">
                                  <input type="text" placeholder="{{ __('Full Name') }}" class="form-control"
                                      name="name" id="name">
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="input-form">
                                  <input type="text" placeholder="{{ __('Email') }}" class="form-control"
                                      name="email" id="email">
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="input-form">
                                  <input type="text" placeholder="{{ __('Phone number') }}" class="form-control"
                                      id="phone" name="phone">
                              </div>
                          </div>
                          {{-- <div class="col-lg-6">
                              <div class="input-form ">
                                  <input type="text" placeholder="{{ __('Job title') }}" class="form-control"
                                      id="position" name="position">

                              </div>
                          </div> --}}
                          <div class="col-lg-6">
                              <div class="input-form ">
                                  <select name="career_id" id="career_id" class="form-control">
                                      @foreach ($careers as $career)
                                          <option value="{{ $career->id }}">{{ $career->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>




                          <div class="col-lg-6">
                              <div class="input-form upload-flie">
                                  <input type="file" placeholder="{{ __('Resume') }}" id="resume"
                                      class="form-control" name="cv" accept=".pdf,.doc,.docx">
                                  <label for="resume" class="form-control"
                                      accept=".pdf,.doc,.docx">{{ __('Upload Resume') }}</label>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="input-form">
                                  <input type="text" placeholder="{{ __('LinkedIn Profile') }}"
                                      class="form-control" name="linkedin">
                              </div>
                          </div>
                          <div class="col-lg-12">
                              <div class="input-form ">
                                  <textarea name="message" class="form-control" placeholder="{{ __('Additional Details') }}" id=""></textarea>
                              </div>
                          </div>

                          <div class="col-lg-12 text-center mt-3">
                              <button class="ctm-btn2 ctm-join"> <img src="{{ asset('site/images/n2.svg') }}"
                                      alt="" /> {{ __('Send request') }} </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  @include('site.layouts.script')
  </body>
  <!-- end-body
    =================== -->

  </html>
