<?php
require __DIR__ . '/vendor/autoload.php';
include  __DIR__ . '/src/Db.php';

use Visma\Registration\Form;


$Form = new Form($conn);
$Form->insert();



