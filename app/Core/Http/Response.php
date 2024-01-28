<?php
declare(strict_types=1);
namespace Core\Http;

class Response
{
    private static array $statusTexts = [
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        301 => 'Moved Permanently',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        500 => 'Internal Server Error',
    ];

    private string $content;
    private int $status;
    private array $headers;
    private string $charset = "UTF-8";
    private string $statusText;
    private string $version = '1.0';

    public function __construct(string $content = '', int $status = 200, array $headers = [])
    {
       $this->content = $content;
       $this->status = $status;
       $this->statusText = self::$statusTexts[$status] ?? 'unknown status';
       $this->headers = $headers;
    //    $this->charset = 'UTF-8';
    }


    public function getContent() : ?string
    {
        return $this->content;
    }
    public function getStatusCode() : int
    {
        return $this->status;
    }

    public function getHeaders() : array
    {
        return $this->headers;
    }

    public function getVersion() : string
    {
        return $this->version;
    }

    public function getStatusText() : string
    {
        return $this->statusText;
    }

    public function send(): void 
    {
        $httpLine = sprintf('HTTP/%s %s %s', 
            $this->getVersion(),
            $this->getStatusCode(),
            $this->getStatusText()
        );

        if (!headers_sent()) {
            header($httpLine, true, $this->getStatusCode());

            if(!array_key_exists("Content-Type", $this->headers)) {
                header('Content-Type: text/html; chaset = '.$this->charset);
            }

            foreach ($this->getHeaders() as $name => $value) {
                header("$name: $value", false);
            }
        }

        echo $this->getContent();
    }

    public static function redirect($location)
    {
        header('Location: http://'.$_SERVER['HTTP_HOST'].$location);
        exit();
    }

    public static function back()
    {
        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit();
    }


}