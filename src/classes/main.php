<?php
include './User.php';
include './EditableUser.php';

$user = new User();
$user->renderTable();

echo "<BR>";
$editableUser = new EditableUser();
$editableUser->renderTable();

$editableUser->editUser(1, "Lexx", "lexx.fuckYou@example.com");
$editableUser->editUser(2, "Serg", "serg.goToHell@example.com");
$editableUser->editUser(3, "NaN", "Error.render.code('098') Please check syntax in User.php line 24");
$editableUser->editUser(4, "null", "Error.render.code('415') Please check syntax in User.php line 24");
$editableUser->editUser(5, "undefined", "Error.render.code('378') Please check syntax in User.php line 24");

echo "<BR>";
$editableUser->renderTable();
?>