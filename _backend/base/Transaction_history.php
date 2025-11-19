<?php 
namespace Tables;
use Classes\BaseTable;

class Transaction_history extends BaseTable {
    
    protected $table = "transaction_history";

    protected $fillable = [];

    protected $guarded = [];

    protected $hidden = [];

    protected $timestamps = false;
}
?>