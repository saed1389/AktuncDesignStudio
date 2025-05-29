<div>
    <div class="content-wrapper">
        <section class="content-lines-wrapper">
            <div class="content-lines-inner">
                <div class="content-lines"></div>
            </div>
        </section>
        <section class="banner-header banner-img bg-img bg-fixed pb-0" data-background="{{ asset('assets/img/banner.jpg') }}" data-overlay-light="3" style="background-image: url({{ asset('assets/img/banner.jpg') }});height: 30vh">
            <div class="left-panel"></div>
        </section>
        <section class="project-page section-padding2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="section-title">{{ app()->getLocale() == 'tr' ? $project->name_tr : $project->name_en }} {{ __('lang.Project') }}</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme">
                            @foreach($project->images as $image)
                                <div class="portfolio-item"> <img class="img-fluid" src="{{ asset($image) }}" alt=""> </div>
                            @endforeach
                        </div>
                      <div class="row">
                              <div class="col-md-8 offset-md-4">
                                  <div class="project-bar">
                                      <div class="row justify-content-between align-items-center text-left text-lg-start">
                                          <div class="col-md-3 mb-2">
                                              <h5><b>{{ __('lang.Project Year') }}</b></h5>
                                              <h6>{{ $project->year ?? '-' }}</h6>
                                          </div>
                                          <div class="col-md-3 mb-2">
                                              <h5><b>{{ __('lang.Project Area') }}</b></h5>
                                              <h6>{{ $project->area ?? '-' }} m²</h6>
                                          </div>
                                          <div class="col-md-3 mb-2">
                                              <h5><b>{{ __('lang.Project Location') }}</b></h5>
                                              <h6>{{ app()->getLocale() == 'tr' ? $project->city->name_tr : $project->city->name_en }}</h6>
                                          </div>
                                          @if($project->customer_name)
                                              <div class="col-md-3 mb-2">
                                                  <h5><b>{{ __('lang.Project Customer') }}</b></h5>
                                                  <h6>{{ $project->customer_name }}</h6>
                                              </div>
                                          @endif
                                      </div>
                                  </div>
                              </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>
        @livewire('partials.footer')
    </div>
</div>
