<?php

/**
 * Admin Controller
 */

class Admin extends Controller
{
    protected string $title = "Dashboard";

    public function index(): void
    {
        $this->view('admin/dashboard');
    }
}
