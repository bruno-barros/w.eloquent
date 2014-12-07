<?php

if (file_exists('../.env.local.php'))
{
	return require '../.env.local.php';
}
elseif (file_exists('../.env.php'))
{
	return require '../.env.php';
}
else
{
	throw new Exception("Define a .env file on your root folder.");
}
