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



