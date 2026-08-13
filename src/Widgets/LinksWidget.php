<?php

namespace SamoSadlaker\Linkswidget\Widgets;

use Statamic\Widgets\Widget;

class LinksWidget extends Widget
{
    public function html()
    {
        $links = collect(config('statamic.links.links') ?? [])
            ->map(function ($link) {
                $title = is_array($link) ? (string) ($link['title'] ?? '') : '';
                $url = is_array($link) ? (string) ($link['url'] ?? '#') : '#';
                $icon = is_array($link) ? $this->normalizeIcon($link['icon'] ?? 'link') : 'icons/link';
                $newTab = is_array($link) ? (bool) ($link['new_tab'] ?? true) : true;

                if ($title === '') {
                    return null;
                }

                return [
                    'title' => $title,
                    'url' => $url === '' ? '#' : $url,
                    'icon' => $icon,
                    'new_tab' => $newTab,
                ];
            })
            ->filter()
            ->values();

        return view('linkswidget::widgets.linkswidget', [
            'title' => $this->config('title', 'Quick Links'),
            'links' => $links,
        ]);
    }

    private function normalizeIcon($icon): string
    {
        $icon = trim((string) $icon);

        if ($icon === '') {
            return 'icons/link';
        }

        // Backward compatibility for old Boxicons class values.
        if (str_contains($icon, ' ') || str_starts_with($icon, 'bx')) {
            return 'icons/link';
        }

        if (str_starts_with($icon, 'icons/')) {
            return $icon;
        }

        $sanitized = preg_replace('/[^a-z0-9\-_\/]/i', '', $icon) ?: 'link';

        return 'icons/' . $sanitized;
    }
}
