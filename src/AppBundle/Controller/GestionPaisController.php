<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Form\PaisType;
use AppBundle\Form\ProvinciaType;
use AppBundle\Form\ModifPaisType;
use AppBundle\Form\ModifProvinciaType;

use AppBundle\Entity\Pais;
use AppBundle\Entity\Provincia;

class GestionPaisController extends Controller 
{
    //              Enrutamiento a alta país

    /**
     * @Route("/altapais/{id}", name="altapais")
     */
   

     //             Ruta principal 

     public function altaPais(Request $request, $id=null) 
     {
         if($id)

         {
            $paisRepository = $this->getDoctrine()->getRepository(Pais::class);
            $pais = $paisRepository->find($id);

         }else{

            $pais = new Pais();

         }

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
     * @Route("/altaprovincia/{id}", name="altaprovincia")
     */


    public function altaProvincia(Request $request, $id=null) 
    {

      if($id)

         {
            $provinciaRepository = $this->getDoctrine()->getRepository(Provincia::class);
            $provincia = $provinciaRepository->find($id);

         }else{

            $provincia = new Provincia();

         }

      
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


    //              Enrutamiento a modifPais

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

     //              Enrutamiento a modifProvincia

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

   //              Enrutamiento a EDICION PAÍS

   /**
   * @Route("/editpais/{id}", name="editPais")
   */
   

   //             Ruta principal 

   public function editPais(Request $request, $id=null) 
   {
      if($id)

      {
         $paisRepository = $this->getDoctrine()->getRepository(Pais::class);
         $pais = $paisRepository->find($id);

      }else{

         $pais = new Pais();

      }

      //          Se construye el formulario

      $form = $this->createForm(ModifPaisType::class, $pais);

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
 
      return $this->render('editPais.html.twig',array('form'=> $form->createView()));
 
   }

   //              Enrutamiento a EDICION PROVINCIA

   /**
   * @Route("/editprovincia/{id}", name="editProvincia")
   */
   

   //             Ruta principal 

   public function editProvincia(Request $request, $id=null) 
   {
      if($id)

      {
         $provinciaRepository = $this->getDoctrine()->getRepository(Provincia::class);
         $provincia = $provinciaRepository->find($id);

      }else{

         $provincia = new Provincia();

      }

      //          Se construye el formulario

      $form = $this->createForm(ModifProvinciaType::class, $provincia);

      //          Se agarra la información

      $form->handleRequest($request);

      //          Si es válida entra al if y se almacena

      if($form->isSubmitted() && $form->isValid()){

         //      Se rellena la info

         $pais = $form->getData();

         //      Se almacena el pais en la base de datos

         $em= $this->getDoctrine()->getManager();
         $em->persist($provincia);
         $em->flush();
         return $this->redirectToRoute('provincias');
      }

      //     Muestra /index
 
      return $this->render('editProvincia.html.twig',array('form'=> $form->createView()));
 
   }

   //              Enrutamiento a borrado de país

   /**
   * @Route("/borrarpais/{id}", name="borrarPais")
   */
   

   //             Ruta principal 

   public function borrarPais(Request $request, $id=null) 
   {

      if($id)

      {
         //busqueda
         $paisRepository = $this->getDoctrine()->getRepository(Pais::class);
         $pais = $paisRepository->find($id);
         //borrado
         $em= $this->getDoctrine()->getManager();
         $em->remove($pais);
         $em->flush();

      }

      return $this->redirectToRoute('paises');
      
   }

   //              Enrutamiento a borrado de provincia

   /**
   * @Route("/borrarprovincia/{id}", name="borrarProvincia")
   */
   

   //             Ruta principal 

   public function borrarProvincia(Request $request, $id=null) 
   {

      if($id)

      {
         //busqueda
         $provinciaRepository = $this->getDoctrine()->getRepository(Provincia::class);
         $provincia = $provinciaRepository->find($id);
         //borrado
         $em= $this->getDoctrine()->getManager();
         $em->remove($provincia);
         $em->flush();

      }

      return $this->redirectToRoute('provincias');
      
   }

}