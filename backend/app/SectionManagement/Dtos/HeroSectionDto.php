<?php

namespace App\SectionManagement\Dtos;

use App\SectionManagement\Contracts\ISectionDto;

class HeroSectionDto implements ISectionDto
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
                'title' => __('admin/section.button_title'),
                'display' => 'text',
            ],
            [
                'column' => 'image',
                'title' => __('admin/section.devicon_class_name'),
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
