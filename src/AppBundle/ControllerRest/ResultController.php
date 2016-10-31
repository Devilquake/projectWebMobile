<?php
/**
 * Created by PhpStorm.
 * User: 11400277
 * Date: 31/10/2016
 * Time: 12:39
 */

namespace AppBundle\ControllerRest;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ResultController extends Controller
{
    /**
     * @Route("/results/{user_id}", name="get_user_results", requirements={"user_id": "\d+"})
     * @Method({"GET"})
     * @param $user_id
     * @return Response
     */
    public function getUserCurrentHabitAction($user_id)
    {
        $query = $this->getDoctrine()->getRepository('AppBundle:Results')->findBy(array("user" => $user_id));

        if ($query != null) {
            $output = array(
                'user' => $query[0]->getUser(),
                'results' => array()
            );

            foreach ($query as $value) {
                array_push($output['results'], array(
                    'habit1' => $value->getHabit1(),
                    'habit2' => $value->getHabit2(),
                    'habit3' => $value->getHabit3(),
                    'calories' => $value->getCalories(),
                    'weight' => $value->getWeight(),
                    'created_at' => $value->getCreatedAt(),
                    'habits_combination' => $value->getHabitsCombination(),
                ));
            }
        } else {
            $output = null;
        }

        $serializedEntity = $this->container->get('serializer')->serialize($output, 'json');
        return new Response($serializedEntity);
    }
}