<?php namespace Cjkpl\Sync\Tests\Models;

use Cjkpl\Sync\Models\Lesson;
use Cjkpl\Sync\Models\Student;
use PluginTestCase;

class PivotTest extends PluginTestCase
{
    public function testTwoConsecutiveSyncCalls()
    {
        // create one lesson and one student
        $s = Student::create([]);
        $l = Lesson::create([]);

        $s->lessons()->sync([$l->id]);
        $s->lessons()->sync([$l->id]);

        //expect one lesson attached to student
        self::assertEquals(1, $s->lessons()->count());
    }

    public function testUpdatePivotDataBetweenSyncCalls()
    {
        // create one lesson and one student
        $s = Student::create([]);
        $l = Lesson::create([]);

        $sid = $s->id;

        $s->lessons()->sync([$l->id => ['visits' => 1]]);
        $v = $s->lessons()->where('id',$l->id)->first()->pivot->visits;

        // increase a value on intermediary table
        $new_v = intval($v) + 1;

        // update value on intermediary table
        $s->lessons()->sync([$l->id => ['visits' => $new_v]]);

        // when we access the relationship from the "other end", it works
        $v = $l->students()->where('id',$s->id)->first()->pivot->visits;
        self::assertEquals($new_v, $v, 'expect \'visits\' column contain 2');

        // ... but when we try to re-use the original model, it fails
        // this fails $s->fresh('lessons');
        // this also fails $s = Student::find($sid);
        
        $v = $s->lessons()->where('id',$l->id)->first()->pivot->visits;
        self::assertEquals($new_v, $v, 'expect \'visits\' column contain 2');
    }

}
