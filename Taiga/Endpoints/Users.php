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
     * List users
     *
     * @param array $params
     *
     * @return \stdClass
     */
    public function getList($params = [])
    {
        return json_decode($this->root->request('get', sprintf('/%s?%s', $this->prefix, http_build_query($params))));
    }

    /**
     * Get user by id
     *
     * @param $id
     * @return array
     */
    public function getById($id)
    {
        return $this->get($id);
    }

    /**
     * @return \stdClass
     */
    public function getMe()
    {
        return $this->get('me');
    }
}

