<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Video extends Model
{
    use LogsActivity;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'videos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'details', 'tag', 'image', 'video', 'subcategory_id', 'category_id'];

    public function Subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
    

    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
}
