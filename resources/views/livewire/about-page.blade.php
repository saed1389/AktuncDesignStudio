<div>
    <div class="content-wrapper">
        <section class="content-lines-wrapper">
            <div class="content-lines-inner">
                <div class="content-lines"></div>
            </div>
        </section>
        <section class="banner-header banner-img valign bg-img bg-fixed" data-overlay-light="0" data-background="{{ asset('assets/img/banner.jpg') }}">
            <div class="left-panel"></div>
        </section>
        <section class="about section-padding2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                        <h2 class="section-title">{{ __('lang.About us') }}</h2>
                        {!! app()->getLocale() == 'tr' ? $setting->about_us_tr : $setting->about_us_en !!}
                    </div>
                    <div class="col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                        <h2 class="section-title">{{ __('lang.Mission') }}</h2>
                        {!! app()->getLocale() == 'tr' ? $setting->mission_tr : $setting->mission_en !!}
                    </div>
                    <div class="col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                        <h2 class="section-title">{{ __('lang.Vision') }}</h2>
                        {!! app()->getLocale() == 'tr' ? $setting->vision_tr : $setting->vision_en !!}
                    </div>
                </div>
            </div>
        </section>
        @livewire('partials.footer')
    </div>
</div>
