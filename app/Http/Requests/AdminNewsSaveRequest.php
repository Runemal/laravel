<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminNewsSaveRequest extends FormRequest
{
    public function rules()
    {
        return [
            "title" => "required|string|min:5|max:50",
            "description" => "required|max:1024",
            "category" => "required|exists:category,id|integer",
            "active" => "integer",
            "publish_date" => "date",
            "created_at" => "date",
            "updated_at" => "date",
        ];
    }
}
