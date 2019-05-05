<?php

namespace SmartEnem\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use SmartEnem\Media\PublicationPaths;

/**
 * Class Publication.
 *
 * @package namespace SmartEnem\Models;
 */
class Publication extends Model implements Transformable, TableInterface
{
    use TransformableTrait;
    use PublicationPaths;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'texto', 'resumo', 'fonte',
        'data', 'imagem', 'tag', 'publicada', 'atualizada',
        'user_id', 'category_id'
        ];

    /**
     *  * A list of headers to be used when a table is displayed
     *
     * @return array|void
     */
    public function getTableHeaders()
    {
        return['Tag'];
    }

    /**
     * * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed|void
     */
    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Tag':
                if (!isset($this->category->name)){
                    return 'Tag';
                }else{
                    return $this->category->name;
                }

        }
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');

    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
