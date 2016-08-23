<?php
class Container
{
    private $objects = array();

    private $callbacks = array();

    private static $instance;

    public function __set($name, $callback)
    {
        $this->callbacks[$name] = $callback;
    }

    public function __get($name)
    {
        if (isset($this->objects[$name])) {
            return $this->objects[$name];
        }
        if (!isset($this->callbacks[$name])) {
            throw new  \InvalidArgumentException("{$name} is not registered ."); 
        }
        $this->objects[$name] = $this->callbacks[$name]($this);

        return $this->objects[$name];
    }
    
    public static function getInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}