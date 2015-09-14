<?php

namespace QueueSqsEbWorker\Queue;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class EbWorkerQueueFactory implements FactoryInterface
{

    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator, $name = '', $requestedName = '')
    {
        $parentLocator    = $serviceLocator->getServiceLocator();
        $jobPluginManager = $parentLocator->get('SlmQueue\Job\JobPluginManager');

        return new EbWorkerQueue($requestedName, $jobPluginManager);
    }

}