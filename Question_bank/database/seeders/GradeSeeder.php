<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grade;
class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            ['name' => 'الأول', 'slug' => 'grade-1', 'stage' => 'primary'],
            ['name' => 'الثاني', 'slug' => 'grade-2', 'stage' => 'primary'],
            ['name' => 'الثالث', 'slug' => 'grade-3', 'stage' => 'primary'],
            ['name' => 'الرابع', 'slug' => 'grade-4', 'stage' => 'primary'],
            ['name' => 'الخامس', 'slug' => 'grade-5', 'stage' => 'primary'],
            ['name' => 'السادس', 'slug' => 'grade-6', 'stage' => 'primary'],
            ['name' => 'السابع', 'slug' => 'grade-7', 'stage' => 'middle'],
            ['name' => 'الثامن', 'slug' => 'grade-8', 'stage' => 'middle'],
            ['name' => 'التاسع', 'slug' => 'grade-9', 'stage' => 'middle'],
            ['name' => 'العاشر', 'slug' => 'grade-10', 'stage' => 'high'],
            ['name' => 'الحادي عشر - علمي', 'slug' => 'grade-11-sci', 'stage' => 'high'],
            ['name' => 'الحادي عشر - أدبي', 'slug' => 'grade-11-lit', 'stage' => 'high'],
            ['name' => 'الثاني عشر - علمي', 'slug' => 'grade-12-sci', 'stage' => 'high'],
            ['name' => 'الثاني عشر - أدبي', 'slug' => 'grade-12-lit', 'stage' => 'high'],
        ];
        foreach ($grades as $grade) {
            // البحث عن الصف بواسطة الـ slug، وإذا لم يجده ينشئه، وإذا وجده يحدّث البيانات
            Grade::updateOrCreate(['slug' => $grade['slug']], $grade);
        }
    }
}
