<?php


namespace models;
require_once __DIR__ . '/../models/BaseModel.php';


class Book extends BaseModel
{
    protected static string $table = 'books';

    public static function category($categoryId)
    {
        return Category::find($categoryId);
    }
}