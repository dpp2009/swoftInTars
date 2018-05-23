<?php
namespace App\Tasks;
use App\Lib\DemoInterface;
use App\Models\Entity\User;
use Swoft\App;
use Swoft\Bean\Annotation\Inject;
use Swoft\HttpClient\Client;
use Swoft\Redis\Redis;
use Swoft\Rpc\Client\Bean\Annotation\Reference;
use Swoft\Task\Bean\Annotation\Scheduled;
use Swoft\Task\Bean\Annotation\Task;

use App\Tars\Manage;

/**
 * TarsKeepAlive task
 *
 * @Task("tarsKeepAlive")
 */
class TarsKeepAliveTask
{

    /**
     *
     * @Scheduled(cron="*\/30 * * * * *")
     */
    public function cronkeepAliveTask()
    {

        $manage = new Manage();
        $manage->keepAlive();
        return 'cron';
    }
}
