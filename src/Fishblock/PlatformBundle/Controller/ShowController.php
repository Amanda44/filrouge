<?php
namespace Fishblock\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Adrenth\Thetvdb\Client;

class ShowController extends Controller
{
 public function indexAction($page)
  {
    // On ne sait pas combien de pages il y a
    // Mais on sait qu'une page doit être supérieure ou égale à 1
    if ($page < 1) {
      // On déclenche une exception NotFoundHttpException, cela va afficher
      // une page d'erreur 404 (qu'on pourra personnaliser plus tard d'ailleurs)
      throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    }

    // Ici, on récupérera la liste des annonces, puis on la passera au template

    // Mais pour l'instant, on ne fait qu'appeler le template
    return $this->render('FishblockPlatformBundle:Advert:index.html.twig');
  }

  public function viewAction($id)
  {
    // Ici, on récupérera l'annonce correspondante à l'id $id

    return $this->render('FishblockPlatformBundle:Advert:view.html.twig', array(
      'id' => $id
    ));
  }

}

$i = 0;
(for ($i=0; $i < ; $i++) { 
	$img = $client->series()->get($i)->getBanner;

})