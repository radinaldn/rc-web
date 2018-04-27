<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=real_count',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'T1e2k3n4i5k6',
	'charset' => 'utf8',
	
);