# Linkswidget
Simple dashboard widget that displays quick links in the Statamic Control Panel.

Compatible with Statamic v5 and v6.

## Features
- Lightweight
- Fast dashboard navigation
- Native Statamic CP icons

## How to Install

You can search for this addon in the `Tools > Addons` section of the Statamic control panel and click **install**, or run the following command from your project root:

```bash
composer require samosadlaker/linkswidget
```

## How to Use
Add the widget to the `widgets` array in `config/statamic/cp.php`:

```php
[
    'type' => 'links',
    'width' => 100,
],
```

## How to Customize
Publish the config file:

```bash
php artisan vendor:publish --tag=samosadlaker-linkswidget-config
```

Then edit `config/statamic/links.php` and define links:

```php
[
  'icon' => 'home',
  'title' => 'Home',
  'url' => '/',
  'new_tab' => false,
]
```

## Icon Format

- Use native Statamic icon names (example: `home`, `folder`, `settings`).
- You can also pass a full icon path (example: `icons/home`).

## Migration Notes

- Older Boxicons classes (such as `bx bx-home`) are no longer rendered directly.
- Legacy icon values fall back to a safe default icon, so existing configs do not break the widget.
- Update your icon values to native Statamic icon names for best results.

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.