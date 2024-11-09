<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


use App\Models\Movielist;
class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
    $Movielist = Movielist::all();
   
 
        $token = env('TMDB_TOKEN');
        $result = Http::get('https://api.themoviedb.org/3/movie/popular?api_key='.$token)
                    ->json()['results'];
        /* dump($result); */
        $upcomingMovies = Http::get('https://api.themoviedb.org/3/movie/upcoming?api_key='.$token)
                    ->json()['results'];
        /* \dump($upcomingMovies); */
        return view('home',[
            'Movies' => $result,
            'upcomingMovies' => $upcomingMovies,
            'Movielist'=> $Movielist
        ]);
    }

    
    public function show($id)
    {
        // $token = env('TMDB_TOKEN');
        // $success = Http::get("https://api.themoviedb.org/3/movie/$id/credits?api_key=".$token);
        // if($success->status() != 200 ) {
        //     $movieExist = false;
        //     $movievedio = [];
        //     $cast = [];
        //     $movie= [];
        // }
        // else {
        //     $movie = Http::get("https://api.themoviedb.org/3/movie/$id?api_key=".$token)
        //             ->json();
    
        // $movievedio = Http::get("https://api.themoviedb.org/3/movie/$id/videos?api_key=".$token)
        //             ->json();
        //     $cast = Http::get("https://api.themoviedb.org/3/movie/$id/credits?api_key=".$token)
        //             ->json()['cast'];
        //     $movieExist = true;
            
        // }
        $movie = Movielist::where('id', $id)->first();
        if ($movie) {
            return view('show', compact('movie'));
        } else {
            return redirect()->back()->with('error', 'Movie not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
