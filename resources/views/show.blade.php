@extends('layouts.app')
@section('content')

    <div class="mt-4 container mx-auto flex flex-col sm:flex-row" id="bgdiv">
            <div class="title">
                @section('title')
                    {{ $movie['title'] }}
                @endsection

            
                  <div class="text-white opacity-25  text-2xl">{{ $movie['title'] }}</div>
                <div class="mt-2 flex flex-col sm:flex-row">
                    <div class="image text-center ">
                    <img src="{{ asset('storage/poster_files/'.$movie['poster_path'] ) }}" class="w-48 sm:w-24 md:w-32 lg:w-full" alt="">
                    </div>
                    <div class="video ml-12 ">
                     
                   
   
  <video id="player" playsinline controls data-poster="{{ asset('storage/poster_files/'.$movie['background_path'] ) }}">
  <source src="{{ asset('storage/movie_files/'.$movie['path_movie']) }}" type="video/mp4" />

  @empty($movie['subtitle_link'])
  @else
  @foreach($movie['subtitle_link'] as $subtitle)

  <track kind="captions" label="{{$subtitle['lang']}}" src="{{ asset('storage/subtitle_files/'.$subtitle['src']) }}" srclang="en" default />
    @endforeach
    @endempty
 
</video>


                   
                        <div class="plot mt-2 text-white opacity-50 font-semibold text-sm">Overview</div>
                        <div class="description mt-2 text-sm text-gray-700 font-semibold">
                            <p style="width: 640px">{{ $movie['overview'] }} </p>
                        </div>
                        
                    </div>
                </div>
            </div>
    </div>
    <script>
  const player = new Plyr('#player');


  // $(document).ready(function() {
  //       // Set background image dynamically
  //       $('#bgdiv').css('background-image', 'url("{{ asset('storage/poster_files/'.$movie['background_path'] ) }}")');
  //       $('#bgdiv').css('background-size', 'cover');
  //       $('bgdiv').css('background-position', 'center');
  //   });
</script>
@endsection