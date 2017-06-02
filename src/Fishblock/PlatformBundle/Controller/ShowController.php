<?php
namespace Fishblock\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Adrenth\Thetvdb\ClientExtension;
use Adrenth\Thetvdb\ClientExtensionInterface;
use Symfony\Component\HttpKernel\Client;

class ShowController extends Controller
{
 public function indexAction($page, Request $request)
  {
    $client = new \Adrenth\Thetvdb\Client();
    $apiKey =    'C502C317FF9D25AC';
    $username =    'irvinz';
    $userKey =                 '17B57A0BBFF0D6F2';
    $token = $client->authentication()->login($apiKey, $username, $userKey);
    $client->setToken($token);


    $searchedName = "Lost";
    //$searchedName = $request->request->get('searchBar');
    $searchI = $client->search()->seriesByName($searchedName);	
    $search = $searchI['values'];
    $tab = ['1'=> '2', '5'=>"6"];
  
 

/*    $seriesName = $client->series()->get(78107)->getSeriesName();
	$banner = $client->series()->get(78107)->getBanner();
	$genre = $client->series()->get(78107)->getGenre();
	$overview = $client->series()->get(78107)->getOverview();*/
            
    $client->setLanguage('fr');

    // On ne sait pas combien de pages il y a
    // Mais on sait qu'une page doit être supérieure ou égale à 1
    if ($page < 1) {
      // On déclenche une exception NotFoundHttpException, cela va afficher
      // une page d'erreur 404 (qu'on pourra personnaliser plus tard d'ailleurs)
      throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    }
    //$client->search()->seriesByImdbId('tt2243973');
    //$client->search()->seriesByName('lost');
    return $this->render('FishblockPlatformBundle:Advert:index.html.twig',array(
        /*'seriesName'=>$seriesName,
        'banner' => $banner,
        'genre' => $genre,
        'overview' => $overview,*/
        'search' => $search,
        'tab' => $tab
    ));
  }



  public function viewAction($id)
  {
    // Ici, on récupérera l'annonce correspondante à l'id $id

    return $this->render('FishblockPlatformBundle:Advert:view.html.twig', array(
      'id' => $id
    ));
  }

}

//boucle sur les séries pour toutes les afficher ?
//$i = 0;
//(for ($i=0; $i < ; $i++) { 
//	$img = $client->series()->get($i)->getBanner;

//})

    
       