<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerTest\Zed\ContentBannerDataImport\Helper;

use Codeception\Module;
use Orm\Zed\Content\Persistence\SpyContentLocalizedQuery;
use Orm\Zed\Content\Persistence\SpyContentQuery;

class ContentBannerDataImportHelper extends Module
{
    public function ensureDatabaseTableIsEmpty(): void
    {
        $contentLocalizedQuery = $this->getContentLocalizedQuery();
        $contentLocalizedQuery->deleteAll();
        $contentQuery = $this->getContentQuery();
        $contentQuery->deleteAll();
    }

    public function assertContentLocalizedParameterHasValue(int $locale, string $parameter, string $value): void
    {
        $contentLocalized = $this->getContentLocalizedQuery()->findOneByFkLocale($locale);
        $parameters = json_decode($contentLocalized->getParameters(), true);

        $this->assertEquals($parameters[$parameter], $value);
    }

    public function assertContentLocalizedDoesNotExist(int $locale): void
    {
        $contentLocalized = $this->getContentLocalizedQuery()->findOneByFkLocale($locale);

        $this->assertNull($contentLocalized);
    }

    public function assertDatabaseTableContainsData(): void
    {
        $contentQuery = $this->getContentQuery();
        $this->assertTrue($contentQuery->exists(), 'Expected at least one entry in the database table but database table is empty.');
    }

    protected function getContentQuery(): SpyContentQuery
    {
        return SpyContentQuery::create();
    }

    protected function getContentLocalizedQuery(): SpyContentLocalizedQuery
    {
        return SpyContentLocalizedQuery::create();
    }
}
