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
    private SectionService $mockSectionService;
    private SupportCollection $huLangBaseSections;
    private SupportCollection $enLangBaseSections;


    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mockSectionRepository = Mockery::mock(SectionRepository::class);
        $this->mockSectionRepository->makePartial();

        $this->huLangBaseSections = collect($this->makeBaseSectionData(3, 'hu'));
        $this->enLangBaseSections = collect($this->makeBaseSectionData(5, 'en'));
    }

    private function makeBaseSectionData(
        int    $quantity = 1,
        string $lang = 'hu'
    ): array
    {
        $baseSectionData = [];
        for ($i = 0; $i < $quantity; $i++) {
            $baseSectionData[] =
                [
                    'lang' => $lang,
                    'name' => Str::random(),
                    'slug' => Str::random(),
                    'image' => Str::random(),
                    'title' => Str::random(),
                    'description' => Str::random(),
                    'position' => rand(0, 10),
                ];
        }
        return $baseSectionData;
    }

    public function test_getBaseSectionsUseLang()
    {
        $this->addCollectionToMockSectionRepository('hu', $this->huLangBaseSections);
        $this->addCollectionToMockSectionRepository('en', $this->enLangBaseSections);

        $this->mockSectionService = Mockery::mock(SectionService::class, [
            $this->mockSectionRepository
        ]);
        $this->mockSectionService->makePartial();

        $this->makeAssertion('hu');
        $this->makeAssertion('en');

    }

    private function makeAssertion(
        $lang = 'hu'
    ): void
    {
        $originalLanguageDependentBaseSectionsData = $lang . 'LangBaseSections';
        $testCollection = $this->mockSectionService->getBaseSectionsUseLang($lang);

        foreach ($this->{$originalLanguageDependentBaseSectionsData} as $langBaseSection) {
            $this->checkFieldName('name', $testCollection, $langBaseSection);
            $this->checkFieldName('slug', $testCollection, $langBaseSection);
            $this->checkFieldName('image', $testCollection, $langBaseSection);
            $this->checkFieldName('title', $testCollection, $langBaseSection);
            $this->checkFieldName('description', $testCollection, $langBaseSection);
        }
    }

    private function checkFieldName(
        string             $fieldName,
        EloquentCollection $testCollection,
        array  $langBaseSection
    )
    {
        $element = $testCollection->where($fieldName, '=', $langBaseSection[$fieldName]);
        $this->assertNotEmpty($element, 'Missing section element. checkFieldName: ' . $fieldName);
    }

    private function addCollectionToMockSectionRepository(
        string            $lang,
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
