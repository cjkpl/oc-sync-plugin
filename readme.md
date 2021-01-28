# Description

Clone this plugin to your october installation, e.g.

```
cd plugins
mkdir cjkpl
cd cjkpl
mkdir sync
cd sync
git clone https://github.com/cjkpl/oc-sync-plugin.git .
```

Install the plugin (this creates three db tables)
```
php artisan october:up
```

Execute unit tests from inside the plugin folder:
```
../../../vendor/bin/phpunit
```

Expected behavior:
1) On branch 1.0 test runs ok
2) On dev branch test fails with an error:

```
1) Cjkpl\Sync\Tests\Models\PivotTest::testPivot
Illuminate\Database\QueryException: SQLSTATE[23000]: Integrity constraint violation: 19 UNIQUE constraint failed: cjkpl_sync_lessons_students.lesson_id, cjkpl_sync_lessons_students.student_id (SQL: insert into "cjkpl_sync_lessons_students" ("created_at", "lesson_id", "student_id", "updated_at") values (2021-01-28 18:34:17, 1, 1, 2021-01-28 18:34:17))
```