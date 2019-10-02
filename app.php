#!/usr/bin/env php
<?php


require_once 'vendor/autoload.php';

use App\Command\ApplicationCommand;
use Symfony\Component\Console\Application;

$app = new Application('Console App', 'v1.0.0');
$app -> add(new ApplicationCommand());
$app -> run();
