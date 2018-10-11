<?php

namespace Matok\Bundle\MusicBundle\Controller;

use Matok\Bundle\MusicBundle\Form\Type\AlbumType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Matok\Bundle\MusicBundle\Entity\Album;

class AlbumController extends Controller
{
    public function listAction(Request $request): Response
    {
        $doc = $this->getDoctrine();
        dump($doc);

        $product = new Album();
        $product->setTitle('Keyboard');

        $entityManager = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->render('@Music/album/list.html.twig');
    }

    public function addAction(Request $request): Response
    {
        $form = $this->createForm(AlbumType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $artist = $form->getData();
            dump($artist);
        }

        return $this->render('@Music/album/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
