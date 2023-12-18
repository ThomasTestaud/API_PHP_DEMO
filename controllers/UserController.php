<?php

class UserController {
    public function getAllUsers() {
        return "Getting all users...";
    }

    public function getUserById($userId) {
        return "Getting user with ID: $userId";
    }

    public function createUser() {
        return "Creating a new user...";
    }
}

?>
