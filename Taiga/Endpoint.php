<?php

namespace Taiga;


abstract class Endpoint
{
    const PREFIX = '';
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
    protected function get($url)
    {
        return $this->root->request('get', sprintf('%s/%s', self::PREFIX, $url));
    }

    /**
     * @param $url
     * @param array $data
     * @return array
     */
    protected function post($url, array $data)
    {
        return $this->root->request('post', sprintf('%s/%s', self::PREFIX, $url), $data);
    }

    /**
     * @param $url
     * @param array $data
     * @return array
     */
    public function put($url, array $data)
    {
        return $this->root->request('put', sprintf('%s/%s', self::PREFIX, $url), $data);
    }

    /**
     * @param $url
     * @param array $data
     * @return array
     */
    protected function patch($url, array $data)
    {
        return $this->root->request('patch', sprintf('%s/%s', self::PREFIX, $url), $data);
    }

    /**
     * @param $id
     * @return array
     */
    public function delete($id)
    {
        return $this->root->request('delete', sprintf('%s/%s', self::PREFIX, $id));
    }
}