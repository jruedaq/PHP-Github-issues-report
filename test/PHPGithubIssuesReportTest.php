<?php

require '../vendor/autoload.php';

use jruedaq\GithubIssuesReport\PHPGithubIssuesReport;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertIsInt;

class PHPGithubIssuesReportTest extends TestCase
{
    public function testReport()
    {
        $report = PHPGithubIssuesReport::send(
            'Oneago',
            'CanvasVoteSystem',
            '870082df3998d104ba4164cb07217d5a734bb8fd',
            'TestIssue',
            'Description'
        );
        fwrite(STDERR, "Issue #$report created");
        assertIsInt($report, $report);
    }
}