<?php
$pharFile = 'aws.phar';

if (file_exists($pharFile)) {
   unlink($pharFile);
}

if (file_exists($pharFile . '.gz')) {
   unlink($pharFile . '.gz');
}

$p = new Phar($pharFile);

$p->buildFromDirectory('aws/');

$p->setDefaultStub('aws-autoloader.php', '/aws-autoloader.php');

$p->compress(Phar::GZ);

unlink($pharFile . '.gz');

echo "$pharFile successfully created";
?>
