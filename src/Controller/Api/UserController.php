<?php

namespace App\Controller\Api;

use App\Entity\User;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\RegistroUserType;

class UserController extends AbstractFOSRestController
{
    /**
     * @Rest\Get(path="/user")
     * @Rest\View(serializerGroups={"user"}, serializerEnableMaxDepthChecks=true) 
     */
    public function getAction(
        UserRepository $userRepository
    ){
        return $userRepository->findAll();
    }

    /**
     * @Rest\Post(path="/user")
     * @Rest\View(serializerGroups={"user"}, serializerEnableMaxDepthChecks=true) 
     */
    public function postAction(
        EntityManagerInterface $em,
        Request $request
    ){
        $user = new User();
        $form =$this->createForm(RegistroUserType::class, $user);
        $form->handleRequest($request);
        if($form-> isSubmitted()&& $form->isValid()){
            $em->persist($user);
            $em->flush();
            return $user;

        }
        return $form;

    }

}
