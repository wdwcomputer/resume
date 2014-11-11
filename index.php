<?php
require_once 'Global.inc';

$d = new Database();
$d->readAllNames();

echo "<p>DONE.</p>";
