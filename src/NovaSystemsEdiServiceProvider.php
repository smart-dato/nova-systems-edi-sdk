<?php

namespace SmartDato\NovaSystemsEdi;

use SmartDato\NovaSystemsEdi\Connectors\NovaSystemsEdiConnector;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class NovaSystemsEdiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('nova-systems-edi-sdk')
            ->hasConfigFile();
    }

    public function packageRegistered(): void
    {
        $this->app->singleton(NovaSystemsEdiConnector::class, function () {
            return new NovaSystemsEdiConnector;
        });
    }
}
