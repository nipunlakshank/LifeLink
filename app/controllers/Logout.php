<?php

/**
 * Logout controller
 */

class Logout extends Controller
{
    function index(): void
    {
        Auth::logout();
        redirect('login');
    }
}
