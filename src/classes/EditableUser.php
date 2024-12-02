<?php

class EditableUser extends User {
    public function editUser($userId, $newName = null, $newEmail = null) {
        // Найти пользователя по ID
        foreach ($this->users as &$user) {
            if ($user['id'] == $userId) {
                if ($newName !== null) {
                    $user['name'] = $newName;
                }
                if ($newEmail !== null) {
                    $user['email'] = $newEmail;
                }
                return;
            }
        }
        echo "User $userId not found.<BR>";
    }
}
?>