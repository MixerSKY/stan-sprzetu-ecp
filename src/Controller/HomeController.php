<?php

namespace App\Controller;

use App\Repository\ItemRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET', 'POST'])]
    public function index(Request $request, ItemRepository $itemRepository, EntityManagerInterface $entityManager): Response
    {
        //ZAPISYWANIE
        if ($request->isMethod('POST')) {
            
            $itemId = $request->request->get('item_id');
            $quantity = $request->request->get('quantity');
            $minLevel = $request->request->get('minLevel');
            $midLevel = $request->request->get('midLevel');
            $okLevel = $request->request->get('okLevel');

            // Wykonaj zapis TYLKO jeśli przysłano nam jakieś ID!
            if ($itemId) {
                $item = $itemRepository->find($itemId);

                if ($item) {
                    $item->setQuantity((int)$quantity);
                    $item->setMinLevel((int)$minLevel);
                    $item->setMidLevel((int)$midLevel);
                    $item->setOkLevel((int)$okLevel);

                    $entityManager->flush();
                }
            }

            return $this->redirectToRoute('app_home');
        }

        // WYŚWIETLANIE
        $allItems = $itemRepository->findAll();

        $categories = [];
        foreach ($allItems as $item) {
            $catName = $item->getCategory();
            if (!isset($categories[$catName])) {
                $categories[$catName] = [];
            }
            $categories[$catName][] = $item;
        }

        return $this->render('home/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}