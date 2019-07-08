<?php

namespace App\Api\Controllers;

use Illuminate\Http\Request;
use Dingo\Api\Exception\ValidationHttpException;
use App\News;
use App\Writer;

class NewsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return News::with('writer')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News;

        $news->name = $request->input('name');

        $news->description = $request->input('description');

        $news->writer_id = $request->input('writer_id');

        $news->save();

        return $this->response->array($news->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return $this->response->array($news->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $news->name = $request->input('name');

        $news->description = $request->input('description');

        $news->writer_id = $request->input('writer_id');

        $news->save();

        return $this->response->array($news->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *     
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id)
    {
        $news = News::destroy($id);

        $deleted_news = News::onlyTrashed()->get();

        return $this->response->array($deleted_news->toArray());

    }
}