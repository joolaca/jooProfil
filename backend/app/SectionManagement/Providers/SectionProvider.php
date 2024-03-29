<?php
declare(strict_types=1);

namespace App\SectionManagement\Providers;


use App\SectionManagement\Contracts\ISectionRepository;
use App\SectionManagement\Contracts\ISectionService;
use App\SectionManagement\Repositories\SectionRepository;
use App\SectionManagement\Services\SectionService;
use Illuminate\Support\ServiceProvider;

class SectionProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(ISectionService::class, SectionService::class);
        $this->app->bind(ISectionRepository::class, SectionRepository::class);
    }
}
