<?php

namespace App\SectionManagement\Dtos;

use App\SectionManagement\Contracts\ISectionDto;

class BrickSectionDto implements ISectionDto
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
                'title' => __('admin/section.name'),
                'display' => 'text',
            ],
            [
                'column' => 'title',
                'title' => __('admin/section.year'),
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
