<?php
class CD
{
    private $album_title;
    private $artist_name;
    private $album_cover_art;

    function __construct($album_title, $artist_name)
    {
        $this->album_title = $album_title;
        $this->artist_name = $artist_name;
        $this->album_cover_art;
    }

    function getAlbumTitle() {
        return $this->album_title;
    }
    function getArtistTitle() {
        return $this->artist_name;
    }
    static function getAll() {
        return $_SESSION['list_of_cds'];
    }
    function save()
    {
        array_push($_SESSION['list_of_cds'], $this);
    }
    static function deleteAll()
    {
        return $_SESSION['list_of_cds'] = array();
    }

}

?>
