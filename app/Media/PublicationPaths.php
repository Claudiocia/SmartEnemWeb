<?php
/**
 * Created by PhpStorm.
 * User: ClaudioSouza
 * Date: 02/05/19
 * Time: 17:26
 */

namespace SmartEnem\Media;


trait PublicationPaths
{
    use FotoStorages;

    public function getThumbFolderStorageAttribute()
    {
        return "publications/{$this->id}";
    }

    public function getThumbRelativeAttribute()
    {
        return "{$this->thumb_folder_storage}/{$this->imagem}";
    }

    public function getThumbPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->thumb_relative);
    }

    public function getThumbSmallRelativeAttribute()
    {
        list($name, $extension) = explode('.',$this->imagem);
        return "{$this->thumb_folder_storage}/{$name}_small.{$extension}";
    }

    public function getThumbSmallPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->thumb_small_relative);
    }

    public function getThumbAssetAttribute()
    {
        return route('admin.publications.thumb_asset', ['publication' => $this->id]);
    }

    public function getThumbSmallAssetAttribute()
    {
        return route('admin.publications.thumb_small_asset', ['publication' => $this->id]);
    }

}