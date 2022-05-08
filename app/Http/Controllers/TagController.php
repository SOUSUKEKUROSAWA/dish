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
        $input = $request['tag_name'];
        $tag->fill($input)->save();
        return redirect('/tags/' . $tag->id);
    }
}
