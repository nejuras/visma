<?php
require __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/src/Db.php';

use Visma\Registration\Form;

parse_str($argv[1], $_POST);

$Form = new Form($conn);
$Form->insert();
$Form->delete();
$Form->update();
