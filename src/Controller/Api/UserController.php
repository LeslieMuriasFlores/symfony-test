<?php

namespace App\Controller\Api;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;

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

}
