<?php

$db_file = getcwd() . '/../sqlite.db';
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'sqlite:' . $db_file, // SQLite
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
