<?php


namespace PitouFW\Entity;


use PitouFW\Core\Entity;
use PitouFW\Core\Redis;
use PitouFW\Core\Utils;
use PitouFW\Model\UserModel;

class User extends Entity {
    private string $jam_id = '';
    private string $email = '';
    private string $fullname = '';
    private string $picture = '';
    private ?string $reg_timestamp = null;

    /**
     * @return string
     */
    public static function getTableName(): string {
        return 'user';
    }

    /**
     * @return string
     */
    public function getJamId(): string {
        return $this->jam_id;
    }

    /**
     * @param string $jam_id
     * @return User
     */
    public function setJamId(string $jam_id): User {
        $this->jam_id = $jam_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullname(): string {
        return $this->fullname;
    }

    /**
     * @param string $fullname
     * @return User
     */
    public function setFullname(string $fullname): User {
        $this->fullname = $fullname;
        return $this;
    }

    /**
     * @return string
     */
    public function getPicture(): string {
        return $this->picture;
    }

    /**
     * @param string $picture
     * @return User
     */
    public function setPicture(string $picture): User {
        $this->picture = $picture;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRegTimestamp(): ?string {
        return $this->reg_timestamp;
    }

    /**
     * @param string|null $reg_timestamp
     * @return User
     */
    public function setRegTimestamp(?string $reg_timestamp): User {
        $this->reg_timestamp = $reg_timestamp;
        return $this;
    }

    /**
     * @param int $ttl
     * @return bool
     */
    public function login(int $ttl = UserModel::SESSION_CACHE_TTL_DEFAULT): bool {
        if (!self::exists('id', $this->getId())) {
            return false;
        }

        $session_token = UserModel::generateSessionToken();
        $redis = new Redis();
        $cache_key = UserModel::SESSION_CACHE_PREFIX . $session_token;
        $cookie_set = setcookie(UserModel::SESSION_COOKIE_NAME, $session_token, Utils::time() + $ttl, WEBROOT, PROD_HOST);
        $redis_set = $redis->set($cache_key, $this->getId(), $ttl);

        return $cookie_set && $redis_set;
    }
}
