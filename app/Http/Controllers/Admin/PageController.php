<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\Block;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return Page::orderBy('order', 'asc')->get();
    }

    public function page($id)
    {
        return Page::query()
            ->with(['blocks' => function ($query) {
                $query->orderBy('order', 'asc');
            }])
            ->find($id);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'blocks' => 'required',
        ]);

        $page = new Page();
        
        $page->name = $request->name;

        $page->save();

        foreach($request->blocks as $b)
        {
            $block = Block::find($b['id']);

            if(!$block) {
                $block = new Block();
            }

            $block->page_id = $page->id;
            $block->type = $b['type'];
            $block->content = $b['content'];
            $block->order = $b['order'];

            $block->save();
        }
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'blocks' => 'required',
        ]);

        $page = Page::find($id);
        
        $page->name = $request->name;

        $page->save();

        foreach($request->blocks as $b)
        {
            $block = Block::find($b['id']);

            if(!$block) {
                $block = new Block();
            }

            $block->page_id = $page->id;
            $block->type = $b['type'];
            $block->content = $b['content'];
            $block->order = $b['order'];

            $block->save();
        }
    }
}
