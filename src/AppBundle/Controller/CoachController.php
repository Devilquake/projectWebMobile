<?php
/**
 * Created by PhpStorm.
 * User: 11400277
 * Date: 2/11/2016
 * Time: 14:06
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Habits;
use AppBundle\Entity\HabitsCombination;
use AppBundle\Entity\UserCurrentHabit;
use AppBundle\Form\HabitsCombinationType;
use AppBundle\Form\HabitsType;
use AppBundle\Form\UserCurrentHabitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;

class CoachController extends Controller
{
    /**
     * @Route("/habits/new", name="new_habit")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function new_habit(Request $request)
    {
        $habit = New Habits();
        $form = $this->createForm(HabitsType::class, $habit);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $this->storeRecord($habit);
            return $this->redirectToRoute('homepage', array('success' => true));
        } else {
            return $this->render('coach/new_habit.html.twig', array('form' => $form->createView()));
        }
    }

    /**
     * @Route("/habits/new/habits_combination", name="habits_combination")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function habits_combination(Request $request)
    {
        $habitCombination = New HabitsCombination();
        $form = $this->createForm(HabitsCombinationType::class, $habitCombination);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $this->storeRecord($habitCombination);
            return $this->redirectToRoute('homepage', array('success' => true));
        } else {
            return $this->render('coach/new_habit_combination.html.twig', array('form' => $form->createView()));
        }
    }

    /**
     * @Route("/test", name="current_habit")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function current_habit(Request $request)
    {
        $userCurrentHabit = New UserCurrentHabit();
        $form = $this->createForm(UserCurrentHabitType::class, $userCurrentHabit);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            /*
             * Nog een check maken of deze bestaat, zoja niet toevoegen maar updaten
             */
            //$this->storeRecord($userCurrentHabit);
            return $this->redirectToRoute('homepage', array('success' => true));
        } else {
            return $this->render('coach/new_habit_combination.html.twig', array('form' => $form->createView()));
        }
    }

    private function storeRecord($record){
        $em = $this->getDoctrine()->getManager();
        $em->persist($record);
        $em->flush();


        $this->addFlash('success', true);
    }
}