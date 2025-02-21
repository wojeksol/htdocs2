<?php
class connect extends mysqli
{
    public function __construct($db)
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        parent::__construct('localhost', 'root', '', $db);
    }
}