<?php

namespace App\Providers;

// use Illuminate\Support\Facades\DB;
use Illuminate\Support\HtmlString;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentView;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Contracts\View\View;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    // DB::connection()
    //   ->getDoctrineSchemaManager()
    //   ->getDatabasePlatform()
    //   ->registerDoctrineTypeMapping('enum', 'string');

    LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
        $switch
            ->locales(['hu','en']); // also accepts a closure
    });

    FilamentView::registerRenderHook(
        PanelsRenderHook::BODY_END,
        fn (): View => view('customFooter'),
    );

    FilamentView::registerRenderHook(
        PanelsRenderHook::SCRIPTS_AFTER,
        fn (): string => new HtmlString('
            <script>document.addEventListener("scroll-to-top", () => window.scrollTo(0,0))</script>
        '),
    );
  }
}
