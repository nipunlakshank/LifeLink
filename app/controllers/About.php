<?php

/**
 * About Controller
 */

class About extends Controller
{
    protected string $title = "About";

    public function index(): void
    {
        $this->view('about');
    }
}
