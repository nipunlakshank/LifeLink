<?php

/**
 * User model
 */

class User extends Model
{
    protected array $errors;
    protected string $table = "users";
    protected array $insert_columns = [
        'fname',
        'lname',
        'mobile',
        'email',
        'password',
        'username',
        'img',
        'bio',
        'otp',
        'token',
        'points',
    ];
    protected array $select_columns = [
        'id',
        'fname',
        'lname',
        'mobile',
        'email',
        'password',
        'username',
        'img',
        'bio',
        'otp',
        'token',
        'points',
        'is_active',
        'created_at',
        'updated_at',
    ];

    public function validate($data): bool
    {

        if (empty($data) || empty($data['form'])) {
            return false;
        }

        switch ($data['form']) {
            case "login":
                $this->validateLogin($data);
                break;
            case "register":
                $this->validateRegister($data);
                break;
            default:
                return false;
        }

        if (empty($this->errors)) {
            return true;
        }
        return false;
    }


    private function validateRegister(array $data): void
    {
        $this->errors = [];

        if (empty($data['fname'])) {
            $this->errors['fname'] = "First Name is required";
        } else if (!preg_match("/^[a-zA-Z]+$/", $data['fname'])) {
            $this->errors['fname'] = "Invalid name";
        }

        if (empty($data['lname'])) {
            $this->errors['lname'] = "Last Name is required";
        } else if (!preg_match("/^[a-zA-Z]+$/", $data['lname'])) {
            $this->errors['lname'] = "Invalid name";
        }

        // Validate username
        if (empty($data['new_username'])) {
            $this->errors['new_username'] = "Username is required";
        } else if (!preg_match("/^[A-Za-z][A-Za-z0-9]{5,31}$/", $data['new_username'])) {
            $this->errors['new_username'] = "Invalid Username";
        } else if (!empty($this->select(['username' => $data['new_username']]))) {
            $this->errors['new_username'] = "Username already exists";
        }

        // Validate email
        if (empty($data['email'])) {
            $this->errors['email'] = "Email is required";
        } else if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Invalid Email";
        } else if (!empty($this->select(['email' => $data['email']]))) {
            $this->errors['email'] = "Email already exists";
        }

        // Validate password
        if (empty($data['new_password'])) {
            $this->errors['new_password'] = "Password is required";
        } else if (!preg_match("/[a-z]+/", $data['new_password'])) {
            $this->errors['new_password'] = "Should contain atleast one lowercase letter";
        } else if (!preg_match("/[A-Z]+/", $data['new_password'])) {
            $this->errors['new_password'] = "Should contain atleast one uppercase letter";
        } else if (!preg_match("/[0-9]+/", $data['new_password'])) {
            $this->errors['new_password'] = "Should contain atleast one digit";
        } else if (!preg_match("/[#?!@$%^&*-]+/", $data['new_password'])) {
            $this->errors['new_password'] = "Should contain atleast one special charactor";
        }else if(strlen($data["new_password"]) < 8){
            $this->errors['new_password'] = "Should contain atleast 8 digits";
        }

        if ($data['new_password'] !== $data['confirm_password']) {
            $this->errors['confirm_password'] = "Passwords do not match";
        }
    }


    private function validateLogin(array $data): void
    {
        $this->errors = [];

        if (empty($data['username'])) {
            $this->errors['username'] = "Username is empty";
        } else if (!preg_match("/^[A-Za-z][A-Za-z0-9]{5,31}$/", $data["username"])) {
            $this->errors['username'] = "Invalid Username";
        } else if (empty($this->selectOne(['username' => $data['username']]))) {
            $this->errors['username'] = "Wrong Username or Password";
            $this->errors['password'] = " ";
        }

        if (empty($data['password'])) {
            $this->errors['password'] = "Password is empty";
        }
    }

    protected function insert_hook(array $data): array
    {
        if (!empty($data['new_password']))
            $data['password'] = $data['new_password'];

        if (!empty($data['username']))
            $data['username'] = $data['username'];

        // Sanitizing data
        $data['fname'] = ucfirst(strtolower($data['fname']));
        $data['lname'] = ucfirst(strtolower($data['lname']));
        $data['username'] = filter_var($data['username'], FILTER_SANITIZE_EMAIL);
        // Password Hashing
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        return $data;
    }
}
