<?php
 
require_once('rollbar.php');
 
class EchoLogger {
    public function log($level, $message) {
        echo "[Rollbar] $level $message\n";
    }
}
 
$config = array(
    'access_token' => '28dd1d28fc1c4ba3a9302fe85fd2f6e2',
    'environment' => 'test',
    'root' => '/home/deploy/www/php-sample',
    'logger' => new EchoLogger()
);
Rollbar::init($config);
 
try {
    throw new Exception("hello");
} catch (Exception $e) {
    Rollbar::report_exception($e);
}
 
?>
