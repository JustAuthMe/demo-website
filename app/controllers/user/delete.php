<?php

use PitouFW\Core\Alert;
use PitouFW\Core\Router;
use PitouFW\Model\UserModel;

if (UserModel::isLogged()) {
    $user = UserModel::get();
    UserModel::logout();

    if ($user->getPicture() !== '' && file_exists(PUBLICROOT . $user->getPicture())) {
        unlink(PUBLICROOT . $user->getPicture());
    }
    $user->delete();

    Alert::success('Votre compte démo a correctement été supprimé.');
    Router::redirect();
}
