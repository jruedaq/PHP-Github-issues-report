<?php


namespace jruedaq\GithubIssuesReport;


use Exception;

class PHPGithubIssuesReport
{
    /**
     * @param string $owner User or company username
     * @param string $repo Repository name
     * @param string $token Personal access token, get from {@link https://github.com/settings/tokens} with [repo] permission
     * @param string $title Title for new issue
     * @param string $body Body description for new issue
     * @return int Return created issue number
     * @throws Exception
     */
    public static function send(string $owner, string $repo, string $token, string $title, string $body): int
    {
        $url = "https://api.github.com/repos/$owner/$repo/issues?access_token=" . $token;

        $title = htmlspecialchars(stripslashes($title), ENT_QUOTES);
        $body = htmlspecialchars(stripslashes($body), ENT_QUOTES);

        $header = [
            'Content-type: application/x-www-form-urlencoded',
            'Authorization: token ' . $token,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'PHP');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"title\": \"$title\", \"body\": \"$body\"}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $decoded = json_decode($response, true);

        if (isset($decoded['message'])) {
            throw new Exception("Github return an error: {$decoded['message']}. Check your token permission or repository owner and name");
        }

        return $decoded['number'];
    }
}