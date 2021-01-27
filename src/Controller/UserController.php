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
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class UserController extends AbstractController
{

    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
    
    }

    /**
     * @Route("/user/list", name="user_list")
     */
    public function list(UserRepository $userRepository){
        $response= new JsonResponse();
        $users= $userRepository->findAll();
        $usersasArray=[];
        foreach($users as $user){
            $usersasArray[]=[
                'id'=>$user->getId(),
                'nombre'=>$user->getNombre()
            ];
        }

        $response->setData([
            'success'=>true,
            'data'=>$usersasArray
        ]);
        return $response;

    }

    /**
     * @Route("/user/crear", name="user_crear")
     */
    public function createUser(Request $request, EntityManagerInterface $em)
    {
        $user= new User();
        $response=new JsonResponse();


        //ejemplo para validar el nombre que viene por parametro y obtenemos por request
        /*$nombre=$request->get('nombre',null);
        if (empty($nombre)){
            $response->setData([
            'success'=>true,
            'error'=>'nombre en blanco'
            'data'=>null;
            ]);
        return $response;
        }*/


        
        $user->setNombre('ale');
        $user->setApellido('durand');
        $user->setCedula('252525252525');
        $user->setPassword('123456');
        $user->setPais('Cuba');
        $user->setRoles(['ROLE_GESTOR']);
        $user->setEmail('durandale4@gmail.com');


        $em->persist($user);
        $em->flush();

        
        $response->setData([
            'success'=>true,
            'data'=>[
                [
                    'id'=>$user->getId(),
                    'nombre'=>$user->getNombre()
                ]
            ]
        ]);
        return $response;
    }

    
    /**
     * @Route("/paises", name="mostar_paises")
     */
    public function fetchCountries():array{

        $response = $this->client->request(
          'GET',
          'https://restcountries-v1.p.rapidapi.com/all',
          [
           'headers' => [
            'x-rapidapi-key' => 'a9081dac8bmsh7ba2557e231a49fp1299c9jsn8345f272d20b',
           'x-rapidapi-host' => 'restcountries-v1.p.rapidapi.com',
            'useQueryString' => 'true',
           ]
          
          ]
        );
     
     $content = $response->toArray();
     
     return $content;
     
     }
}
