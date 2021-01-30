<?php

namespace App\Controller\Api;

use App\Entity\User;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\RegistroUserType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpClient\HttpClient;
use Psr\Log\LoggerInterface;


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
        UserPasswordEncoderInterface $userPasswordEncoder, 
        EntityManagerInterface $em,
        Request $request
    ){
        $user = new User();
        $form =$this->createForm(RegistroUserType::class, $user);
        $form->handleRequest($request);
        if($form-> isSubmitted()&& $form->isValid()){
            $user->setPassword($userPasswordEncoder->encodePassword($user, $form['password']->getData()));
            $em->persist($user);
            $em->flush();
            return $user;
        }        
    }

    /**
     * @Rest\Get(path="/paises")
     */
    public function ObtenerPaises(){

        $client = HttpClient::create ([
            'headers' => [
            'x-rapidapi-key' => 'a9081dac8bmsh7ba2557e231a49fp1299c9jsn8345f272d20b',
            'x-rapidapi-host' => 'restcountries-v1.p.rapidapi.com',
            'useQueryString' => 'true',
            ]]);
        $response = $client->request(
          'GET',
          'https://restcountries-v1.p.rapidapi.com/all', 
        );
     
        $content = $response->toArray();
        //$logger->info($content);

        $pais=array_column($content,'name');
        return $pais[0];
        //return var_dump($pais);

    }



}
