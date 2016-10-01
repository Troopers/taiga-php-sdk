<?php

namespace Taiga\Endpoints;

use Taiga\Api;
use Taiga\Endpoint;

class UserStories extends Endpoint
{

    /**
     * Milestones Endpoint constructor.
     * @param Api $root
     */
    public function __construct(Api $root)
    {
        parent::__construct($root);
        $this->prefix = 'userstories';
    }

    /**
     * @param array $params
     *
     * @return \stdClass
     */
    public function getList($params = [])
    {
        return json_decode($this->root->request('get', sprintf('/%s?%s', $this->prefix, http_build_query($params))));
    }

    /**
     * Get user story by ref
     *
     * @param $ref
     *
     * @return array
     */
    public function getByRef($ref)
    {
        return $this->get(sprintf('by_ref?ref=%s', $ref));
    }

    /**
     * Get user story by id
     *
     * @param $id
     * @return array
     */
    public function getById($id)
    {
        return $this->get($id);
    }

    /**
     * Create user story
     *
     * @param $data
     * @return array
     */
    public function create($data)
    {
        return json_decode($this->root->request('post', sprintf('/%s?%s', $this->prefix, http_build_query($data))));
    }

    /**
     * Modify user story
     *
     * @param $data
     *
     * @return array
     */
    public function modify($id, $data)
    {
        return $this->put($id, $data);
    }

    /**
     * Modify partially a user story
     *
     * @param $id
     * @param $data
     */
    public function modifyPartially($id, $data)
    {
        $this->patch($id, $data);
    }

    /**
     * Delete a user story
     *
     * @param $id
     *
     * @return null
     */
    public function delete($id)
    {
        $this->delete($id);
    }

    /**
     * Get user story watchers
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

    /**
     * Get user story voters
     *
     * @param $id
     * @return array
     */
    public function getVoters($id)
    {
        return $this->get(sprintf('%s/voters', $id));
    }

    /**
     * @param $id
     */
    public function upvote($id)
    {
        $this->post(sprintf('%s/upvote', $id), []);
    }

    /**
     * @param $id
     */
    public function downvote($id)
    {
        $this->post(sprintf('%s/downvote', $id), []);
    }

    /**
     * Create user stories un bulk mode
     *
     * @param $data
     */
    public function bulkCreate($data)
    {
        $this->post('bulk_create', $data);
    }

    /**
     * Update user stories order for backlog in bulk mode
     *
     * @param $data
     */
    public function bulkUpdateBacklogOrder($data)
    {
        $this->post('bulk_update_backlog_order', $data);
    }

    /**
     * Update user stories order for kanban in bulk mode
     *
     * @param $data
     */
    public function bulkUpdateKanbanOrder($data)
    {
        $this->post('bulk_update_kanban_order', $data);
    }

    /**
     * Update user stories order for sprint in bulk mode
     *
     * @param $data
     */
    public function bulkUpdateSprintOrder($data)
    {
        $this->post('bulk_update_sprint_order', $data);
    }

    /**
     * Update user stories sprint in bulk mode
     *
     * @param $data
     */
    public function bulkUpdateMilestone($data)
    {
        $this->post('bulk_update_milestone', $data);
    }

    /**
     * Get filters data
     *
     * @param $projectId
     *
     * @return array
     */
    public function filtersData($projectId)
    {
        return $this->get(sprintf('filters_data?project=%s', $projectId));
    }

    /**
     * List user story attachments
     *
     * @return array
     */
    public function getAttachments($id, $projectId)
    {
        return $this->get(sprintf('attachments?object_id=%s&?project=%s', $id, $projectId));
    }

    /**
     * Get user story attachments
     *
     * @return array
     */
    public function getAttachment($userStoryAttachmentId)
    {
        return $this->get(sprintf('attachments/%s', $userStoryAttachmentId));
    }

    /**
     * Create user story attachments
     *
     * @param array $data
     *
     * @return array
     */
    public function createAttachment(array $data)
    {
        return $this->post('attachments', $data);
    }

    /**
     * Modify user story attachments
     *
     * @param       $userStoryAttachmentId
     * @param array $data
     *
     * @return array
     */
    public function modifyAttachment($userStoryAttachmentId, array $data)
    {
        return $this->put(sprintf('attachments/%s', $userStoryAttachmentId), $data);
    }

    /**
     * Modify partially user story attachments
     *
     * @param       $userStoryAttachmentId
     * @param array $data
     *
     * @return array
     */
    public function modifyPartiallyAttachment($userStoryAttachmentId, array $data)
    {
        return $this->patch(sprintf('attachments/%s', $userStoryAttachmentId), $data);
    }

    /**
     * Delete a milestone
     *
     * @param $userStoryAttachmentId
     */
    public function deleteAttachment($userStoryAttachmentId)
    {
        $this->delete(sprintf('attachments/%s', $userStoryAttachmentId));
    }
}

