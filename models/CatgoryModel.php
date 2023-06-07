<?php
class CatgoryModel extends Model
{
    public function getAllCatgory()
    {
        $sql = parent::$connection->prepare('SELECT * FROM `category`');
        $items = [];
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function deleteCatgory($id)
    {
        $sql = parent::$connection->prepare("DELETE FROM `category` WHERE id = ?");
        $sql->bind_param("s", $id);
        return $sql->execute();
    }
    public function addCatgory($fullname)
    {
        $sql = parent::$connection->prepare("INSERT INTO `category` (`id`, `name`) VALUES (NULL, ?)");
        $sql->bind_param("s", $fullname);
        return $sql->execute();
    }
    public function getCatgoryByID($id)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `category` WHERE id = ?");
        $sql->bind_param("s", $id);
        $items = [];
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items[0];
    }
    public function updateCatgory($id, $fullname)
    {
        $sql = parent::$connection->prepare("UPDATE `category` set `name` = ? WHERE `id` = ?");
        $sql->bind_param("ss", $fullname, $id);
        return $sql->execute();
    }
}
