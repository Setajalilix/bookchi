<?php


namespace models;


class Book extends BaseModel
{
    protected static string $table = 'books';

    public static function category($categoryId)
    {
        return Category::find($categoryId);
    }
}