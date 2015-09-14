<?php

namespace QueueSqsEbWorker\Controller;

use QueueSqsEbWorker\Queue\EbWorkerQueue;
use SlmQueue\Job\JobInterface;
use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;

class QueueController extends AbstractActionController
{
    /**
     * @var EbWorkerQueue
     */
    protected $queue;

    /**
     * @return EbWorkerQueue
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * @param EbWorkerQueue $queue
     */
    public function setQueue($queue)
    {
        $this->queue = $queue;
    }

    /**
     * Overview
     *
     * @return Response
     */
    public function processAction()
    {
        $request = $this->getRequest();
        /* @var \Zend\Http\PhpEnvironment\Request $request */

        if (!$request->isPost()) {
            return $this->notFoundAction();
        }

        $content = $request->getContent();

        /*
         * Use SlmQueue to turn the message into a job.
         */
        $job = $this->queue->unserializeJob($content);

        /*
         * If we have a job, run it, and return 200 OK
         */
        if ($job instanceof JobInterface) {
            $job->execute();
            return new Response(); // 200 OK
        }

        $response = new Response();
        $response->setStatusCode(500);

        return $response;
    }


}
