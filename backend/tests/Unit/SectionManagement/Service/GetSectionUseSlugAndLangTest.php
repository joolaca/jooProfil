<?php

namespace SectionManagement\Service;

use App\Models\Section;
use App\SectionManagement\Contracts\ISectionRepository;
use App\SectionManagement\Repositories\SectionRepository;
use App\SectionManagement\Services\SectionService;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Mockery;
use Tests\TestCase;

class GetSectionUseSlugAndLangTest extends TestCase
{
    /**
     * @dataProvider sectionTestDatas
     */
    public function test_getSectionUseSlugAndLang(
        $slug,
        $lang
    )
    {
        $mockSectionModel = $this->makeMockSectionModel($slug, $lang);
        $mockSectionRepository = $this->makeMockSectionRepository($mockSectionModel);
        $mockSectionService = Mockery::mock(SectionService::class, [
            $mockSectionRepository
        ])
            ->makePartial();

        $testSection = $mockSectionService->getSectionUseSlugAndLang($slug, $lang);

        $this->assertEquals($slug, $testSection->slug);
        $this->assertEquals($lang, $testSection->lang);

    }

    private function makeMockSectionRepository(
        Section $mockSectionModel
    ): ISectionRepository
    {
        $mockSectionRepository = Mockery::mock(SectionRepository::class);
        $mockSectionRepository->makePartial()
            ->shouldReceive('getSectionUseSlugAndLang')
            ->with($mockSectionModel->slug, $mockSectionModel->lang)
            ->andReturnUsing(
                function () use ($mockSectionModel) {
                    return $mockSectionModel;
                });
        return $mockSectionRepository;
    }

    private function makeMockSectionModel(string $slug, string $lang): Section
    {
        $testSection = resolve(Section::class);
        $testSection->slug = $slug;
        $testSection->lang = $lang;
        return $testSection;
    }


    public static function sectionTestDatas()
    {
        return [
            'firstSectionTestData' => [
                'slug' => Str::random(),
                'lang' => Arr::random(['hu', 'en']),
            ],
            'secondSectionTestData' => [
                'slug' => Str::random(),
                'lang' => Arr::random(['hu', 'en']),
            ]
        ];
    }
}
