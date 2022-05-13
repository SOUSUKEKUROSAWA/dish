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
        //$dishes=$tag->dishes()->paginate(5);
        $dishes=$tag->dishes()->get();
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
        //$dishes=$tag->dishes()->paginate(5);
        $dishes=$tag->dishes()->get();
        return view('dishes/search_dish')->with(['tag' => $tag, 'dishes' => $dishes ]);
    }
}
