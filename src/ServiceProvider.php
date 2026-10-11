<?php

namespace SamoSadlaker\LinksWidget;

use SamoSadlaker\LinksWidget\Widgets\LinksWidget;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    /**
     * The Vite entry points and build directory for the addon's assets.
     *
     * @var array
     */
    protected $vite = [
        'input' => [
            'resources/css/linkswidget.css',
        ],
        'publicDirectory' => 'resources/dist',
    ];

    /**
     * The dashboard widgets provided by the addon.
     *
     * @var array
     */
    protected $widgets = [
        LinksWidget::class,
    ];

    /**
     * Merge and publish the addon config inside Statamic's config folder.
     *
     * The default base behaviour would publish to config/linkswidget.php, but
     * this addon keeps its config next to Statamic's own files so it is loaded
     * as "config/statamic/linkswidget.php" (config key: statamic.linkswidget).
     *
     * @return $this
     */
    protected function bootConfig()
    {
        $origin = __DIR__.'/../config/linkswidget.php';

        if (! file_exists($origin)) {
            return $this;
        }

        $this->mergeConfigFrom($origin, 'statamic.linkswidget');

        $this->publishes([
            $origin => config_path('statamic/linkswidget.php'),
        ], 'linkswidget-config');

        return $this;
    }
}
