<?php

class UserValidator
{

    private $data;
    private $errors = [];
    private static $fields = ['email', 'password'];

    public function __construct($post_data)
    {
        // var_dump($post_data);
        $this->data = $post_data;
    }

    public function validateForm()
    {

        $this->validateEmail();
        $this->validatePassword();

        return $this->errors;
    }

    private function validatePassword()
    {

        $val = trim($this->data['password']) ?? '';

        if (empty($val)) {
            $this->addError('password', 'password cannot be empty');
        } else {
            if (!preg_match('/^.{6,}$/', $val)) {
                $this->addError('password', "Password must be at least 6 characters long");
            }
        }
    }

    private function validateEmail()
    {
        // var_dump($this->data);

        $val = trim($this->data['email']) ?? '';

        if (empty($val)) {
            $this->addError('email', 'email cannot be empty');
        } else {
            if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'email must be a valid email address');
            }
        }
    }

    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}
