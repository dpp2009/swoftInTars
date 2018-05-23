<?php
// tars 平台然后文件

//读取tars conf配置

//处理合成 env文件

$args = $_SERVER['argv'];


$swoft_bin = dirname(__FILE__).'/bin/swoft ';
$arg_cmd = $args[2]=='start' ? 'start -d' : $args[2] ;

$cmd = "/data/env/runtime/php-7.1.7/bin/php " . $swoft_bin . $arg_cmd;

exec($cmd, $output, $r);









