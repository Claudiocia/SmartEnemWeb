<?php
/**
 * Created by PhpStorm.
 * User: ClaudioSouza
 * Date: 03/05/19
 * Time: 08:18
 */

namespace SmartEnem\Media;


use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;
use Image;
use Imagine\Image\Box;

trait ThumbUploads
{
    public function uploadThumb($id, UploadedFile $file)
    {
        $model = $this->find($id);
        $name = $this->upload($model, $file);
        if ($name) {
            $this->deleteThumbOld($model);
            $model->imagem = $name;
            $this->makeThumbSmall($model);
            $model->save();
        }
        return $model;
    }

    protected function makeThumbSmall($model)
    {
        $storage = $model->getStorage();
        $thumbFile = $model->thumb_path;
        $format = Image::format($thumbFile);
        $thumbnailSmall = Image::open($thumbFile)
            ->thumbnail(new Box(100, 70));
        $storage->put($model->thumb_small_relative, $thumbnailSmall->get($format));
    }

    /**
     * @param $model
     * @param UploadedFile $file
     * @return false|string
     */
    public function upload($model, UploadedFile $file)
    {
        /** @var FilesystemAdapter $storage */
        $storage = $model->getStorage();

        $name = "{$file->getClientOriginalName()}";

        $result = $storage->putFileAs($model->thumb_folder_storage, $file, $name);

        return $result ? $name : $result;
    }

    public function deleteThumbOld($model){
        /** @var FilesystemAdapter $storage */
        $storage = $model->getStorage();
        if ($storage->exists($model->thumb_relative)){
            $storage->delete([$model->thumb_relative, $model->thumb_small_relative]);
        }
    }

}