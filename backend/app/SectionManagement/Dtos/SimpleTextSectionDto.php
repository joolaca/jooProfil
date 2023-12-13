<?php

namespace App\SectionManagement\Dtos;

use App\SectionManagement\Contracts\ISectionDto;

class SimpleTextSectionDto implements ISectionDto
{

    public function getEditableAttribute(): array
    {
        return [
            [
                'column' => 'id',
                'title' => __('admin/section.id'),
                'display' => 'hidden',
            ],
            [
                'column' => 'name',
                'title' => __('admin/section.name').' '. __('admin/section.not_show'),
                'display' => 'text',
            ],
            [
                'column' => 'title',
                'title' => __('admin/section.title'),
                'display' => 'text',
            ],
            [
                'column' => 'description',
                'title' => __('admin/section.description'),
                'display' => 'textarea',
            ],
        ];
    }

}
