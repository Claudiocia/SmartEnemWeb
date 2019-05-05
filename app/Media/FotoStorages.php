<?php
/**
 * Created by PhpStorm.
 * User: ClaudioSouza
 * Date: 02/05/19
 * Time: 17:15
 */

namespace SmartEnem\Media;


use Illuminate\Filesystem\FilesystemAdapter;

trait FotoStorages
{
    /**
     * @return \Illuminate\Filesystem\FilesystemAdapter
     */
    public function getStorage(){
        return \Storage::disk($this->getDiskDriver());
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    protected function getDiskDriver(){
        return config('filesystems.disks.public.visibility');
    }

    protected function getAbsolutePath(FilesystemAdapter $storage, $fileRelativePath)
    {
        return $storage->getDriver()->getAdapter()->applyPathPrefix($fileRelativePath);
    }

}