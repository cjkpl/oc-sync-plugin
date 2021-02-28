<?php namespace Cjkpl\Sync\Components;

use Cms\Classes\ComponentBase;
use Cjkpl\Sync\Models\Lesson;
use Cjkpl\Sync\Models\Student;

class SyncMe extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SyncMe Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        // return $this->TwoConsecutiveSyncs();
        return $this->SyncNoDetach();
    }

    protected function TwoConsecutiveSyncs()
    {
        // create one lesson and one student
        $s = Student::create([]);
        $l = Lesson::create([]);

        $s->lessons()->sync([$l->id]);
        $s->lessons()->sync([$l->id]);

        //expect one lesson attached to student
        $c = $s->lessons()->count();

        Student::truncate();
        Lesson::truncate();

        return $c;
    }

    protected function SyncNoDetach()
    {
        // create one lesson and one student
        $s = Student::create([]);
        $l = Lesson::create([]);

        $s->lessons()->syncWithoutDetaching([$l->id]);

        $tracker = $s->lessons()->where('id', $l->id)->first()->pivot->toArray();

        $s->lessons()->syncWithoutDetaching([$l->id, $tracker]);

        //expect one lesson attached to student
        $c = $s->lessons()->count();

        Student::truncate();
        Lesson::truncate();

        return $c;
    }
}
