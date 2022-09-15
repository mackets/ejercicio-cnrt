<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\PaisType;
use AppBundle\Entity\Pais;

class GestionPaisController extends Controller 
{
    //              Enrutamiento a la raíz del proyecto

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

}