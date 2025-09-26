 <header class="header active">
     <div class="contect-header">
         <div class="main-container">
             <ul>
                 <li>
                     <a href="" target="_blank">
                         <img src="{{ asset('site/images/1.png') }}" alt="" />
                         {{ $setting->address }}
                     </a>
                 </li>
                 <li>
                     <a href="tell:{{ $setting->phone }}">
                         <img src="{{ asset('site/images/2.png') }}" alt="" />
                         {{ $setting->phone }}
                     </a>
                 </li>
                 <li>
                     <a href="mailto:{{ $setting->email }}">
                         <img src="{{ asset('site/images/3.png') }}" alt="" />
                         {{ $setting->email }}
                     </a>
                 </li>
             </ul>
         </div>
     </div>
     <!-- start top bar -->
     <div class="top-bar">
         <div class="main-container">
             <!-- start logo -->
             <div class="logo">
                 <a href="/">
                     <object data="{{ asset('storage/' . $setting->logo) }}" type="">
                         <img src="{{ asset('storage/' . $setting->logo) }}" alt="" />
                     </object>
                 </a>
             </div>
             <!-- end logo -->

             <!-- start menu -->
             <nav class="element">
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
                 </ul>
             </nav>
             <!-- end menu -->

             <!-- start btns-top-bar -->
             <div class="btns-top-bar">
                 <div class="lang">
                     <a href="{{ route('site.lang', 'ar') }}" class="{{ app()->getLocale() == 'ar' ? 'active' : '' }}">ع </a>
                     <a href="{{ route('site.lang', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">en</a>
                 </div>
                 <a data-toggle="modal" data-target=".join-us" href="" class="ctm-btn">{{ __('Join Us') }}</a>
                 <div class="menu-div">
                     <div class="content" id="times-ican">
                         <div title="Navigation menu" class="navicon" aria-label="Navigation">
                             <span class="navicon__item"></span>
                             <span class="navicon__item"></span>
                             <span class="navicon__item"></span>
                             <span class="navicon__item"></span>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- end btns-top-bar -->
         </div>
     </div>
     <!-- end top bar -->
 </header>
