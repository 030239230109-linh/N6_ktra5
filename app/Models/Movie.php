<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Movie extends Model
{
    protected $table = 'movie'; // Tên bảng trong SQL của bạn
    protected $primaryKey = 'id';
    public $timestamps = false; // File SQL của bạn không có created_at/updated_at mặc định

    protected $fillable = ['status', 'movie_name', 'movie_name_vn', 'overview'];

    // 1. Chỉ hiển thị các bộ phim có status bằng 1
    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('status', 1);
        });
    }
}