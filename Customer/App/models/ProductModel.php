<?php
class ProductModel extends BaseModel
{
    const TableName = 'products';

    public function getProducts()
    {
        return $this->getAll(self::TableName);
    }

    public function getProduct($id)
    {
        return $this->find(self::TableName, $id);
    }

    public function getProductHot()
    {
        $sql = "SELECT * FROM products WHERE status = 1 AND Hot = 1 limit 4";
        return $this->querySql($sql);
    }

    public function productByCate($cateID)
    {
        $sql = "SELECT * FROM products WHERE products.CateID = ${cateID}";
        return $this->querySql($sql);
    }
}
