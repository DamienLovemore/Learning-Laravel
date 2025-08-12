@props(["id" => rand(0, 100000), "size" => 42])
<img src="https://picsum.photos/seed/{{ $id }}/{{ $size }}" alt="" class="rounded-xl">
