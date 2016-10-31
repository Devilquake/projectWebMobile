<?php
/**
 * Created by PhpStorm.
 * User: 11400277
 * Date: 31/10/2016
 * Time: 12:30
 */

namespace AppBundle\ControllerRest;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserCurrentHabitController extends Controller
{
    /**
     * @Route("/userhabits/{user_id}", name="get_user_habits", requirements={"user_id": "\d+"})
     * @Method({"GET"})
     * @param $user_id
     * @return Response
     */
    public function getUserCurrentHabitAction($user_id)
    {
        $query = $this->getDoctrine()->getRepository('AppBundle:UserCurrentHabit')->findOneBy(array("user" => $user_id));

        if($query != null)
        {
            $output = array(
                'user' => $query->getUser()->getId(),
                'habits_combination' => $query->getHabitsCombination()
            );
        } else {
            $output = null;
        }

        $serializedEntity = $this->container->get('serializer')->serialize($output, 'json');
        return new Response($serializedEntity);
    }
}