<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Phb extends Model
{
    protected $table = 'shop_goods';
    protected $pk     = 'id';
    protected $fillable = ['gname','gprice','gpic','gdesc','stock','tid'];
}
