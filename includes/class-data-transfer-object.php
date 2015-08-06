<?php
class Data_Transfer_Object {
    /**
     * Constructor
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        foreach ($parameters as $propertyName => $value) {
            $this->$propertyName = $value;
        }
    }
}
