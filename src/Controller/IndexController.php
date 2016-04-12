<?php

namespace Example\Controller;

use Example\View\JsonView;

/**
 * Class IndexController
 */
class IndexController extends AbstractRestConstructor
{
    /**
     * Get list of entry
     *
     * @return JsonView
     */
    public function getList()
    {
        $variables = $this->getModel()->getList();
        return new JsonView($variables);
    }

    /**
     * Get one entry
     *
     * @param int $id
     * @return JsonView
     */
    public function get($id)
    {
        $variables = $this->getModel()->get($id);
        return new JsonView($variables);
    }

    /**
     * Create entry
     *
     * @param array $data
     * @return JsonView
     */
    public function create(array $data)
    {
        $lastInsertId = $this->getModel()->create($data);
        return new JsonView(['lastInsertId' => $lastInsertId]);
    }

    /**
     * Update entry
     *
     * @param int   $id
     * @param array $data
     * @return JsonView
     */
    public function update($id, array $data)
    {
        $result = $this->getModel()->update($id, $data);
        return new JsonView(['result' => $result]);
    }

    /**
     * Delete entry
     *
     * @param int $id
     * @return JsonView
     */
    public function delete($id)
    {
        $result = $this->getModel()->delete($id);
        return new JsonView(['result' => $result]);
    }
}
