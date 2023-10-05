<?php

/**
 * Main Controller
 */

class Controller
{
    protected string $title;

    public function index(): void
    {
        exit;
    }

    protected function view(string $view, array $data = []): void
    {
        $filename = "app/views/" . $view . ".view.php";
        if (file_exists($filename)) {
            extract($data);
            require_once $filename;
        } else {
            echo "Could not find view: " . $filename;
        }
    }

    protected function template($template, $data = []): string
    {
        $result = file_get_contents(SERVER_ROOT . "/public/templates/$template.phtml");
        foreach ($data as $key=>$value) {
            $result = str_replace("{" . strtoupper($key) . "}", strval($value), $result);
        }
        return $result;
    }
}
