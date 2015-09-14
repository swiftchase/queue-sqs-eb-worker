<?php
/**
 * Created by IntelliJ IDEA.
 * User: Marcus
 * Date: 9/13/2015
 * Time: 11:12 PM
 */

namespace QueueSqsEbWorker\Controller;


use QueueSqsEbWorker\Queue\EbWorkerQueue;
use SlmQueue\Queue\QueuePluginManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class QueueControllerFactory implements FactoryInterface
{

    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator, $name = '', $requestedName = '')
    {
        $parentLocator    = $serviceLocator->getServiceLocator();

        /*
         * Let's use SlmQueue and the custom S3EventQueue components to turn the message into a job.
         */
        $qpm = $parentLocator->get('SlmQueue\Queue\QueuePluginManager'); /* @var $qpm QueuePluginManager */
        $queue = $qpm->get('eb-worker'); /* @var $queue EbWorkerQueue */

        $controller = new QueueController();
        $controller->setQueue($queue);

        return $controller;
    }
}