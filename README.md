![GitHub repo size](https://img.shields.io/github/repo-size/jruedaq/PHP-Github-issues-report)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/jruedaq/PHP-Github-issues-report)
![Packagist Downloads](https://img.shields.io/packagist/dt/jruedaq/PHP-Github-issues-report)
![Packagist License](https://img.shields.io/packagist/l/jruedaq/PHP-Github-issues-report)
![Packagist Version](https://img.shields.io/packagist/v/jruedaq/PHP-Github-issues-report)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/jruedaq/PHP-Github-issues-report)
![GitHub issues](https://img.shields.io/github/issues/jruedaq/PHP-Github-issues-report)
![GitHub commit activity](https://img.shields.io/github/commit-activity/m/jruedaq/PHP-Github-issues-report)

# PHP Github Issues Report

## First steeps

## Installation

```shell script
composer require jruedaq/PHP-Github-issues-report
```

## Basic use

### Create Github personal access token

In Developer settings need create a [personal access token](https://github.com/settings/tokens/) and set repo permission

For private repositories use, set all repo permission

![Create Github token](https://i.imgur.com/RKTl7ml.png)

If need use only public repositories, set public_repo permission

![Create Github token](https://i.imgur.com/8j33WxW.png)
### Use library

In your php file call `autoload.php`

```php
require 'vendor/autoload.php';
```

Call the function and pass the respective parameters

```php
$issueNumber = PHPGithubIssuesReport::send($owner, $repo, $token, $title, $body);
```

Complete example

```php
<?php

use jruedaq\GithubIssuesReport\PHPGithubIssuesReport;

require_once '../vendor/autoload.php';

$owner = 'Oneago';                                                          // User or company username
$repo = 'CanvasVoteSystem';                                                 // Repository name
$token = '870082df3998d104ba4164cb07217d5a734bb8fd';                        // Personal access token, get from {@link https://github.com/settings/tokens} with [repo] permission
$title = 'Testing a issue reporting from PHP';                              // Title for new issue
$body = 'This is a description text bellow title in github issues';         // Body description for new issue

try {
    $issueNumber = PHPGithubIssuesReport::send($owner, $repo, $token, $title, $body);
    echo "Created issue #$issueNumber";  // Display issue number
} catch (Exception $e) {
    echo $e->getMessage();
}
```
