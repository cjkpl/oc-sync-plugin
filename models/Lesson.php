<?php namespace Cjkpl\Sync\Models;

use Model;

/**
 * Lesson Model
 */
class Lesson extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'cjkpl_sync_lessons';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $belongsToMany = [
        'students' => [
            'Cjkpl\Sync\Models\Student',
            'table' => 'cjkpl_sync_lessons_students',
            'pivot' => ['created_at','updated_at','visits']
        ]
    ];
}
