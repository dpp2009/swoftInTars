<?php


namespace App\Listener;

use Swoft\Bean\Annotation\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use Swoft\Task\Event\TaskEvent;
use Swoft\Event\AppEvent;

use App\Tars\Manage;
use Swoft\Memory\Table;


/**
 * Task finish handler
 *
 * @Listener(AppEvent::APPLICATION_LOADER)
 */
class APPStart implements EventHandlerInterface
{
    public static $num = 0;
    /**
     * @param \Swoft\Event\EventInterface $event
     */
    public function handle(EventInterface $event)
    {
        //服务启动  只上报一次 TODO

        $manage = new Manage();
        $manage->keepAlive();

    }
}