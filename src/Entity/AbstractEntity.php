<?php

namespace App\Entity;

class AbstractEntity
{
	/**
	 * @param array $attributes
	 * @return $this
	 */
	public function __construct(array $attributes)
	{
		return $this->setAttributesFromRequest($attributes);
	}

    /**
     * @param array $attributes
     * @return $this
     */
    public function setAttributesFromRequest(array $attributes)
    {
        foreach (get_object_vars($this) as $field => $value) {
        	if ($field == 'id') {
        		continue;
	        }
            if (isset($attributes[$field])) {
                $this->$field = $attributes[$field];
            }
        }

        return $this;
    }
}
