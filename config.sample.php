<?php
// Set default timezone
if (function_exists('date_default_timezone_set'))
{
     date_default_timezone_set('America/New_York');
}

// Check for CLI request from production server
$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : NULL;
$hostname = isset($_SERVER['HOSTNAME']) ? $_SERVER['HOSTNAME'] : NULL;

if (
	(!is_null($hostname) && substr($hostname, 0, 3) == 'ip-') ||
	(!is_null($host) && strpos($host, '.local') === FALSE)
) {
	define('ENVIRONMENT', 'production'); // Default EC2 hostnames start with "ip-"
} else {
	$efine('ENVIRONMENT', 'development');
}

if (ENVIRONMENT == 'production') {
	define('USE_DATASIFT', TRUE);
	define('GEOCODING_SERVICE', 'INTERNAL'); // Can be GOOGLE or INTERNAL
	define('INTERNAL_GEOCODING_URL', 'http://127.0.0.1:8081/geocode.json?q=%s');

	// DataSift
	define('DATASIFT_USERNAME', '');
	define('DATASIFT_API_KEY', '');

	// Google API
	define('GOOGLE_API_KEY', '');

	// Twitter API
	define('TWITTER_CONSUMER_KEY', '');
	define('TWITTER_CONSUMER_SECRET', '');
	define('TWITTER_ACCESSTOKEN', '');
	define('TWITTER_ACCESSTOKEN_SECRET', '');

	// MySQL server
	define('MYSQL_HOST', 'localhost');
	define('MYSQL_USERNAME', 'electiondesk');
	define('MYSQL_DATABASE', 'electiondesk');
	define('MYSQL_PASSWORD', ')');

	// MongoDB server
	define('MONGODB_HOST', 'localhost');
	define('MONGODB_USERNAME', 'electiondesk');
	define('MONGODB_DATABASE', 'electiondesk');
	define('MONGODB_PASSWORD', '');
} else {
	define('USE_DATASIFT', FALSE);
	define('GEOCODING_SERVICE', 'GOOGLE'); // Can be GOOGLE or INTERNAL
	define('INTERNAL_GEOCODING_URL', '');

	// DataSift
	define('DATASIFT_USERNAME', '');
	define('DATASIFT_API_KEY', '');

	// Google API
	define('GOOGLE_API_KEY', '');

	// Twitter API
	define('TWITTER_CONSUMER_KEY', '');
	define('TWITTER_CONSUMER_SECRET', '');
	define('TWITTER_ACCESSTOKEN', '');
	define('TWITTER_ACCESSTOKEN_SECRET', '');

	// MySQL server
	define('MYSQL_HOST', 'localhost');
	define('MYSQL_USERNAME', 'electiondesk');
	define('MYSQL_DATABASE', 'electiondesk');
	define('MYSQL_PASSWORD', ')');

	// MongoDB server
	define('MONGODB_HOST', 'localhost');
	define('MONGODB_USERNAME', 'electiondesk');
	define('MONGODB_DATABASE', 'electiondesk');
	define('MONGODB_PASSWORD', '');
}