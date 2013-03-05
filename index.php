<?php
 
require_once('rollbar.php');
 
class EchoLogger {
    public function log($level, $message) {
        echo "<pre>[Rollbar] $level $message\n</pre>";
    }
}
 
$config = array(
    'access_token' => '28dd1d28fc1c4ba3a9302fe85fd2f6e2',
    'environment' => 'test',
    'root' => '/home/deploy/www/php-sample',
    'logger' => new EchoLogger(),
    'handler' => 'agent',
    'agent_log_location' => '/var/tmp'
);
Rollbar::init($config);

$foo = $bar;
$foo();

// test fatal error
require_once('lib.php');
 
try {
    throw new Exception("hello");
} catch (Exception $e) {
    Rollbar::report_exception($e);
}

$foo = $bar; 

?>
Hello.
