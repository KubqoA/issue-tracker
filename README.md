# issuetracker

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

##Work in progress, package not functional yet! Stay tuned in for updates

Easily create and publish issues from your Laravel app to your git repository hosted on supported platform. Provides an easy integration with issue trackers in Gitea, Gogs and Github.
Users can easily submit issues yo your issue tracker easily from within your app, and you can manage it inside your issue tracker.

## Requirements

- PHP 7.0+
- Laravel 5.5+

## Install

Package can be installed using composer
``` bash
$ composer require KubqoA/issuetracker
```
You don't need to register any service providers, the package uses Laravel's auto-discovery feature

After installation is finished publish the config and modify it to match your environment
````
php artisan vendor:publish --provider="KubqoA\IssueTracker\IssueTrackerServiceProvider" --tag=config
````

## Usage

``` php
$skeleton = new KubqoA\IssueTracker();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email arbetjakub@gmail.com instead of using the issue tracker.

## Credits

- [Jakub Arbet][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/KubqoA/issuetracker.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/KubqoA/issuetracker/master.svg?style=flat-square
[ico-styleci]: https://github.styleci.io/repos/137647384/shield?branch=master
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/KubqoA/issuetracker.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/KubqoA/issuetracker.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/KubqoA/issuetracker.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/KubqoA/issuetracker
[link-travis]: https://travis-ci.org/KubqoA/issuetracker
[link-styleci]: https://github.styleci.io/repos/137647384
[link-scrutinizer]: https://scrutinizer-ci.com/g/KubqoA/issuetracker/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/KubqoA/issuetracker
[link-downloads]: https://packagist.org/packages/KubqoA/issuetracker
[link-author]: https://github.com/KubqoA
[link-contributors]: ../../contributors
