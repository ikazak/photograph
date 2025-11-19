<?php 
namespace Tables;
use Classes\BaseTable;

class Users extends BaseTable {
    
    protected $table = "users";

    protected $fillable = [];

    protected $guarded = [];

    protected $hidden = [];

    protected $timestamps = false;
}
?>