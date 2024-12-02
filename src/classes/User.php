<?php
class User {
    protected $users;

    public function __construct() {
        $this->users = [
            ["id" => 1, "name" => "perdo_1", "email" => "bones_1@example.com"],
            ["id" => 2, "name" => "pedro_2", "email" => "bones_2@example.com"],
            ["id" => 3, "name" => "pedro_3", "email" => "bones_3@example.com"],
            ["id" => 4, "name" => "pedro_4", "email" => "bones_4@example.com"],
            ["id" => 5, "name" => "pedro_5", "email" => "bones_5@example.com"],
            
        ];
    }

    public function renderTable() {
        echo "UsersDate<BR>";
        foreach ($this->users as $user) {
            echo "{$user['id']}-{$user['name']}-{$user['email']}<BR>";
        }
    }
}
?>