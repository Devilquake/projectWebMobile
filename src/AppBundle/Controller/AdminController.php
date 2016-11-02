<?php
/**
 * Created by PhpStorm.
 * User: 11400277
 * Date: 2/11/2016
 * Time: 12:38
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AdminController
 * @package AppBundle\Controller
 */
class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
        return $this->render('admin/index.html.twig', array('users' => $users));
    }

    /**
     * @Route("/admin/new", name="user_new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function user_new(Request $request)
    {
        return $this->render('admin/new.html.twig');
    }

    /**
     * @Route("/admin/read/{id}", name="user_read", requirements={"id": "\d+"})
     */
    public function user_read($id)
    {
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        return $this->render('admin/user.html.twig', array('user' => $users));
    }

    /**
     * @Route("/admin/edit/{id}", name="user_edit", requirements={"id": "\d+"})
     */
    public function user_edit($id)
    {
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        return $this->render('admin/edit.html.twig', array('user' => $users));
    }
}