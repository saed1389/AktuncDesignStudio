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
        <section class="team section-padding2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section-title">{{ __('lang.Our Team') }}</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($teams as $team)
                        <div class="col-md-{{ $loop->first ? '6' : '4' }} {{ $loop->first ? 'd-flex justify-content-center' : '' }}">
                            <div class="item">
                                <div style="width:{{ $loop->first ? '350px' : '100%' }}; height: 466px; background-size: cover; background-image: url('{{ asset($team->image) }}'); background-position: center center"></div>
                                <div class="info text-center">
                                    <h6>{{ $team->name }}</h6>
                                    <p>{{ $team->position }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @livewire('partials.footer')
    </div>
</div>
