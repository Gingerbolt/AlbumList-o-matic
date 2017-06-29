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
        for ($x = 1; ; $x += 1)
        {
        $session_argument = "list_of_cds" . $x;
        array_push($_SESSION[$session_argument], $this);
        break;
        }
    }
    static function deleteAll()
    {
        return $_SESSION['list_of_cds'] = array();
    }

}

?>
