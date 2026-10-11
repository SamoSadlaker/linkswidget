<?php

namespace SamoSadlaker\LinksWidget\Tests;

use SamoSadlaker\LinksWidget\Widgets\LinksWidget;

class LinksWidgetTest extends TestCase
{
    private function render(array $config = []): string
    {
        $widget = new LinksWidget;
        $widget->setConfig($config);

        return (string) $widget->html();
    }

    public function test_it_is_registered_as_a_widget(): void
    {
        $this->assertTrue(app('statamic.widgets')->has('links'));
    }

    public function test_it_renders_the_default_configured_links(): void
    {
        $html = $this->render();

        $this->assertStringContainsString('Home', $html);
        $this->assertStringContainsString('href="/"', $html);
    }

    public function test_it_uses_a_custom_title(): void
    {
        $html = $this->render(['title' => 'My Links']);

        $this->assertStringContainsString('title="My Links"', $html);
    }

    public function test_it_skips_links_without_a_title(): void
    {
        config()->set('statamic.linkswidget.links', [
            ['title' => '', 'url' => '/ignored'],
            ['title' => 'Kept', 'url' => '/kept'],
        ]);

        $html = $this->render();

        $this->assertStringNotContainsString('/ignored', $html);
        $this->assertStringContainsString('/kept', $html);
    }

    public function test_it_renders_the_empty_state_when_there_are_no_links(): void
    {
        config()->set('statamic.linkswidget.links', []);

        $html = $this->render();

        $this->assertStringContainsString(__('linkswidget::messages.no_links'), $html);
    }

    public function test_it_falls_back_when_an_icon_does_not_exist(): void
    {
        config()->set('statamic.linkswidget.links', [
            ['title' => 'Broken', 'url' => '/', 'icon' => 'definitely-not-an-icon'],
        ]);

        $html = $this->render();

        $this->assertStringContainsString('Broken', $html);
        $this->assertStringContainsString('<svg', $html);
    }

    public function test_it_falls_back_for_legacy_boxicon_values(): void
    {
        config()->set('statamic.linkswidget.links', [
            ['title' => 'Legacy', 'url' => '/', 'icon' => 'bx bx-home'],
        ]);

        $html = $this->render();

        $this->assertStringContainsString('Legacy', $html);
        $this->assertStringContainsString('<svg', $html);
    }
}
