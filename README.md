# kitchen

Start project

docker-compose up -d

Add 2 lines of code to /wp-app/wp-config.php on line 111 or after define( 'WP_DEBUG', !!getenv_docker('WORDPRESS_DEBUG', '') );
define('WP_DEBUG_DISPLAY', filter_var(getenv('WP_DEBUG_DISPLAY'), FILTER_VALIDATE_BOOLEAN));
define('WP_DEBUG_LOG', getenv('WP_DEBUG_LOG'));