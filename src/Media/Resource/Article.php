<?php
namespace ISeeCoo\Media\Resource;

class Article {
    protected $title;
    protected $thumb_media_id;
    protected $author;
    protected $digest;
    protected $show_cover_pic;
    protected $content;
    protected $content_source_url;
    
    public function setTitle($data){
        $this->title = $data;
    }
    
    public function setThumb($data){
        $this->thumb_media_id = $data;
    }
    
    public function setAuthor($data){
        $this->author = $data;
    }
    
    public function setDigest($data){
        $this->digest = $data;
    }
    
    public function setShowCover($data){
        $this->show_cover_pic = $data;
    }
    
    public function setContent($data){
        $this->content = $data;
    }
    
    public function setSourceUrl($data){
        $this->content_source_url = $data;
    }
    
    public function getBody(){
        return [
            'title'=>$this->title,
            'thumb_media_id'=>$this->thumb_media_id,
            'author'=>$this->author,
            'digest'=>$this->digest,
            'show_cover_pic'=>$this->show_cover_pic,
            'content'=>$this->content,
            'content_source_url'=>$this->content_source_url
        ];
    }
}