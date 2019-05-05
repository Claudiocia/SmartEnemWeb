<?php

namespace SmartEnem\Repositories;

use Illuminate\Http\UploadedFile;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PublicationRepository.
 *
 * @package namespace SmartEnem\Repositories;
 */
interface PublicationRepository extends RepositoryInterface
{
    public function uploadThumb($id, UploadedFile $file);
}
