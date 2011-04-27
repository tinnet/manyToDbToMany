<?php

interface Loca_Database
{
    /**
     * @return array
     */
    public function getAllProjects(); 

    /**
     * @param string $project
     * @return array
     */
    public function getAllKeysByProject($project);

    /**
     * @param string $project
     * @param string $keyname
     */
    public function getKeyByProjectAndName($project, $keyName);

    /**
     * @param string $project
     * @param array $key
     */
    public function saveKeyToProject($project, $key);

    /**
     * @param string $project
     * @param array $keys
     */
    public function saveKeysToProject($project, $keys);
}
