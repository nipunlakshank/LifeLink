<?php

/**
 * Home Controller
 */

class Home extends Controller
{
    protected string $title = "Home";

    public function index(): void
    {
        $members = $this->loadData();
        $data = ["members" =>  $members];
        $this->view('home', $data);
    }

    private function loadData(): array
    {
        return [];
    }
}
