<div>
    <footer class="main-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-30">
                    <div class="item fotcont">
                        <div class="fothead">
                            <h6><b>{{ __('lang.Phone') }}</b></h6>
                        </div>
                        <p><a href="tel:{{ $setting->phone1 }}">{{ $setting->phone1 }}</a></p>
                        <p><a href="tel:{{ $setting->phone2 }}">{{ $setting->phone2 }}</a></p>
                    </div>
                </div>
                <div class="col-md-4 mb-30">
                    <div class="item fotcont">
                        <div class="fothead">
                            <h6><b>{{ __('lang.Email') }}</b></h6>
                        </div>
                        <p><a href="mailto:{{ $setting->email }}"><span class="__cf_email__" >{{ $setting->email }}</span></a></p>
                        <p><a href="mailto:mehmet.aktunc@aktuncdesignstudio.com"><span class="__cf_email__" >mehmet.aktunc@aktuncdesignstudio.com</span></a></p>
                        <p><a href="mailto:cemal.aktunc@aktuncdesignstudio.com"><span class="__cf_email__" >cemal.aktunc@aktuncdesignstudio.com</span></a></p>
                    </div>
                </div>
                <div class="col-md-4 mb-30">
                    <div class="item fotcont">
                        <div class="fothead">
                            <h6><b>{{ __('lang.Address') }}</b></h6>
                        </div>
                        <p><a target="_blank" href="https://goo.gl/maps/zugKrxxBVvr7nmab9"><p>{{ $setting->address }}</p></a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-left">
                            <p>Copyright @ {{ date('Y') }} Aktunç Design Studio</p>
                        </div>
                    </div>
                    <div class="col-md-4 abot">
                        <div class="social-icon">
                            <a target="_blank" href="{{ $setting->facebook_url }}"><i class="ti-facebook"></i></a>
                            <a target="_blank" href="{{ $setting->instagram_url }}"><i class="ti-instagram"></i></a>
                            <a target="_blank" href="{{ $setting->twitter_url }}"><i class="ti-twitter"></i></a>
                            <a target="_blank" href="{{ $setting->linkedin_url }}"><i class="ti-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('lang.Search Project') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form >
                        <div class="form-group">
                            <input type="search" class="form-control" name="search" placeholder="{{ __('lang.Type the project you want to search here') }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('lang.Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('lang.Search') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
