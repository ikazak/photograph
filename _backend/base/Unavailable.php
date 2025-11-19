<?php 
    namespace Tables;
    use Classes\BaseTable;

    class Unavailable extends BaseTable{
        
        protected $table = "unavailable";

        protected $fillable = [];

        protected $guarded = [];

        protected $hidden = [];

        protected $timestamps = false;

    }
?>