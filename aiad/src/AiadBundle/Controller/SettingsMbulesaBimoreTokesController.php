<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsMbulesaBimoreTokes;
use AiadBundle\Form\SettingsMbulesaBimoreTokesType;

/**
 * SettingsMbulesaBimoreTokes controller.
 *
 * @Route("/konfigurime/mbulesa_bimore_tokes")
 */
class SettingsMbulesaBimoreTokesController extends Controller
{
    /**
     * Lists all SettingsMbulesaBimoreTokes entities.
     *
     * @Route("/", name="settingsmbulesabimoretokes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsMbulesaBimoreTokes = $em->getRepository('AiadBundle:SettingsMbulesaBimoreTokes')->findAll();

        return $this->render('settingsmbulesabimoretokes/index.html.twig', array(
            'settingsMbulesaBimoreTokes' => $settingsMbulesaBimoreTokes,
        ));
    }

    /**
     * Creates a new SettingsMbulesaBimoreTokes entity.
     *
     * @Route("/new", name="settingsmbulesabimoretokes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsMbulesaBimoreToke = new SettingsMbulesaBimoreTokes();
        $form = $this->createForm('AiadBundle\Form\SettingsMbulesaBimoreTokesType', $settingsMbulesaBimoreToke);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsMbulesaBimoreToke);
            $em->flush();

            return $this->redirectToRoute('settingsmbulesabimoretokes_index');
        }

        return $this->render('settingsmbulesabimoretokes/new.html.twig', array(
            'settingsMbulesaBimoreToke' => $settingsMbulesaBimoreToke,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsMbulesaBimoreTokes entity.
     *
     * @Route("/{id}", name="settingsmbulesabimoretokes_show")
     * @Method("GET")
     */
    public function showAction(SettingsMbulesaBimoreTokes $settingsMbulesaBimoreToke)
    {
        $deleteForm = $this->createDeleteForm($settingsMbulesaBimoreToke);

        return $this->render('settingsmbulesabimoretokes/show.html.twig', array(
            'settingsMbulesaBimoreToke' => $settingsMbulesaBimoreToke,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsMbulesaBimoreTokes entity.
     *
     * @Route("/{id}/edit", name="settingsmbulesabimoretokes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsMbulesaBimoreTokes $settingsMbulesaBimoreToke)
    {
        $deleteForm = $this->createDeleteForm($settingsMbulesaBimoreToke);
        $editForm = $this->createForm('AiadBundle\Form\SettingsMbulesaBimoreTokesType', $settingsMbulesaBimoreToke);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsMbulesaBimoreToke);
            $em->flush();

            return $this->redirectToRoute('settingsmbulesabimoretokes_index');
        }

        return $this->render('settingsmbulesabimoretokes/edit.html.twig', array(
            'settingsMbulesaBimoreToke' => $settingsMbulesaBimoreToke,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsMbulesaBimoreTokes entity.
     *
     * @Route("/{id}", name="settingsmbulesabimoretokes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsMbulesaBimoreTokes $settingsMbulesaBimoreToke)
    {
        $form = $this->createDeleteForm($settingsMbulesaBimoreToke);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsMbulesaBimoreToke);
            $em->flush();
        }

        return $this->redirectToRoute('settingsmbulesabimoretokes_index');
    }

    /**
     * Creates a form to delete a SettingsMbulesaBimoreTokes entity.
     *
     * @param SettingsMbulesaBimoreTokes $settingsMbulesaBimoreToke The SettingsMbulesaBimoreTokes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsMbulesaBimoreTokes $settingsMbulesaBimoreToke)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsmbulesabimoretokes_delete', array('id' => $settingsMbulesaBimoreToke->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
