<h1>{{ $user->name }}</h1>

<?php $no=1; ?>
@foreach ($movies as $movie)

<ul class="movie">
  <li class="movie-title-{{$no++}}"}>Title: {{ ucwords($movie->title) }}</li>
  <li>Released In: {{ $movie->release_date }}</li>
</ul>

@endforeach