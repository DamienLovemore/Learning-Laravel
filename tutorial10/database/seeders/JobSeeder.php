<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\Tag;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Creates 3 new tags
       // $tags = Tag::factory(3)->create();

        //hasAttached belongs to the BelongsTo or BelongsToMany. It is to attach a collection of models that the parent model have a relationship with
        //Sequence sometimes pick one, sometimes pick another
        $seq_type1 = [
            "featured" => false,
            "schedule" => "Full Time"
        ];
        $seq_type2 = [
            "featured" => true,
            "schedule" => "Part Time"
        ];
        $jobs = Job::factory(20)->create(new Sequence($seq_type1, $seq_type2));
        foreach($jobs as $job)//Foreach job creates 3 new tags
        {
            for($count = 1;$count <= 3;$count++)
            {
                $tag = Tag::factory()->create();
                $job->tags()->attach($tag);
            }
        }
    }
}
