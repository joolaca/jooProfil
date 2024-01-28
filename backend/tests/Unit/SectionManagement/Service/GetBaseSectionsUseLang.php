<?php

namespace SectionManagement\Service;

use App\Models\Section;
use App\SectionManagement\Contracts\ISectionRepository;
use App\SectionManagement\Repositories\SectionRepository;
use App\SectionManagement\Services\SectionService;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Str;
use Mockery;
use Tests\TestCase;
use Illuminate\Support\Collection as SupportCollection;

class GetBaseSectionsUseLang extends TestCase
{
    private SectionRepository $mockSectionRepository;
    private SupportCollection $huLangBaseSections;
    private SupportCollection $enLangBaseSections;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mockSectionRepository = Mockery::mock(SectionRepository::class);
        $this->mockSectionRepository->makePartial();

        $this->huLangBaseSections = collect([
            [
                'lang' => 'hu',
                'name' => Str::random(),
            ],
            [
                'lang' => 'hu',
                'name' => Str::random(),
            ],
            [
                'lang' => 'hu',
                'name' => Str::random(),
            ],
        ]);
        $this->enLangBaseSections = collect([
            [
                'lang' => 'en',
                'name' => Str::random(),
            ],
            [
                'lang' => 'en',
                'name' => Str::random(),
            ],
        ]);
    }

    public function test_getBaseSectionsUseLang()
    {

        $this->addCollectionToMockSectionRepository('hu', $this->huLangBaseSections);
        $this->addCollectionToMockSectionRepository('en', $this->enLangBaseSections);

        $mockSectionService = Mockery::mock(SectionService::class, [
            $this->mockSectionRepository
        ]);
        $mockSectionService->makePartial();

        $huTestCollection = $mockSectionService->getBaseSectionsUseLang('hu');
        foreach ($this->huLangBaseSections as $huLangBaseSection) {
            $element = $huTestCollection->where('name', '=', $huLangBaseSection['name']);
            $this->assertNotEmpty($element, 'Missing section element');
        }

        $enTestCollection = $mockSectionService->getBaseSectionsUseLang('en');
        foreach ($this->enLangBaseSections as $enLangBaseSection) {
            $element = $enTestCollection->where('name', '=', $enLangBaseSection['name']);
            $this->assertNotEmpty($element, 'Missing section element');
        }

    }

    private function addCollectionToMockSectionRepository(
        string $lang,
        SupportCollection $sectionsData
    ): void
    {
        $collection = $this->makeSectionCollection(
            $sectionsData
        );

        $this->mockSectionRepository
            ->shouldReceive('getBaseSectionsUseLang')
            ->with($lang)
            ->andReturnUsing(
                function () use ($collection) {
                    return $collection;
                });
    }

    private function makeSectionCollection(
        $sectionsData,
    ): EloquentCollection
    {

        $collection = resolve(EloquentCollection::class);

        foreach ($sectionsData as $value) {
            $collection->push($value);
        }

        return $collection;
    }


}
