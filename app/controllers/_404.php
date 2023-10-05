<?php

/**
 * 404 - page not found
 */

class _404 extends Controller
{
    protected string $title = "Not Found";

    public function index(): void
    {
        $data['code'] = 404;
        $data['msg'] = "Not Found!";
        $this->view('errors/error', $data);
    }
}
