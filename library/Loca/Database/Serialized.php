<?php
/**
 * This is a *horrible* implementation of a "database".
 *
 * It reads, unserializes, serializes and writes the data on
 * almost every function call. This *can't* be very fast with
 * nontrivial amount of data.
 *
 * Still (with all that reading and writing) this is hardly
 * multi-user safe.
 *
 */
class Loca_Database_Serialized implements Loca_Database
{
    protected $_dataPath;

    public function __construct($config)
    {
        $dbPath = $config['db_path'] . DIRECTORY_SEPARATOR . 'db';
        
        if (!file_exists($dbPath)) {
            $created = mkdir($dbPath, 0777, TRUE);
            if (!$created) {
                throw new Exception(sprintf(
                    'Path >%s< did not exist and could not be created...',
                    $dbPath
                ));
            }
        }

        if (!is_writable($dbPath)) {
                throw new Exception(sprintf(
                    'Path >%s< is not writable...',
                    $dbPath
                ));
        }
        
        $this->_dataPath = realpath($dbPath);
    }

    public function getAllProjects() {
        $glob = glob($this->_dataPath . DIRECTORY_SEPARATOR . '*.db');
        if ($glob === FALSE) {
            return array();
        }
        return $glob;
    }

    public function getAllKeysByProject($project)
    {
        $data = file_get_contents($this->getFileNameByProject($project));
        $keys = unserialize($data);
        return $keys;
    }

    public function getKeyByProjectAndName($project, $keyName)
    {
        $keys = $this->getAllKeysByProject($project);

        if (!array_key_exists($keyName, $keys)) {
            return NULL;
        }
        
        return $keys[$keyName];
    }

    public function saveKeyToProject($project, $key)
    {
        // FIXME race conditions with multiple users, maybe lock the file?
        $keys = $this->getAllKeysByProject($project);
        $keys[$key['name']] = $key;
        $this->storeProjectKeys($project, $keys);
    }

    public function saveKeysToProject($project, $keys)
    {
        // FIXME race conditions with multiple users, maybe lock the file?
        $dbKeys = $this->getAllKeysByProject($project);
        foreach ($keys as $key) {
            $dbKeys[$key['name']] = $key;
        }
        $this->storeProjectKeys($project, $dbKeys);
    }

    /**
     *
     * @param string $project
     * @return string
     */
    protected function getFileNameByProject($project)
    {
        return sprintf(
            '%s%s%s.db',
            $this->_dataPath,
            DIRECTORY_SEPARATOR,
            $project
        );
    }

    /**
     *
     * @param string $project
     * @param array $keys
     * @return bool
     */
    protected function storeProjectKeys($project, $keys)
    {
        return file_put_contents(
            $this->getFileNameByProject($project),
            serialize($keys),
            LOCK_EX
        );
    }
}
