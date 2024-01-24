<?php

namespace Tests\SectionManagement;

use App\Models\Section;
use App\SectionManagement\Contracts\ISectionRepository;
use App\SectionManagement\Repositories\SectionRepository;
use App\SectionManagement\Services\SectionService;
use Illuminate\Support\Arr;
use Mockery;
use Tests\TestCase;
use Illuminate\Support\Str;

class SectionServiceTest extends TestCase
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
        $mockSectionRepository = $this->makeMockSectionRepository($mockSectionModel, $slug, $lang);
        $mockSectionService = Mockery::mock(SectionService::class, [
            $mockSectionRepository
        ])
            ->makePartial();

        $testSection = $mockSectionService->getSectionUseSlugAndLang($slug, $lang);

        $this->assertEquals($slug, $testSection->slug);
        $this->assertEquals($lang, $testSection->lang);

    }

    private function makeMockSectionRepository(
        Section $mockSectionModel,
        string  $testSlug,
        string  $testLang
    ): ISectionRepository
    {
        $mockSectionRepository = Mockery::mock(SectionRepository::class);
        $mockSectionRepository->makePartial()
            ->shouldReceive('getSectionUseSlugAndLang')
            ->with($testSlug, $testLang)
            ->andReturnUsing(
                function () use ($mockSectionModel) {
                    return $mockSectionModel;
                });
        return $mockSectionRepository;
    }

    private function makeMockSectionModel(string $slug, string $lang): Section
    {
        $testSection = new Section();
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
