<?php
class orderModel extends BaseModel
{
    const TableName = 'orders';

    public function createOrder($data)
    {
        $this->create(self::TableName, $data);
        return mysqli_insert_id($this->connect);
    }

    public function getOrderbyCustomer($id)
    {
        $sql = "SELECT orders.ID FROM orders, customers WHERE orders.CustomerID = customers.ID AND orders.CustomerID = ${id}";
        return $this->querySql($sql);
    }
}
