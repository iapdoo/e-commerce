<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table='files';
    protected $fillable=[
            'name',
            'size',
            'file',
            'path',
            'full_file',
            'mime_type',
            'file_type', // file type news product
            'relation_id',
    ];
}
