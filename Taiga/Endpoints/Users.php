<?php

namespace Taiga\Endpoints;

use Taiga\Api;
use Taiga\Endpoint;

class Users extends Endpoint
{

    /**
     * Users Endpoint constructor.
     * @param Api $root
     */
    public function __construct(Api $root)
    {
        parent::__construct($root);
        $this->prefix = 'users';
    }

    /**
     * @return \stdClass
     */
    public function getMe()
    {
        return $this->get('me');
    }
}

