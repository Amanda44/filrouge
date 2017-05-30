<?php
namespace Fishblock\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ShowController extends Controller
{
	public function viewAction($id, Request $request)
	{
    // On récupère notre paramètre tag
    $tag = $request->query->get('tag');

    return new Response(
      "Affichage de l'annonce d'id : ".$id.", avec le tag : ".$tag
    );
	}
}