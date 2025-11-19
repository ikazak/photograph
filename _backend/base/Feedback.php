<?php 
namespace Tables;
use Classes\BaseTable;

class Feedback extends BaseTable {
    
    protected $table = "feedback";

    protected $fillable = [];

    protected $guarded = [];

    protected $hidden = [];

    protected $timestamps = false;
}
?>