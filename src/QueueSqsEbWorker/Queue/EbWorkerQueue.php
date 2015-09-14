<?php

namespace QueueSqsEbWorker\Queue;

use SlmQueue\Job\JobInterface;
use SlmQueue\Queue\AbstractQueue;


class EbWorkerQueue extends AbstractQueue
{
    /**
     * Push a new job into the queue
     *
     * @param  JobInterface $job
     * @param  array $options
     * @return void
     */
    public function push(JobInterface $job, array $options = array())
    {
        throw new \BadMethodCallException('Not Implemented.');
    }

    /**
     * Pop a job from the queue
     *
     * @param  array $options
     * @return JobInterface|null
     */
    public function pop(array $options = array())
    {
        throw new \BadMethodCallException('Not Implemented.');
    }

    /**
     * Delete a job from the queue
     *
     * @param  JobInterface $job
     * @return void
     */
    public function delete(JobInterface $job)
    {
        throw new \BadMethodCallException('Not Implemented.');
    }
}