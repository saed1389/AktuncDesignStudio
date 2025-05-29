<div>
    <div class="content-wrapper">
        <section class="content-lines-wrapper">
            <div class="content-lines-inner">
                <div class="content-lines"></div>
            </div>
        </section>
        <section class="banner-header banner-img valign bg-img bg-fixed" data-overlay-light="3" data-background="{{ asset('assets/img/banner.jpg') }}">
            <div class="left-panel"></div>
        </section>
        <section class="section-padding2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                        <h2 class="section-title">{{ __('lang.Contact us') }}</h2>
                    </div>
                </div>
                <div class="row mb-90">
                    <div class="col-md-4 mb-30 animate-box" data-animate-effect="fadeInUp">
                        <p><b>{{ __('lang.Address') }}</b></p>
                        <a target="_blank" href="https://goo.gl/maps/zugKrxxBVvr7nmab9"> <p> <p>{{ $setting->address }}</p></a>
                    </div>
                    <div class="col-md-4 mb-30 animate-box" data-animate-effect="fadeInUp">
                        <p><b>{{ __('lang.Contact Information') }}</b></p>
                        <p><b>Telefon :</b> <a href="tel:{{ $setting->phone1 }}">{{ $setting->phone1 }}</a></p>
                        <p><b>Telefon :</b> <a href="tel:{{ $setting->phone2 }}"> {{ $setting->phone2 }}</a></p>
                        <p><b>E-posta :</b> <a href="mailto:{{ $setting->email }}"><span class="__cf_email__">{{ $setting->email }}</span></a></p>
                        <p><b>E-posta :</b> <a href="mailto:mehmet.aktunc@aktuncdesignstudio.com">mehmet.aktunc@aktuncdesignstudio.com</a></p>
                        <p><b>E-posta :</b> <a href="mailto:cemal.aktunc@aktuncdesignstudio.com">cemal.aktunc@aktuncdesignstudio.com</a></p>

                        <div class="main-footer">
                            <div class="abot">
                                <div class="social-icon">
                                    <a target="_blank" href="{{ $setting->facebook_url }}"><i class="ti-facebook"></i></a>
                                    <a target="_blank" href="{{ $setting->twitter_url }}"><i class="ti-twitter"></i></a>
                                    <a target="_blank" href="{{ $setting->instagram_url }}"><i class="ti-instagram"></i></a>
                                    <a target="_blank" href="{{ $setting->linkedin_url }}"><i class="ti-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 animate-box fadeInUp animated" data-animate-effect="fadeInUp">
                        <p><b>{{ __('lang.Contact Form') }}</b></p>
                        <form action="https://aktuncdesignstudio.com/form-gonder" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                        {{ __('lang.Your message was sent successfully') }}.
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input name="name" type="text" placeholder="{{ __('lang.Name Surname') }}" required="">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input name="email" type="email" placeholder="{{ __('lang.Email') }}" required="">
                                </div>

                                <div class="col-md-12 form-group">
                                    <textarea name="message" cols="100" rows="5" placeholder="{{ __('lang.Message') }}" required=""></textarea>
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="submit" value="{{ __('lang.Send Form') }}"></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3260.472174489998!2d33.36410321588389!3d35.19470598031067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14de1723ef2422a1%3A0x1863da52c96c2b36!2zTWXFn2UgU2ssIEvDvMOnw7xrIEtheW1ha2zEsSA5OTAxMA!5e0!3m2!1str!2str!4v1604414345138!5m2!1str!2str" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </section>
        @livewire('partials.footer')
    </div>
</div>
