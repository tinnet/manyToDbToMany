<?php

interface Database
{
    /**
     * @return boolean
     */
    protected function _createTables();

    /**
     * @return array
     */
    public function getAllProjects(); 

    /**
     * @param string $project
     * @return array
     */
    public function getAllKeysByProject($project);

}
