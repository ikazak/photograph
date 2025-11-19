<?php 
namespace Tables;
use Classes\BaseTable;

class Bookings extends BaseTable {
    
    protected $table = "bookings";

    protected $fillable = [];

    protected $guarded = [];

    protected $hidden = [];

    protected $timestamps = false;
}
?>