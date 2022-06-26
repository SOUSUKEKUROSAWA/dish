<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function selecttag(Tag $tag)
    {
        return view('tags/select_tag')->with(['tags' => $tag -> getPaginateByLimit()]);
    }
    
    public function createtag(Tag $tag)
    {
        return view('tags/create_tag');
    }
    
    public function store(Tag $tag, TagRequest $request)
    {
        $input = $request['tag'];
        $tag->fill($input)->save();
        return redirect('/tags/' . $tag->id);
    }

    public function selectdish(Tag $tag)
    {
        $dishes=$tag->dishes()->orderBy('updated_at', 'DESC')->paginate(5);
        // $dishes=$tag::with('dishes')->orderBy('updated_at', 'DESC')->paginate(5);
        return view('dishes/select_dish')->with(['tag' => $tag, 'dishes' => $dishes ]);
    }

    public function createdish(Tag $tag)
    {
        return view('dishes/create_dish')->with(['tag' => $tag ]);
    }

    public function searchtag(Tag $tag)
    {
        return view('tags/search_tag')->with(['tags' => $tag -> getPaginateByLimit()]);
    }

    public function searchdish(Tag $tag)
    {
        $dishes=$tag->dishes()->orderBy('updated_at', 'DESC')->paginate(5);
        // $dishes=$tag::with('dishes')->orderBy('updated_at', 'DESC')->paginate(5);
        return view('dishes/search_dish')->with(['tag' => $tag, 'dishes' => $dishes ]);
    }
    
    public function randomtag(Tag $tag)
    {
        $randomtag=$tag::inRandomOrder()->first();
        return view('tags/randomtag')->with(['randomtag' => $randomtag ]);
    }
    
    public function randomdish(Tag $tag)
    {
        $randomdish=$tag->dishes()->get()->random(); // random()はコレクション型の関数（get()でhasManyオブジェクトからコレクションオブジェクトに変換）
        // $randomdish=$tag::with('dishes')->get()->random(); // random()はコレクション型の関数（get()でhasManyオブジェクトからコレクションオブジェクトに変換）
        return view('dishes/randomdish')->with(['tag' => $tag, 'randomdish' => $randomdish ]);
    }
}
