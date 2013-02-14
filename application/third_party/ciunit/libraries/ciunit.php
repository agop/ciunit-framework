<?php

require_once APPPATH . "third_party/ciunit/system/autoload.php";
 

class Ciunit {
    
    private $runner;  
    private $runFailure;
    
    public function run($testCase)
    {
        if($this->runner == NULL) {
            $this->runner  = new CIUnit_TestRunner($testCase);
        }
        
        try {
            $this->runner->run(); 
        }
        catch (CIUnit_Exception $e) {
            $this->runFailure =  $e->getMessage();
        } 
    }
    
    public function getRunner()
    {
        return $this->runner;
    }
    
    public function buildTestTree()
    {    
        return CIUnit_Util_FileLoader::directory_map();
    } 
    
    public function getRunFailure()
    {
        return $this->runFailure;
    }
    
    public function runWasSuccessful()
    {
        return NULL == $this->runFailure;
    }
}

