<?php

namespace App\Controller;

use App\Form\RegistroUserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;



class UserController extends AbstractController
{

    /**
     * @Route("/registro", name="registrar_user")
     */
    public function index(
        UserPasswordEncoderInterface $userPasswordEncoder, 
        EntityManagerInterface $em,
        Request $request
    )
    {
        $user = new User();
        $form =$this->createForm(RegistroUserType::class, $user);
        $form->handleRequest($request);
        if($form-> isSubmitted()&& $form->isValid()){
            $user->setPassword($userPasswordEncoder->encodePassword($user, $form['password']->getData()));
            $em->persist($user);
            $em->flush();
            $this->addFlash('EXITO','Se ha registrado correctamente');
            return $this->redirectToRoute('registrar_user');
        }

        return $this->render(
            'user/index.html.twig',
            array('formulario_registro' => $form->createView()));
    }

}
