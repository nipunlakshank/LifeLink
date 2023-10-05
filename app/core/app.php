<?php

class App
{
    protected string $controller = '_404';
    protected string $method = 'index';
    public static string $page = 'Not Found';

    function __construct()
    {
        validate_session();
        $this->sanitizeRequest();
        $arr = $this->getParams();
        $filename = "app/controllers/" . ucfirst($arr[0]) . ".php";
        if (file_exists($filename)) {
            $this->controller = ucfirst(strtolower($arr[0]));
            self::$page = ucfirst(strtolower($arr[0]));
        }
        $filename = "app/controllers/" . $this->controller . ".php";
        require $filename;

        $myController = new $this->controller();
        $myMethod = $arr[1] ?? $this->method;

        if (method_exists($myController, strtolower($myMethod))) {
            $this->method = strtolower($myMethod);
            unset($arr[0]);
            unset($arr[1]);
            $arr = [...$arr];
        }

        call_user_func_array([$myController, $this->method], $arr);
    }

    private function getParams(): array
    {
        $url = $_GET['url'] ?? 'home';
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $arr = explode('/', $url);
        return $arr;
    }

    private function sanitizeRequest(): void
    {
        if (!empty($_GET['code']) && $_GET['code'] !== '200') {
            $code = $_GET['code'];
            $_GET['url'] = "_$code";
        }
    }
}
