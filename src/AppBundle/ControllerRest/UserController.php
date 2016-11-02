<?php
/**
 * Created by PhpStorm.
 * User: 11400277
 * Date: 31/10/2016
 * Time: 12:25
 */

namespace AppBundle\ControllerRest;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @Route("users", name="get_users")
     * @Method({"GET"})
     * @return Response
     */
    public function getUsersAction()
    {
        $query = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();

        if ($query != null)
            $output = array('users' => $query);
        else
            $output = null;

        $serializedEntity = $this->container->get('serializer')->serialize($output, 'json');
        return new Response($serializedEntity);
    }

    /**
     * @Route("/users/{id}", name="get_user", requirements={"id": "\d+"})
     * @Method({"GET"})
     * @param $id
     * @return Response
     */
    public function getUserAction($id)
    {
        $query = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);

        $serializedEntity = $this->container->get('serializer')->serialize($query, 'json');
        return new Response($serializedEntity);
    }
}