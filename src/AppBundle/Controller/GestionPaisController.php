<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Form\PaisType;
use AppBundle\Form\ProvinciaType;

use AppBundle\Entity\Pais;
use AppBundle\Entity\Provincia;

class GestionPaisController extends Controller 
{
    //              Enrutamiento a alta país

    /**
     * @Route("/altapais", name="altapais")
     */
   

     //             Ruta principal 

     public function altaPais(Request $request) 
     {
        $pais = new Pais();

        //          Se construye el formulario

        $form = $this->createForm(PaisType::class, $pais);

        //          Se agarra la información

         $form->handleRequest($request);

        //          Si es válida entra al if y se almacena

        if($form->isSubmitted() && $form->isValid()){

            //      Se rellena la info

            $pais = $form->getData();

            //      Se almacena el pais en la base de datos

            $em= $this->getDoctrine()->getManager();
            $em->persist($pais);
            $em->flush();
            return $this->redirectToRoute('paises');
        }

        //     Muestra /index
 
        return $this->render('altapais.html.twig',array('form'=> $form->createView()));
 
     }

     //              Enrutamiento a altaProvincia

    /**
     * @Route("/altaprovincia", name="altaprovincia")
     */


    public function altaProvincia(Request $request) 
    {

      $provincia = new Provincia();

      //          Se construye el formulario

      $form = $this->createForm(ProvinciaType::class, $provincia);

      //          Se agarra la información

      $form->handleRequest($request);

      //          Si es válida entra al if y se almacena

      if($form->isSubmitted() && $form->isValid())
      {

         //      Se rellena la info

         $provincia = $form->getData();

         //      Se almacena el pais en la base de datos

         $em= $this->getDoctrine()->getManager();
         $em->persist($provincia);
         $em->flush();
         return $this->redirectToRoute('provincias');
      }

      //     Muestra /index

      return $this->render('altaprovincia.html.twig',array('form'=> $form->createView()));

    }


    //              Enrutamiento a bajaPais

    /**
     * @Route("/modifpais", name="modifpais")
     */


     public function bajaPais(Request $request) 
     {

        $paisRepository = $this->getDoctrine()->getRepository(Pais::class);

        $pais = $paisRepository->findByActivo(1);


        //     Muestra /index
 
        return $this->render('modifpais.html.twig',array('paises'=>$pais));
 
     }

     //              Enrutamiento a bajaProvincia

    /**
     * @Route("/modifprovincia", name="modifprovincia")
     */


    public function bajaProvincia(Request $request) 
    {

       $provinciaRepository = $this->getDoctrine()->getRepository(Provincia::class);

       $provincia = $provinciaRepository->findByActivo(1);


       //     Muestra /index

       return $this->render('modifprovincia.html.twig',array('provincias'=>$provincia));

    }

}