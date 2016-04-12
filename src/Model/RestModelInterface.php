<?php

namespace Example\Model;

interface RestModelInterface extends ModelInterface
{
    /**
     * Get list of entry
     *
     * @return array
     */
    public function getList();

    /**
     * Get one entry by id
     *
     * @param $id
     * @return array
     */
    public function get($id);

    /**
     * Create a one row in storage
     * @param array $data
     * @return int Last insert id
     */
    public function create(array $data);

    /**
     * Update one entry by id
     *
     * @param int   $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data);

    /**
     * Delete one entry from storage
     * @param int $id
     * @return bool
     */
    public function delete($id);
}
