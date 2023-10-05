<?php

/**
 * Contact Controller
 */


class Contact extends Controller
{
    protected string $title = "Contact Us";

    public function index(): void
    {
        $this->view('contact');
    }

    public function send(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $body = $this->template('contact_email', $data);
        $success = sendContactForm(from: $data['email'], name: $data['name'], subject: $data['subject'], message: $data['message'], body: $body);
        exit(json_encode(["success" => $success]));
    }

}
