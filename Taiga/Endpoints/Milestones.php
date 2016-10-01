<?php

namespace Taiga\Endpoints;

use Taiga\Api;
use Taiga\Endpoint;

class Milestones extends Endpoint
{

    /**
     * Milestones Endpoint constructor.
     * @param Api $root
     */
    public function __construct(Api $root)
    {
        parent::__construct($root);
        $this->prefix = 'milestones';
    }

    /**
     * @return \stdClass
     */
    public function getList($params = [])
    {
        return json_decode($this->root->request('get', sprintf('/%s?%s', $this->prefix, http_build_query($params))));
    }

    /**
     * Get milestone
     *
     * @param $id
     * @return array
     */
    public function getById($id)
    {
        return $this->get($id);
    }

    /**
     * Create milestone
     *
     * @param $data
     * @return array
     */
    public function create($data)
    {
        return json_decode($this->root->request('post', sprintf('/%s?%s', $this->prefix, http_build_query($data))));
    }

    /**
     * Modify milestone
     *
     * @param $data
     * @return array
     */
    public function modify($id, $data)
    {
        return $this->put($id, $data);
    }

    /**
     * Modify partially a milestone
     *
     * @param $id
     * @param $data
     */
    public function modifyPartially($id, $data)
    {
        $this->patch($id, $data);
    }

    /**
     * Delete a milestone
     *
     * @param $id
     */
    public function delete($id)
    {
        $this->delete($id);
    }

    /**
     * Get a milestone stats
     *
     * @param $id
     * @return array
     */
    public function getStats($id)
    {
        return $this->get(sprintf('%s/stats', $id));
    }

    /**
     * Get milestone watchers
     *
     * @param $id
     * @return array
     */
    public function getWatchers($id)
    {
        return $this->get(sprintf('%s/watchers', $id));
    }

    /**
     * @param $id
     * @param $data
     */
    public function watch($id, $data)
    {
        $this->post(sprintf('%s/watch', $id), $data);
    }

    /**
     * @param $id
     * @param $data
     */
    public function unwatch($id, $data)
    {
        $this->post(sprintf('%s/unwatch', $id), $data);
    }
}

