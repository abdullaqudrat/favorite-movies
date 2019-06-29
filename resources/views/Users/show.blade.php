

    @extends('layouts.app')

    @section('content')
    
    
    @if (Auth::user() && Auth::user()->name == $user->name)
        <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Dashboard</div>
            
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            <h1>{{ $user->name }}</h1>

                            <h3>Your top 5 favorite movies</h3>
                            
                            <div class="movie-list">
                                <?php $no=1; ?>
                                @foreach ($movies as $movie)
                                    <ul class="movie">
                                        <li class="movie-title-{{$no++}}" value={{$movie->id}}>Title: {{ $movie->title }}</li>
                                        <li>Released in: {{ date('Y', strtotime($movie->release_date)) }} ({{ $movie->years_ago() }} {{ str_plural('year', $movie->years_ago()) }} ago)</li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Not Available</div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @endsection

