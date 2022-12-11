<?php
class CustomerModel extends BaseModel
{
    const TableName = 'customers';

    public function createCustomer($data)
    {
        return $this->create(self::TableName, $data);
    }
}
