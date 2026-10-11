<?php

namespace SamoSadlaker\LinksWidget\Tests;

use SamoSadlaker\LinksWidget\ServiceProvider;
use Statamic\Testing\AddonTestCase;

abstract class TestCase extends AddonTestCase
{
    protected string $addonServiceProvider = ServiceProvider::class;
}
