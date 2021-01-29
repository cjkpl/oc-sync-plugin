<?php namespace Cjkpl\Sync\Tests\Models;

use Cjkpl\Sync\Models\Lesson;
use Cjkpl\Sync\Models\Student;
use PluginTestCase;

class PivotTest extends PluginTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        // create one lesson and one student
        $s = Student::create([]);
        $l = Lesson::create([]);
    }

    public function tearDown(): void
    {
        Student::truncate();
        Lesson::truncate();

        parent::tearDown();
    }

    public function testPivot()
    {
        $s = Student::first();
        $l = Lesson::first();

        $s->lessons()->sync([$l->id]);
        $s->lessons()->sync([$l->id]);

        //expect one lesson attached to student
        self::assertEquals(1, $s->lessons()->count());
    }
}
