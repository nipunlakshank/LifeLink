<?php

/**
 * Service Controller
 */

class Service extends Controller
{
    protected string $title = "Service";

    public function index(): void
    {
        $this->view('service');
    }
}
