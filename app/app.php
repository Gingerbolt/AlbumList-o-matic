<?php
date_default_timezone_set("America/Los_Angeles");
require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Src.php";

session_start();



if(empty($_SESSION['list_of_cds'])) {
    $_SESSION['list_of_cds'] = array();
}

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array("twig.path" => __DIR__."/../views"
));

$app->post("/delete_list", function() use ($app) {
    CD::deleteAll();
    return $app['twig']->render('delete_list.html.twig');
});

$app->post("/search", function () use ($app) {
    $searchresult = array();
    $albums = $_SESSION['list_of_cds'];
    foreach($albums as $album)
    {
        if ($album->getAlbumTitle() == $_POST['albumsearch'])
        {
            array_push($searchresult, $album);
        }
    }
    return
     $app["twig"]->render("search.html.twig",  array("albumresults" => $searchresult));

});

$app->get("/search", function () use ($app) {
    return
    $app["twig"]->render("search.html.twig" , array("albumresults" => CD::albumSearch()));
});

$app->get("/", function () use ($app) {
    return $app["twig"]->render("cdhome.html.twig", array("cds" => CD::getAll()));
});

$app->post("/cdsave", function() use ($app) {
    $cd = new CD($_POST['album'], $_POST['artist']);
    $cd->save();
    return $app['twig']->render('save_cd.html.twig', array('newcd' => $cd));
});

return $app;

?>
