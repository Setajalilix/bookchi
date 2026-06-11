<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

class OrderItem extends BaseModel
{
    protected static string $table = 'order_items';

}
