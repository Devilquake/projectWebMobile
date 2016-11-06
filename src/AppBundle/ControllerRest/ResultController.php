<?php
/**
 * Created by PhpStorm.
 * User: 11400277
 * Date: 31/10/2016
 * Time: 12:39
 */

namespace AppBundle\ControllerRest;

use AppBundle\Entity\Results;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ResultController extends Controller
{
    /**
     * @Route("/results/{user_id}", name="get_user_results", requirements={"user_id": "\d+"})
     * @Method({"GET"})
     * @param $user_id
     * @return Response
     */
    public function getUserResultAction($user_id)
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

    /**
     * @Route("/results/new/{user_id}", name="post_user_results", requirements={"user_id": "\d+"})
     * @Method({"POST"})
     * @param $user_id
     * @param Request $request
     * @return Response
     */
    public function postResultAction($user_id, Request $request)
    {
        $habit_1 = $request->request->get('habit1', null);
        $habit_2 = $request->request->get('habit2', null);
        $habit_3 = $request->request->get('habit3', null);
        $calories = $request->request->get('calories', null);
        $weight = $request->request->get('weight', null);
        $query = $this->getDoctrine()->getRepository('AppBundle:User')->find($user_id);

        if(
            $habit_1 != null &&
            $habit_2 != null &&
            $habit_3 != null &&
            $calories != null &&
            $weight != null &&
            $query != null
        )
        {
            $result = new Results();
            $result->setHabit1($habit_1);
            $result->setHabit2($habit_2);
            $result->setHabit3($habit_3);
            $result->setCalories($calories);
            $result->setWeight($weight);
            $result->setUser($user_id);
            $result->setCreatedAt(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($result);
            $em->flush();

            return var_dump(http_response_code(200));
        } else {
            return var_dump(http_response_code(400));
        }
    }

    /**
     * @Route("/results", name="export_results_CSV")
     */
    public function getResultsCSVAction()
    {
        $container = $this->container;
        $response = new StreamedResponse(function() use($container)
        {
            $em = $this->getDoctrine()->getManager();
            $results = $em->getRepository('AppBundle:Results')->findAll();
            $handle = fopen('php://output', 'r+');

            $headers = array(
                'Username',
                'FirstName',
                'LastName',
                'Habit1',
                'Habit2',
                'Habit3',
                'Calories',
                'Weight'
            );

            fputcsv($handle, $headers);

            foreach ($results as &$value) {

                $output = array(
                    $value->getUser()->getUsername(),
                    $value->getUser()->getFirstName(),
                    $value->getUser()->getLastName(),
                    ($value->getHabit1() == true) ? 'true' : 'false',
                    ($value->getHabit2() == true) ? 'true' : 'false',
                    ($value->getHabit3() == true) ? 'true' : 'false',
                    $value->getCalories(),
                    $value->getWeight()
                );

                fputcsv($handle, $output);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'application/force-download');
        $response->headers->set('Content-Disposition','attachment; filename="export.csv"');

        return $response;
    }
}