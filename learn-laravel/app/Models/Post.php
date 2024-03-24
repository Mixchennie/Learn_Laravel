<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // Quy ước table
    /**
     * Tên model:Post=>table;posts
     * Tên Model: ProductCategory: product_categories
     */
    // Quy ước khóa chính. mặc định laravel sẽ lấy field id làm khóa chính
    protected $primarykey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';
    public $timestamps = false;
    const CREATED_AT= 'create_at';
    const UPDATE_AT= 'update_at';

    protected $attributes = [
        'status' =>0
    ];

}
