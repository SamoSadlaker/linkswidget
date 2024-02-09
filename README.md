# Linkswidget
Just simple widgets that will display quick links in statamic dashboard.

## Features
- Easy & simple
- Lightweight

## How to Install

You can search for this addon in the `Tools > Addons` section of the Statamic control panel and click **install**, or run the following command from your project root:

``` bash
composer require samosadlaker/linkswidget
```

## How to Use
To add the widget to the dashboard, add the following entry to the widgets array in config/statamic/cp.php:
```php
[
    'type' => 'links',
    'width' => 100,
],
```

## How to customize it
Just run this command
```bash
php artisan vendor:publish --tag=samosadlaker-linkswidget-config
```
Inside `config/statamic/links.php` you can add your links with icons.
It has a folowing strucutre: 
```php
[
  'icon' => 'bx-home',
  'title' => 'Home',
  'url' => '/'
]
```
I am using boxicons image library, so here you can search for icon names: https://boxicons.com/
If you want you can use another icons library by adding styles to statamic panel and just use class names.
