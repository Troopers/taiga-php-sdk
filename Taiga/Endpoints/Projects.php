<?php

namespace Taiga\Endpoints;

use Taiga\Api;
use Taiga\Endpoint;

class Projects extends Endpoint
{

    /**
     * Projects Endpoint constructor.
     * @param Api $root
     */
    public function __construct(Api $root)
    {
        parent::__construct($root);
        $this->prefix = 'projects';
    }

    /**
     * @params array $params
     * - member: member id
     * - members: member ids
     * - is_looking_for_people: the project is looking for new members
     * - is_featured: the project has been highlighted by the instance staff
     * - is_backlog_activated: backlog is active
     * - is_kanban_activated: kanban is active
     *
     * @return \stdClass[]
     */
    public function getList($params = [])
    {
        return json_decode($this->root->request('get', sprintf('/%s?%s', $this->prefix, http_build_query($params))));
    }

    /**
     * @param $id
     * @return array
     */
    public function getById($id)
    {
        return $this->get($id);
    }

    /**
     * @param $slug
     * @return array
     */
    public function getBySlug($slug)
    {
        return $this->get(sprintf('by_slug?slug=%s', $slug));
    }

    /**
     * @param $id
     * @return array
     */
    public function getProjectModulesConfiguration($id)
    {
        return $this->get(sprintf('%s/modules', $id));
    }

    /**
     * @param $id
     * @return array
     */
    public function getProjectStats($id)
    {
        return $this->get(sprintf('%s/stats', $id));
    }

    /**
     * @param $id
     * @return array
     */
    public function getProjectIssueStats($id)
    {
        return $this->get(sprintf('%s/issues_stats', $id));
    }

    /**
     * @param $id
     * @return array
     */
    public function getProjectIssueFiltersData($id)
    {
        return $this->get(sprintf('%s/issue_filters_data', $id));
    }

    /**
     * @param $id
     * @return array
     */
    public function getProjectTagsColors($id)
    {
        return $this->get(sprintf('%s/tags_colors', $id));
    }

    /**
     * @param $id
     * @return array
     */
    public function getFans($id)
    {
        return $this->get(sprintf('%s/fans', $id));
    }

    /**
     * @param $id
     * @return array
     */
    public function getWatchers($id)
    {
        return $this->get(sprintf('%s/watchers', $id));
    }

    /**
     * @param $data
     * @return array
     */
    public function create($data)
    {
        return json_decode($this->root->request('post', sprintf('/%s?%s', $this->prefix, http_build_query($data))));
    }

    /**
     * @param $id
     * @param $data
     */
    public function updateProjectsOrderForLoggedInUser($id, $data)
    {
        $this->post(sprintf('%s/bulk_update_order', $id), $data);
    }

    /**
     * @param $id
     * @param $data
     */
    public function like($id, $data)
    {
        $this->post(sprintf('%s/like', $id), $data);
    }

    /**
     * @param $id
     * @param $data
     */
    public function unlike($id, $data)
    {
        $this->post(sprintf('%s/unlike', $id), $data);
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

    /**
     * @param $id
     * @param $data
     */
    public function createTemplate($id, $data)
    {
        $this->post(sprintf('%s/create_template', $id), $data);
    }

    /**
     * @param $id
     * @param $data
     */
    public function leave($id, $data)
    {
        $this->post(sprintf('%s/leave', $id), $data);
    }

    /**
     * @param $id
     * @param $data
     */
    public function changeLogo($id, $data)
    {
        $this->post(sprintf('%s/change_logo', $id), $data);
    }

    /**
     * @param $id
     * @param $data
     */
    public function removeLogo($id, $data)
    {
        $this->post(sprintf('%s/remove_logo', $id), $data);
    }

    /**
     * @param $id
     * @param $data
     */
    public function modifyPartiallyAProject($id, $data)
    {
        $this->patch(sprintf('%s', $id), $data);
    }

    /**
     * @param $id
     * @param $data
     */
    public function modifyPartiallyAProjectModulesConfiguration($id, $data)
    {
        $this->patch(sprintf('%s/modules', $id), $data);
    }

    /**
     * @param $id
     * @param $data
     */
    public function modify($id, $data)
    {
        $this->put($id, $data);
    }
}

