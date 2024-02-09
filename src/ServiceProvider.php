<?php

namespace SamoSadlaker\Linkswidget;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{

    protected $widgets = [
        \SamoSadlaker\Linkswidget\Widgets\LinksWidget::class
    ];
    public function bootAddon()
    {
        parent::boot();
        $this->loadViewsFrom(__DIR__.'/../resources', 'linkswidget');
        $this->mergeConfigFrom(__DIR__.'/../config/links.php', 'statamic.links');

        $this->publishes([
            __DIR__.'/../config/links.php' => config_path('statamic/links.php'),
        ], 'samosadlaker-linkswidget-config');


    }
}
