<?php

namespace App\SectionManagement\Contracts;

interface ISectionDto
{
    public function getEditableAttribute(): array;
}
