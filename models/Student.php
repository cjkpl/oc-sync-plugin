<?php namespace Cjkpl\Sync\Models;

use Model;

/**
 * Student Model
 */
class Student extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'cjkpl_sync_students';


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
        'lessons' => [
            'Cjkpl\Sync\Models\Lesson',
            'table' => 'cjkpl_sync_lessons_students',
            'pivot' => ['created_at','updated_at','visits']
        ]
    ];
}
