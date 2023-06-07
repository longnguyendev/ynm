<?php
class CartModel extends Model
{
    public function getCarts()
    {
        $sql = parent::$connection->prepare('SELECT * FROM cart');
        $items = [];
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getCartByIdUser($id_user)
    {
        $sql = parent::$connection->prepare("SELECT * FROM cart WHERE id_user = {$id_user}");
        $items = [];
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items[0];
    }

    public function createCart($id_user, $id_product)
    {
        $sql = parent::$connection->prepare("INSERT INTO cart VALUES ('$id_user', '$id_product')");
        parent::action($sql);
    }
}
