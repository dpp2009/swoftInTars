<?php


namespace App\Tars;

use \Tars\report\ServerFSync;
use \Tars\report\ServerFAsync;
use \Tars\report\ServerInfo;
use \Tars\Utils;

/**
 *
 */
class Manage
{

    public function getNodeInfo(){
        $conf = $this->getTarsConf();
        if( !empty($conf) ){
            $node = $conf['tars']['application']['server']['node'];
            $nodeInfo = Utils::parseNodeInfo($node);
            return $nodeInfo;
        }else{
            return [];
        }
    }

    public function getTarsConf(){
        $tars_conf = dirname(BASE_PATH,2).'/conf/'.env('PNAME').'.config.conf';

        if( is_file($tars_conf) ){
            $conf = Utils::parseFile($tars_conf);
            return $conf;
        }else{
            var_dump('get tars_conf file error : '.$tars_conf);
            return [];
        }
    }

    public function keepAlive()
    {
        $pname = env('PNAME');
        $pname = explode('.',$pname);

        $adapter = $pname.'.objAdapter';
        $application = $pname[0];
        $serverName = $pname[1];
        $masterPid = getmypid();

        $nodeInfo = $this->getNodeInfo();
        if( empty($nodeInfo) ){
            var_dump('keepAlive getNodeInfo fail');
            return null;
        }
        $host = $nodeInfo['host'];
        $port = $nodeInfo['port'];
        $objName = $nodeInfo['objName'];

        $serverInfo = new ServerInfo();
        $serverInfo->adapter = $adapter;
        $serverInfo->application = $application;
        $serverInfo->serverName = $serverName;
        $serverInfo->pid = $masterPid;

        $serverF = new ServerFSync($host, $port, $objName);
        $serverF->keepAlive($serverInfo);

        $adminServerInfo = new ServerInfo();
        $adminServerInfo->adapter = 'AdminAdapter';
        $adminServerInfo->application = $application;
        $adminServerInfo->serverName = $serverName;
        $adminServerInfo->pid = $masterPid;
        $serverF->keepAlive($adminServerInfo);

        var_dump(' keepalive ');
    }
}