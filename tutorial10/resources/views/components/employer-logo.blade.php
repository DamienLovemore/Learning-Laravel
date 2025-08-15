@props(["id" => rand(0, 100000), "size" => 42])

@php
    use App\Models\Employer;

    $employer = Employer::find($id);
    if(empty($employer))
    {
        $id  = rand(0, 100000);
        $url = "https://picsum.photos/seed/$id/$size";
    }
    else
        $url = asset("/storage/" . $employer->logo);
@endphp

<img src="{{ $url }}" alt="Employer Logo" class="rounded-xl" style="width: {{$size}}px;height: {{$size}}px;">
