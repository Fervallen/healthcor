<?php

namespace App\Entity;

use Symfony\Component\HttpFoundation\Request;

class AbstractEntity
{
	/**
	 * @param Request $request
	 * @return $this
	 */
	public function __construct(Request $request)
	{
		return $this->setAttributesFromRequest($request);
	}

    /**
     * @param Request $request
     * @return $this
     */
    public function setAttributesFromRequest(Request $request)
    {
        foreach (get_object_vars($this) as $field => $value) {
        	if ($field == 'id') {
        		continue;
	        }
            if (!empty($newValue = $request->get($field))) {
                $this->$field = $newValue;
            }
        }

        return $this;
    }
}
