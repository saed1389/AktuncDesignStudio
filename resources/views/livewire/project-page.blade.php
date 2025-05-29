<div>
    <div class="content-wrapper">
        <section class="content-lines-wrapper">
            <div class="content-lines-inner">
                <div class="content-lines"></div>
            </div>
        </section>
        <section class="banner-header banner-img bg-img bg-fixed pb-0" data-background="{{ asset('assets/img/banner.jpg') }}" data-overlay-light="3">
            <div class="left-panel"></div>
        </section>
        <section class="section-padding2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="section-title">{{ app()->getLocale() == 'tr' ? $category->name_tr : $category->name_en }} {{ __('lang.Projects') }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="bauen-gallery-filter">
                            <li class="active" data-filter="*">{{ __('lang.All') }}</li>
                            @foreach($subCategories as $item)
                                <li data-filter=".{{ $item->slug }}">{{ app()->getLocale() == 'tr' ? $item->name_tr : $item->name_en }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row bauen-gallery-items">
                    @foreach($projects as $project)
                        <div class="col-md-6 gallery-masonry-wrapper single-item {{ $project->subCategory->slug }}">
                            @php
                                $images = is_array($project->images) ? $project->images : [];
                                $firstImage = $images[0] ?? null;
                            @endphp
                            @if($firstImage)
                                <a href="{{ route('project-detail', $project->slug) }}" title="{{ app()->getLocale() == 'tr' ? $project->name_tr : $project->name_en }}" class="gallery-masonry-item-img-link img-zoom">
                                    <div class="gallery-box">
                                        <div class="gallery-img">
                                            <img src="{{ asset($firstImage) }}" class="img-fluid mx-auto d-block lazy" loading="lazy" alt="{{ app()->getLocale() == 'tr' ? $project->name_tr : $project->name_en }}">
                                        </div>
                                        <div class="gallery-masonry-item-img"></div>
                                        <div class="gallery-masonry-item-content">
                                            <h4 class="gallery-masonry-item-title">{{ app()->getLocale() == 'tr' ? $project->name_tr : $project->name_en }}</h4>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @livewire('partials.footer')
    </div>
</div>
