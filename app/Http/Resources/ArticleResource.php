<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use View;
class ArticleResource extends JsonResource
{

    public function toArray($request)
    {
        $options = view('admin.articles.parts.options', ['instance' => $this])->render();
        $photo = view('admin.articles.parts.photo', ['instance' => $this])->render();
        $status = view('admin.articles.parts.status', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'photo' => $photo,
            'title_ar' => $this->title_ar,
            'title_en' => $this->title_en,
            'language' => $this->language,
            'publisher_name' => $this->publisher_name,
            'publish_date' => $this->publish_date,
            'status' => $status,
            'actions' => $options
        ];
    }
}
