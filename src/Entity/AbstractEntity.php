<?php

namespace App\Entity;

class AbstractEntity
{
    public function __construct(?array $attributes)
    {
        if ($attributes) {
            $this->setAttributesFromRequest($attributes);
        }
    }

    public function setAttributesFromRequest(array $attributes): void
    {
        foreach (get_object_vars($this) as $field => $value) {
            if ($field == 'id') {
                continue;
            }
            if (isset($attributes[$field])) {
                $this->$field = $attributes[$field];
            }
        }
    }
}
