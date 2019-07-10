<?php
 
namespace App\Transformers;
 
use App\News;
use League\Fractal\TransformerAbstract;
 
class NewsTransformer extends TransformerAbstract
{
    public function transform(News $news)
    {
        return [
            'id' => (int) $news->id,
            'name' => $news->name,
            'description' =>$news->description,
            'writer_name' => $news->writer->first_name . " " . $news->writer->second_name,
        ];
    }
}