<h1>{{ $user->name }}</h1>

<div class="movie-list">
<?php $no=1; ?>
@foreach ($movies as $movie)

<ul class="movie">
  <li class="movie-title-{{$no++}}">Title: {{ $movie->title }}</li>
  <li>Released in: {{ date('Y', strtotime($movie->release_date)) }} ({{ $movie->years_ago() }} {{ str_plural('year', $movie->years_ago()) }} ago)</li>
</ul>

@endforeach
</div>