<?php

class Database_Sqlite implements Database
{
    protected $_db = null;

    public function __construct($config)
    {
        if (!isset($config['db_path'] || !isset($config['db_database'])) {
            throw new Exception('Missing params for db setup!');
        }

        $this->_db = new PDO(
            sprintf(
                'sqlite:%s/%s.sqlite',
                 realpath($config['db_path']),
                 $config['db_name']
            )
        );
        
	// TODO check if our tables already exists, otherwise create them
        // $this->_db->query('???')
        // $this->_createTables();
    }
// TODO everything else
}
