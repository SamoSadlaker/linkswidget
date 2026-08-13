<?php

namespace SamoSadlaker\Linkswidget;

use Statamic\Providers\AddonServiceProvider;
use SamoSadlaker\Linkswidget\Widgets\LinksWidget;

class ServiceProvider extends AddonServiceProvider
{

    protected $vite = [
        'input' => [
            'resources/css/linkswidget.css',
        ],
        'publicDirectory' => 'resources/dist',
    ];

    protected $widgets = [
        LinksWidget::class,
    ];

    public function bootAddon()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'linkswidget');
        $this->mergeConfigFrom(__DIR__ . '/../config/links.php', 'statamic.links');

        $this->publishes([
            __DIR__ . '/../config/links.php' => config_path('statamic/links.php'),
        ], 'samosadlaker-linkswidget-config');
    }
}
