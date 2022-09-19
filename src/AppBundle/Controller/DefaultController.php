<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\PaisType;
use AppBundle\Form\ProvinciaType;
use AppBundle\Entity\Pais;
use AppBundle\Entity\Provincia;

class DefaultController extends Controller
{

    //              Enrutamiento a la raíz del proyecto

    /**
     * @Route("/", name="")
     */

     //             Ruta principal 

    public function paginaPrincipalAction(Request $request)
    
    {
        //          Muestra /index

        return $this->render('index.html.twig');

    }


    //              Enrutamiento a la raíz del proyecto

     /**
     * @Route("/index", name="index")
     */

     //             Ruta principal

    public function indexAction(Request $request)

    {

        //          Muestra /index
        
        return $this->render('index.html.twig');

    }


    //              Enrutamiento a /paises

     /**
     * @Route("/paises", name="paises")
     */

    public function paginaPaisesAction(Request $request)

    {
        //           Se captura el repositorio de la tabla en la BD

        $paisRepository = $this->getDoctrine()->getRepository(Pais::class);

        //           Trae toda la info de la tabla País

        $pais = $paisRepository->findByActivo(1);

        //           Muestra /paises

        return $this->render('paises.html.twig',array('paises'=>$pais));

    }


    //              Enrutamiento a /provincias
    
     /**
     * @Route("/provincias", name="provincias")
     */

    public function paginaProvinciasAction(Request $request)

    {
        //          Se captura el repositorio de la tabla en la BD

        $provinciaRepository = $this->getDoctrine()->getRepository(Provincia::class);

        //          Trae toda la info de la tabla Provincia

        $provincia = $provinciaRepository->findByActivo(1);
        
        //          Muestra /provincias

        return $this->render('provincias.html.twig',array('provincias'=>$provincia));

    }

}
