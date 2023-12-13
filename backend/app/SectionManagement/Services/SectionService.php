<?php
/**
 * Created by PhpStorm.
 * User: lacza
 * Date: 2023. 11. 26.
 * Time: 8:45
 */

namespace App\SectionManagement\Services;

use App\Models\Section;
use App\SectionManagement\Contracts\ISectionRepository;
use App\SectionManagement\Contracts\ISectionService;
use Illuminate\Database\Eloquent\Collection;

class SectionService implements ISectionService
{

    public function __construct(
        private readonly ISectionRepository $sectionRepository
    )
    {
    }

    public function getSectionUseSlugAndLang(string $slug, string $lang): Section
    {
        return $this->sectionRepository->getSectionUseSlugAndLang($slug, $lang);
    }

    public function getBaseSectionsUseLang(string $lang): Collection
    {
        return $this->sectionRepository->getBaseSectionsUseLang($lang);
    }

    public function setSectionPosition(int $sectionId, int $position): void
    {
        $this->sectionRepository->setSectionPosition($sectionId, $position);
    }
}
