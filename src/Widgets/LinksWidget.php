<?php
namespace SamoSadlaker\Linkswidget\Widgets;
use Statamic\Widgets\Widget;

class LinksWidget extends Widget
{
    public function html()
    {
        $links = config('statamic.links.links') ?? [];
        return view('linkswidget::linkswidget', compact('links'));
    }
}
