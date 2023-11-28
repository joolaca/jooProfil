<?php

namespace App\SectionManagement\Contracts;

use App\Models\Section;

interface ISectionRepository
{
    public function getSectionUseSlugAndLang(string $slug, string $lang): Section;
}
