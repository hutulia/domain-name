<?php

namespace Hutulia\DomainName;

class DomainName
{
    protected $domainName = '';

    public function __construct($domainName)
    {
        $this->domainName = $domainName;
    }

    public function getName()
    {
        return $this->domainName;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getTld()
    {
        $tld = preg_replace('/^[^\.]*\./','.',$this->domainName);

        if(empty($tld)){
            throw new \Exception('Cant extract tld');
        }

        return $tld;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getSld()
    {
        $sld = preg_replace('/\..*$/','',$this->domainName);

        if(empty($sld)){
            throw new \Exception('Cant extract sld');
        }

        return $sld;
    }

    /**
     * @return int
     */
    public function calcLevels()
    {
        return count($this->getLevels());
    }

    /**
     * @return string[]
     */
    public function getLevels()
    {
        $levels = explode('.', $this->domainName);

        krsort($levels);

        $levels = array_values($levels);

        return $levels;
    }

    /**
     * @param int $level
     */
    public function getLevel($level)
    {
        $levels = $this->getLevels();
        $index = $level-1;

        if(empty($levels[$index])){
            throw new \Exception('Level does not exist');
        }

        return $levels[$index];
    }

    /**
     * @param string $domainName
     * @return string
     */
    static function normalize($domainName){
        return strtolower(trim($domainName));
    }
}
