<div>
    <nav class="navbar navbar-expand-lg">
        <div class="logo-wrapper valign">
            <div class="logo">
                <a href="/">
                    <img src="{{ asset($setting->logo)  }}" class="logo-img" alt="{{ $setting->site_name }}">
                </a>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="icon-bar"><i class="ti-line-double"></i></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="/">{{ __('lang.Home') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">{{ __('lang.About us') }}</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link " href="">{{ __('lang.Projects') }}</a>
                    @if($categories->count() > 0)
                        <ul class="dropdown-menu">
                            @foreach($categories as $category)
                                <li class="dropdown-item"><a href="">{{ app()->getLocale() == 'tr' ? $category->name_tr : $category->name_en }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
                <li class="nav-item"><a class="nav-link" href="/proje-ekibi">{{ __('lang.Project Team') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="/bize-ulasin">{{ __('lang.Contact us') }}</a></li>
                <li class="nav-item lang-flag" style="display: {{ app()->getLocale() == 'en' ? 'none' : 'block' }}"><a class="nav-link" href="{{ url('/change-locale/en') }}">EN</a></li>
                <li class="nav-item lang-flag" style="display: {{ app()->getLocale() == 'tr' ? 'none' : 'block' }}"><a class="nav-link" href="{{ url('/change-locale/tr') }}">TR</a></li>
                <li class="nav-item">
                    <button class="nav-link" style="background: transparent !important" data-toggle="modal" data-target="#exampleModalCenter">
                        <img class="search" src="{{ asset('assets/img/icons/search.png')  }}" alt="">
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</div>
