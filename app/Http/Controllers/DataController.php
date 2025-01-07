<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Artist;
use App\Models\Genre;

use App\Models\Book;
use App\Models\Author;
class DataController extends Controller
{
    function index(Request $request){
        // $songs = Song::all();
        // return response()->json($songs);

        // $song = Song::find(2);
        // $song = Song::where('id','=',2)->first();
        // $song = Song::where('id', 2)->first();

        // $songs = Song::where('id','<', 5)->get();

        // $song = Song::where('title','Thriller')->get();
        // $song = Song::whereTitle('Thriller')->get();
        // $song = Song::whereArtist_id('1')->get();
        // $songs = Song::where('year','<',1985)->where('title','LIKE','t%')->get();

        // $song = Song::find(20);
        // $song->title = 'Public Dancer';
        // $song->save();
        // return response()->json($song);

        // Artist::insert([
        //     'name'=>'Guns N Roses'
        // ]);

        // $song = [
        //     'title'=>'November Rain',
        //     'year'=>1984,
        //     'artist_id'=>13,
        //     'genre_id'=>1
        // ];
        // $song = Song::create($song);

        // $songs = Song::with('artist','genre')->orderBy('title')->get();
        // $songs = Song::with('artist')->orderBy('title')->get();
        // $songs->map(function($song){
        //     echo $song->title.' - '.$song->artist->name.'<br>';
        //     // echo $song->title.' - '.$song->artist->name.' - '.$song->genre->name.'<br>';
        // });
        // return response()->json($songs);

        // $artist = Artist::with('songs')->find(1);
        // $artist = Artist::with('songs')->whereIn('id',[1,2])->get();
        // $artist = Artist::with('songs')->whereId(1)->get();
        // $artist = Artist::with('songs')->whereName('Madonna')->get();
        // return response()->json($artist->songs);
        // return response()->json($artist);

        // $songs = Genre::with('songs')->find(1);
        // return response()->json($songs);

        // $songs= Song::all();
        // foreach($songs as $song){
        //     echo $song->title.'<br>';
        // }

        // $songs->map(function($song){
        //     echo $song->title.'<br>';
        // });

        //$songs= Song::pluck('title'); //->toArray();
        // return response()->json($songs);
    }

    function books(Request $request){
        // $books = Book::with('authors')->get();
        // return response()->json($books);
        $authors = Author::with('books')->get();
        return response()->json($authors);

        // $author = Author::with('books')->find(1);

        // return response()->json($author);
    }

    function insertBooks(Request $request){
        $author = Author::where("name",'Jack London')->first();
        $book = new Book();
        $book->title = "Call of the wild";
        $book->save();
        $book->authors()->attach($author);
        return response()->json($book);
    }

    function insertSong(){
        $genre = Genre::where("name",'Disco')->first();
        $artist = Artist::find(13);

        $song = new Song();
        $song->title = "November Rain";
        $song->year = 1984;
        $song->artist()->associate($artist);
        $song->genre()->associate($genre);
        $song->save();

        return response()->json($song);
    }

    function songs(Request $request){
        $songs = Song::with('artist','genre')->paginate(5);
        return response()->json($songs);
    }
}
