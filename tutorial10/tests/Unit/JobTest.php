<?php
use App\Models\Employer;
use App\Models\Job;

test('it belongs to an employer', function () {
    //Arrange
    $employer = Employer::factory()->create();
    $job      = Job::factory()->create([
        "employer_id" => $employer->id
    ]);

    //Act and Assert
    expect($job->employer()->is($employer))->toBeTrue(true);
});

test("can have tags", function(){
    //Arrange
    $job = Job::factory()->create();

    $job->tag("Frontend");

    expect($job->tags)->toHaveCount(1);//Countable or Iterable can be used in HavaCount (array, etc)
});
