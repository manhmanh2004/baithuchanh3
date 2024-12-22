<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Đảm bảo khai báo các thuộc tính mà bạn muốn cho phép gán hàng loạt
    protected $fillable = [
        'title',
        'description',
        'long_description',
        'completed',
    ];
}
