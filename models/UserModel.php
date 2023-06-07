<?php
class UserModel extends Model
{
    public function getUsers()
    {
        $sql = parent::$connection->prepare('SELECT * FROM user');
        $items = [];
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getUsersByID($id)
    {
        $sql = parent::$connection->prepare("SELECT * FROM user WHERE id = ?");
        $sql->bind_param("i", $id);
        $items = [];
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items[0];
    }

    public function getUsersByPhoneNumber($phone_number)
    {
        $sql = parent::$connection->prepare("SELECT * FROM user WHERE phone_number = ?");
        $sql->bind_param("i", $phone_number);
        $items = [];
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items[0];
    }

    public function login($username, $password)
    {
        $sql = parent::$connection->prepare("SELECT * FROM user where phone_number = ?");
        $sql->bind_param("s", $username);
        $sql->execute();
        $user = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];
        if ($user) {
            if (password_verify($password, $user['password'])) {
                unset($user['password']);
                return $user;
            }
        }
        return null;
    }

    public function createUser($name, $gender, $dob, $phoneNumber, $password)
    {
        $sql = parent::$connection->prepare("INSERT INTO user (id, name, gender, dob, phone_number, password, role, type) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");
        $role = 'user';
        $type = 'standard';
        $sql->bind_param("sssssss", $name, $gender, $dob, $phoneNumber, $password, $role, $type);
        if ($sql->execute()) {
            return self::login($phoneNumber, $password);
        }
        return null;
    }
    public function updateUser($id, $name, $gender, $dob, $phoneNumber)
    {
        $sql = parent::$connection->prepare("UPDATE user set name = ?, gender = ?, dob = ?, phone_number = ? WHERE id = ?");
        $sql->bind_param("sssss", $name, $gender, $dob, $phoneNumber, $id);
        return $sql->execute();
    }
    public function deleteUser($id)
    {
        $sql = parent::$connection->prepare("DELETE FROM user WHERE id = ?");
        $sql->bind_param("s", $id);
        return $sql->execute();
    }
}
