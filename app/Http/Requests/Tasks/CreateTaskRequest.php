<?php

namespace App\Http\Requests\Tasks;

use App\Services\Dto\Tasks\CreateTaskDto;
use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'deadline_date' => 'required|date',
            'description' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
            'status_id' => 'required|integer|exists:statuses,id'
        ];
    }

    /**
     * @return CreateTaskDto
     */
    public function getDto(): CreateTaskDto
    {
        return new CreateTaskDto(
            $this->get('name'),
            $this->get('deadline_date'),
            $this->get('description'),
            $this->get('user_id'),
            $this->get('status_id')
        );
    }
}
