<?php

namespace App\Api\Controllers;

use Illuminate\Http\Request;
use Dingo\Api\Exception\ValidationHttpException;
use App\News;
use App\Writer;
use App\Transformers\NewsTransformer;

/**
 * News resource representation.
 *
 * @Resource("News", uri="/news")
 */
class NewsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show all news
     *
     * Get a JSON representation of all the registered news paginated by 2 records per page.
     * @Get("/")
     * @Versions({"v1"})
     * @Request(headers={"Content-Type="application/json", "Accept="application/json"})
     * @Response(200, body={"id": "id of new item", "title": "", "description":"", "writer":""})
     */
    public function index()
    {
        $news = News::paginate(2);
        return $this->response->paginator($news, new NewsTransformer)->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Create new news
     *
     * Register a new news with a `title`, `description` and `writer_id`.
     * @Post("/create")
     * @Versions({"v1"})
     * @Request({"title":"new news title", "description":"new news desc", "writer_id":"1"}, 
     *          headers={"Content-Type="application/json", "Accept="application/json"})
     */
    public function store(Request $request)
    {
        $news = new News;
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->writer_id = $request->input('writer_id');
        if ( $news->save() ) {
            echo "Successfully Created";
            return $this->response->created();
        } else {
            return $this->response->errorBadRequest();
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show specific record in news by its id
     *
     * @Get("/{{news}}")
     * @Versions({"v1"})
     * @Request({"title":"", "description":"", "writer_id":""}, 
     *          headers={"Content-Type="application/json", "Accept="application/json"})
     */
    public function show(News $news)
    {
        return $this->item($news, new NewsTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Update speific record in news by its id
     *
     * @Put("/{{news}}/edit")
     * @Versions({"v1"})
     * @Request({"method":"put", title": "editted news title", "description": "editted news desc", "writer_id":"2"}, 
     *          headers={"Content-Type="application/json", "Accept="application/json"})
     */
    public function update(Request $request, News $news)
    {
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->writer_id = $request->input('writer_id');
        if ($news->save()){
            return $this->response->array("Successfully Updated");
        }else{
            return $this->response->errorBadRequest();
        }
    }

    /**
     * Remove the specified resource from storage.
     *     
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Delete specific record in news by its id
     *
     * @Delete("/{{news}}")
     * @Request(headers={"Content-Type="application/json", "Accept="application/json"})
     * @Response(200, body={"id": "id of deleted item", "status": "Deleted"})
     */
    public function softDelete($id)
    {
        if (News::destroy($id)) {
            return $this->response->array([
                'id' => $id, 
                'status' => 'Deleted'
            ]);
        }
        else{
            return "Not Deleted";
        }
    }
}