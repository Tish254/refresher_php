<?php
include "Html.php";
use Html\Table as T;
$table = new T();
$table->title = "My table";
$table->numRows = 5;
$table->message();
