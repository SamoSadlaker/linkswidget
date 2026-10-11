<?php

namespace SamoSadlaker\LinksWidget\Widgets;

use Statamic\Widgets\Widget;

class LinksWidget extends Widget
{
    /**
     * The HTML that should be shown in the widget.
     *
     * @return \Illuminate\View\View
     */
    public function html()
    {
        $links = collect($this->links())
            ->map(fn ($link) => $this->normalizeLink($link))
            ->filter()
            ->values();

        return view('linkswidget::widgets.linkswidget', [
            'title' => $this->config('title', __('linkswidget::messages.quick_links')),
            'description' => $this->config('description'),
            'links' => $links,
        ]);
    }

    /**
     * Get the configured links from the Statamic config file.
     *
     * @return array<int, mixed>
     */
    private function links(): array
    {
        $links = config('statamic.linkswidget.links');

        return is_array($links) ? $links : [];
    }

    /**
     * Normalize a single config entry into something safe to render.
     *
     * @return array<string, mixed>|null
     */
    private function normalizeLink($link): ?array
    {
        if (! is_array($link)) {
            return null;
        }

        $title = trim((string) ($link['title'] ?? ''));

        if ($title === '') {
            return null;
        }

        $url = trim((string) ($link['url'] ?? ''));

        return [
            'title' => $title,
            'url' => $url === '' ? '#' : $url,
            'icon' => $this->normalizeIcon($link['icon'] ?? null),
            'new_tab' => (bool) ($link['new_tab'] ?? true),
        ];
    }

    /**
     * Normalize an icon value into a Statamic SVG path.
     */
    private function normalizeIcon($icon): string
    {
        $icon = trim((string) $icon);

        // Legacy Boxicons classes (e.g. "bx bx-home") are not valid Statamic
        // icons, so fall back to a safe default. See the README for details.
        if ($icon === '' || str_contains($icon, ' ') || str_starts_with($icon, 'bx')) {
            return 'icons/link';
        }

        if (str_starts_with($icon, 'icons/')) {
            return $icon;
        }

        $sanitized = preg_replace('/[^a-z0-9\-_]/i', '', $icon) ?: 'link';

        return 'icons/'.$sanitized;
    }
}
