<?php

declare(strict_types=1);

namespace Ardenthq\ImageGalleryField;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Outl1ne\NovaTranslationsLoader\LoadsNovaTranslations;

class FieldServiceProvider extends ServiceProvider
{
    use LoadsNovaTranslations;

    public function boot(): void
    {
        $this->loadTranslations(__DIR__.'/../lang', 'nova-image-gallery-field', true);

        if ($this->app->runningInConsole()) {
            // Publish config
            $this->publishes([
                __DIR__.'/../config/' => config_path(),
            ], 'config');
        }

        Nova::serving(static function (ServingNova $event) {
            Nova::script('image-gallery-field', __DIR__.'/../dist/js/field.js');
            Nova::style('image-gallery-field', __DIR__.'/../dist/css/field.css');
        });
    }
}
