<?php

use App\Livewire\AboutPage;
use App\Livewire\ContactPage;
use App\Livewire\HomePage;
use App\Livewire\ProjectDetailPage;
use App\Livewire\ProjectPage;
use App\Livewire\TeamPage;
use Illuminate\Support\Facades\Route;

Route::get('/change-locale/{locale}', function ($locale) {
    if (in_array($locale, ['tr', 'en'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
});

Route::get('/', HomePage::class);
Route::get('/hakkimizda', AboutPage::class)->name('about');
Route::get('/projeler/{slug}', ProjectPage::class)->name('projects');
Route::get('/proje-detay/{slug}', ProjectDetailPage::class)->name('project-detail');
Route::get('/proje-ekibi', TeamPage::class)->name('team');
Route::get('/iletisim', ContactPage::class)->name('contact');
