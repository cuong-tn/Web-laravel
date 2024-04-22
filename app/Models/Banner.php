<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
//    use HasFactory;
    public $timestamps=false;
    protected $fillable = ['banner_name','banner_desc','banner_status','image'];

    protected $primaryKey = 'banner_id';
    protected $table = 'banners';
}
