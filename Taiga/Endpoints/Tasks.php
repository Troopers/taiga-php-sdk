<?php

namespace Taiga\Endpoints;

use Taiga\Api;
use Taiga\Endpoint;

class Tasks extends UserStories
{
    /**
     * Tasks Endpoint constructor.
     * @param Api $root
     */
    public function __construct(Api $root)
    {
        parent::__construct($root);
        $this->prefix = 'tasks';
    }
}

