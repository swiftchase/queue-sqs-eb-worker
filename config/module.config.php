<?php

return array(
    'slm_queue' => array(
        'queue_manager' => [
            'factories' => [
                'eb-worker' => 'QueueSqsEbWorker\Queue\EbWorkerQueueFactory'
            ]
        ]
    ),
);
