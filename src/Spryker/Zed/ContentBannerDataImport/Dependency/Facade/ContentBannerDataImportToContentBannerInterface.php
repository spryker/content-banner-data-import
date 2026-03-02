<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\ContentBannerDataImport\Dependency\Facade;

use Generated\Shared\Transfer\ContentBannerTermTransfer;
use Generated\Shared\Transfer\ContentValidationResponseTransfer;

interface ContentBannerDataImportToContentBannerInterface
{
    public function validateContentBannerTerm(ContentBannerTermTransfer $contentBannerTermTransfer): ContentValidationResponseTransfer;
}
