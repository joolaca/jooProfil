<?php
declare(strict_types=1);

namespace App\SectionManagement\Contracts;


use App\Models\Section;

interface ISectionService
{
    public function getSectionUseSlugAndLang(string $slug, string $lang): Section;
}
