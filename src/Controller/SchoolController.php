<?php


namespace App\Controller;


use App\Service\CreatorFactory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SchoolController extends AbstractController
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route("/create", name: "create", methods: ['POST'])]
    public function createSchoolAction(Request $request): JsonResponse
    {
        $requestArray = json_decode($request->getContent(), true);
        $factory = CreatorFactory::create($requestArray);
        $object = $factory->createObj($requestArray);
        $this->em->persist($object);
        $this->em->flush();
        return new JsonResponse($factory->msg(), 200);
    }
}