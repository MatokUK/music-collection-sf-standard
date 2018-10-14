<?php

namespace Matok\Bundle\MusicBundle\Controller;

use Matok\Bundle\MusicBundle\Form\Type\AlbumType;
use Matok\Bundle\MusicBundle\Form\Type\DeleteEntryType;
use Matok\Bundle\MusicBundle\Paginator\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Matok\Bundle\MusicBundle\Entity\Album;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AlbumController extends Controller
{
    const ITEMS_PER_PAGE = 10;

    public function listAction(Request $request): Response
    {
        $albumRepository = $this->getDoctrine()->getRepository(Album::class);
        $paginator = new Paginator($albumRepository->count(), self::ITEMS_PER_PAGE);
        $paginator->setPage($request->query->getInt('page'));
        $albums = $albumRepository->getList($paginator->getLimit(), $paginator->getOffset());

        return $this->render('@Music/album/list.html.twig', [
            'albums' => $albums,
            'paginator' => $paginator,
        ]);
    }

    public function addAction(Request $request): Response
    {
        $form = $this->createForm(AlbumType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $albumRepository = $this->getDoctrine()->getRepository(Album::class);
            $albumRepository->save($form->getData());

            $this->addFlash('success', sprintf('New album was created!'));

            return $this->redirectToRoute('matok_album_list');
        }

        return $this->render('@Music/album/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function editAction(Request $request, int $id): Response
    {
        $albumRepository = $this->getDoctrine()->getRepository(Album::class);
        $album = $albumRepository->find($id);
        $this->checkAlbum($album);

        $form = $this->createForm(AlbumType::class, $album);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $albumRepository->save($form->getData());

            $this->addFlash('success', sprintf('Changes on album were saved!'));

            return $this->redirectToRoute('matok_album_list');
        }

        return $this->render('@Music/album/edit.html.twig', [
            'album' => $album,
            'form' => $form->createView(),
        ]);
    }

    public function removeAction(Request $request, int $id): Response
    {
        $albumRepository = $this->getDoctrine()->getRepository(Album::class);
        $album = $albumRepository->find($id);
        $this->checkAlbum($album);

        $form = $this->createForm(DeleteEntryType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('delete')->isClicked()) {
                $albumRepository->remove($id);
                $this->addFlash('deleted', sprintf('Album "%s" was deleted!', $album->getTitle()));
            }

            return $this->redirectToRoute('matok_album_list');
        }

        return $this->render('@Music/album/remove.html.twig', [
            'album' => $album,
            'delete_form' => $form->createView(),
        ]);
    }

    private function checkAlbum(?Album $album)
    {
        if (null == $album) {
            throw new NotFoundHttpException("Album not found!");
        }
    }
}
