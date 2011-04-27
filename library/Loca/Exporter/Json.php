<?php

class Loca_Exporter_Json {
    public function __construct($config) {}

    public function export($project, $keys)
    {
        $exported = array($project => array());

        foreach ($keys as $key) {
            $exported[$project][$key['name']] = array();
            foreach ($key['translations'] as $lang => $content) {
                $exported[$project][$key['name']][$lang] = $content;
            }
        }
        
        return json_encode($exported);
    }
}
