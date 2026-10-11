# Linkswidget

A simple Control Panel dashboard widget for displaying quick links in Statamic.

Compatible with **Statamic 5** and **Statamic 6**.

## Features

- Lightweight, no JavaScript runtime required
- Fast access to your most-used links from the dashboard
- Uses native Statamic icons
- Fully configurable: title, description, icons, and new-tab behaviour
- Matches the Control Panel in both light and dark mode

## Requirements

- PHP 8.2 or newer
- Statamic 5 or 6 (`statamic/cms: ^5.0 || ^6.0`)

## How to Install

Search for **Linkswidget** in `Tools > Addons` in the Control Panel and click
**Install**, or install it with Composer from your project root:

```bash
composer require samosadlaker/linkswidget
```

The addon's compiled assets are published automatically after installation.

## How to Use

Add the widget to the `widgets` array in `config/statamic/cp.php`:

```php
'widgets' => [
    [
        'type' => 'links',
        'width' => 100,
    ],
],
```

## How to Configure

Publish the config file:

```bash
php artisan vendor:publish --tag=linkswidget-config
```

The config lives alongside Statamic's own config in
`config/statamic/linkswidget.php` (config key: `statamic.linkswidget`). Then edit
it:

```php
return [
    'links' => [
        [
            'icon' => 'home',
            'title' => 'Home',
            'url' => '/',
            'new_tab' => false,
        ],
        [
            'icon' => 'icons/book',
            'title' => 'Documentation',
            'url' => 'https://statamic.dev',
            'new_tab' => true,
        ],
    ],
];
```

### Link options

| Key       | Required | Description                                                             |
| --------- | -------- | ----------------------------------------------------------------------- |
| `title`   | yes      | The link label. Entries without a title are skipped.                    |
| `url`     | yes      | The link destination. Falls back to `#` when empty.                     |
| `icon`    | no       | A Statamic icon name. Defaults to a generic link icon.                  |
| `new_tab` | no       | Open in a new tab. Defaults to `true`.                                  |

### Widget options

You can also customise the widget itself in `config/statamic/cp.php`:

```php
[
    'type' => 'links',
    'title' => 'My Links',
    'description' => 'Everything you need, one click away.',
    'width' => 100,
],
```

## Icons

Use native Statamic icon names, for example `home`, `dashboard`, `folder`,
`user`, or a full path such as `icons/book`. A good place to browse the
available icons is the `vendor/statamic/cms/resources/svg/icons` directory.

Legacy [Boxicons](https://boxicons.com) class values (such as `bx bx-home`) are
no longer rendered directly. They fall back to the default link icon so older
configs keep working. Update them to native Statamic icon names for the best
result.

## Development

The Control Panel styles are built with Tailwind CSS and Vite:

```bash
npm install
npm run build
```

The build output is committed to `resources/dist` and published to
`public/vendor/linkswidget/build/` when the addon is installed.

## Testing

```bash
composer install
composer test
```

## Upgrading from 0.1

- The config file moved from `config/statamic/links.php` to
  `config/statamic/linkswidget.php` and the config key changed from
  `statamic.links` to `statamic.linkswidget`. Move your links into the new file.
  The old location is no longer read.
- The `vendor:publish` tag changed from `samosadlaker-linkswidget-config` to
  `linkswidget-config`.
- The PHP namespace changed from `SamoSadlaker\Linkswidget` to
  `SamoSadlaker\LinksWidget`.

## Support

- Email: dev@samosadlaker.eu
- Issues: https://github.com/SamoSadlaker/linkswidget/issues

## License

The MIT License (MIT). Please see the [License File](LICENSE.md) for more information.
