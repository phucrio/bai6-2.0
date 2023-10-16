<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'category', 'don_vi','kich_thuoc', 'mau_sac','img','price','ghi_chu','danh_gia'];
}
