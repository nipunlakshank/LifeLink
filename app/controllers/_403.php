<?php

/**
 *  403 - Access Forbidden
 */

class _403 extends Controller
{
    protected string $title = "Forbidden";

    public function index(): void
    {
        $data['code'] = 403;
        $data['msg'] = "Access Forbidden!";
        $this->view('errors/error', $data);
    }
}
