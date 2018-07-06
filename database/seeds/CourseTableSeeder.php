<?php

use Illuminate\Database\Seeder;
use App\Model\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course1 = new Course();
        $course1->type = 'Món khai vị';
        $course1->save();

        $course2 = new Course();
        $course2->type = 'Món chính';
        $course2->save();

        $course3 = new Course();
        $course3->type = 'Món tráng miệng';
        $course3->save();

        $course4 = new Course();
        $course4->type = 'Món khai vị';
        $course4->save();

        $course5 = new Course();
        $course5->type = 'Món ăn sáng';
        $course5->save();

        $course6 = new Course();
        $course6->type = 'Thức uống';
        $course6->save();

        $course7 = new Course();
        $course7->type = 'Món chay';
        $course6->save();

        $course8 = new Course();
        $course8->type = 'Nhanh và dễ';
        $course8->save();

        $course9 = new Course();
        $course9->type = 'Món ăn cho trẻ';
        $course9->save();
    }
}
