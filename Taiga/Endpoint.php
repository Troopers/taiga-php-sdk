<?php

namespace Taiga;


abstract class Endpoint
{
    protected $prefix;
    protected $root;

    /**
     * ApiProjects constructor.
     * @param Api $root
     */
    public function __construct(Api $root)
    {
        $this->root = $root;
    }

    /**
     * @param $url
     * @return array
     */
    protected function get($url, $params = [])
    {
        return json_decode($this->root->request('get', sprintf('/%s/%s?%s', $this->prefix, $url, http_build_query($params))));
    }

    /**
     * @param $url
     * @param array $data
     * @return array
     */
    protected function post($url, array $data, array $params = [])
    {
        return json_decode($this->root->request('post', sprintf('/%s/%s?%s', $this->prefix, $url, http_build_query($params)), $data));
    }

    /**
     * @param $url
     * @param array $data
     * @return array
     */
    public function put($url, array $data, array $params = [])
    {
        return json_decode($this->root->request('put', sprintf('/%s/%s?%s', $this->prefix, $url, http_build_query($params)), $data));
    }

    /**
     * @param $url
     * @param array $data
     * @return array
     */
    protected function patch($url, array $data, array $params = [])
    {
        return json_decode($this->root->request('patch', sprintf('/%s/%s?%s', $this->prefix, $url, http_build_query($params)), $data));
    }

    /**
     * @param $id
     * @return array
     */
    public function delete($id)
    {
        return json_decode($this->root->request('delete', sprintf('/%s/%s', $this->prefix, $id)));
    }
}