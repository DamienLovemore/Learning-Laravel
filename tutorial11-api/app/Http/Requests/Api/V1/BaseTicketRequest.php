<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class BaseTicketRequest extends FormRequest
{
    public function mappedAttributes()
    {
        $attribute_map = [
            "data.attributes.title"                 => "title",
            "data.attributes.description"           => "description",
            "data.attributes.status"                => "status",
            "data.attributes.createdAt"             => "created_at",
            "data.attributes.updatedAt"             => "updated_at",
            "data.relationships.author.data.id"     => "user_id"
        ];

        $attribute_update = [];

        foreach($attribute_map AS $key => $attr)
        {
            if($this->has($key))
                $attribute_update[$attr] = $this->input($key);
        }

        return $attribute_update;
    }

    public function messages()
    {
        return [
            "data.attributes.status" => "The data.attributes.status value is invalid. Please use A, C, H or X"
        ];
    }
}
