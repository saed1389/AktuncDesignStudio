<div>
    <header class="header slider-fade">
        <div class="owl-carousel owl-theme">
            @foreach($sliders as $slider)
                <div class="text-right item bg-img" data-overlay-dark="6" data-background="{{ asset($slider->image) }}">
                    <div class="v-middle caption mt-30">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 offset-md-5">
                                    <h1>{{ app()->getLocale() == 'tr' ? $slider->name_tr : $slider->name_en  }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="hero-corner"></div>
        <div class="hero-corner3"></div>
        <div class="left-panel">
            <ul class="social-left clearfix">
                <li><a href="{{ $setting->linkedin_url }}" target="_blank"><i class="ti-linkedin"></i></a></li>
                <li><a href="{{ $setting->instagram_url }}" target="_blank"><i class="ti-instagram"></i></a></li>
                <li><a href="{{ $setting->twitter_url }}" target="_blank"><i class="ti-twitter"></i></a></li>
                <li><a href="{{ $setting->facebook_url }}" target="_blank"><i class="ti-facebook"></i></a></li>
            </ul>
        </div>
    </header>
    <div class="content-wrapper">
        <section class="content-lines-wrapper">
            <div class="content-lines-inner">
                <div class="content-lines"></div>
            </div>
        </section>
        @livewire('partials.footer')
    </div>
</div>
