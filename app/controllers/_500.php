<?php

/**
 * 500 - Internal server error
 */

class _500 extends Controller
{
    protected string $title = "Internal Error";

    public function index(): void
    {
        $data['code'] = 500;
        $data['msg'] = "Internal server error!";
        $this->view('errors/error', $data);
    }
}
