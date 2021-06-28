<?php

use PitouFW\Core\Alert;
use PitouFW\Core\Router;
use PitouFW\Core\Utils;
use PitouFW\Entity\User;
use PitouFW\Model\JustAuthMeFactory;
use PitouFW\Model\UserModel;

$jamSdk = JustAuthMeFactory::getSdk();

if (isset($_GET['access_token'])) {
    try {
        $response = $jamSdk->getUserInfos($_GET['access_token']);
    } catch (Exception $e) {
        Alert::error(L::jam_errors_unknown($e->getMessage()));
        Router::redirect();
    }

    if (User::exists('jam_id', $response->jam_id)) {
        // Login
        $user = User::readBy('jam_id', $response->jam_id);

        Alert::success(L::login_success);
        $user->login(UserModel::SESSION_CACHE_TTL_LONG);
    } else {
        if (isset($response->email)) {
            if (User::exists('email', $response->email)) {
                // Account linking
                $user = User::readBy('email', $response->email);
                $user->setJamId($response->jam_id);
                $user->save();
            } else {
                // Registration
                $user = new User();
                $user->setJamId($response->jam_id)
                    ->setEmail($response->email)
                    ->setFullname(trim(($response->firstname ?? '') . ' ' . ($response->lastname ?? '')));
                $uid = $user->save();
                $user = User::read($uid);

                if (isset($response->avatar)) {
                    $filetype = preg_replace("#^data\:image\/([a-z]+)\;.*$#", "$1", $response->avatar);
                    if (in_array($filetype, ['jpeg', 'jpg', 'png'])) {
                        $image = file_get_contents($response->avatar);
                        $filename = $user->getId() . substr(md5(uniqid()), 0, 8);
                        $filepath = 'uploads/' . $filename . '.' . $filetype;
                        file_put_contents(PUBLICROOT . $filepath, $image);

                        $user->setPicture($filepath)
                            ->save();
                    }
                }
            }

            Alert::success(L::login_success);
            $user->login(UserModel::SESSION_CACHE_TTL_LONG);
        } else {
            // The user need to remove the service from their JustAuthMe app and try again
            Alert::error(L::jam_errors_no_email(NAME));
        }
    }

    Router::redirect();
}
