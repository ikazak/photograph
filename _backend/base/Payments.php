<?php 
namespace Tables;
use Classes\BaseTable;

class Payments extends BaseTable {
    
    protected $table = "payments";

    protected $fillable = [];

    protected $guarded = [];

    protected $hidden = [];

    protected $timestamps = false;
}
?>