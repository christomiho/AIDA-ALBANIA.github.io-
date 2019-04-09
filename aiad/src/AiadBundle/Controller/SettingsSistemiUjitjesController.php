<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsSistemiUjitjes;
use AiadBundle\Form\SettingsSistemiUjitjesType;

/**
 * SettingsSistemiUjitjes controller.
 *
 * @Route("/konfigurime/sistemi_ujitjes")
 */
class SettingsSistemiUjitjesController extends Controller
{
    /**
     * Lists all SettingsSistemiUjitjes entities.
     *
     * @Route("/", name="settingssistemiujitjes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsSistemiUjitjes = $em->getRepository('AiadBundle:SettingsSistemiUjitjes')->findAll();

        return $this->render('settingssistemiujitjes/index.html.twig', array(
            'settingsSistemiUjitjes' => $settingsSistemiUjitjes,
        ));
    }

    /**
     * Creates a new SettingsSistemiUjitjes entity.
     *
     * @Route("/new", name="settingssistemiujitjes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsSistemiUjitje = new SettingsSistemiUjitjes();
        $form = $this->createForm('AiadBundle\Form\SettingsSistemiUjitjesType', $settingsSistemiUjitje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsSistemiUjitje);
            $em->flush();

            return $this->redirectToRoute('settingssistemiujitjes_index');
        }

        return $this->render('settingssistemiujitjes/new.html.twig', array(
            'settingsSistemiUjitje' => $settingsSistemiUjitje,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsSistemiUjitjes entity.
     *
     * @Route("/{id}", name="settingssistemiujitjes_show")
     * @Method("GET")
     */
    public function showAction(SettingsSistemiUjitjes $settingsSistemiUjitje)
    {
        $deleteForm = $this->createDeleteForm($settingsSistemiUjitje);

        return $this->render('settingssistemiujitjes/show.html.twig', array(
            'settingsSistemiUjitje' => $settingsSistemiUjitje,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsSistemiUjitjes entity.
     *
     * @Route("/{id}/edit", name="settingssistemiujitjes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsSistemiUjitjes $settingsSistemiUjitje)
    {
        $deleteForm = $this->createDeleteForm($settingsSistemiUjitje);
        $editForm = $this->createForm('AiadBundle\Form\SettingsSistemiUjitjesType', $settingsSistemiUjitje);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsSistemiUjitje);
            $em->flush();

            return $this->redirectToRoute('settingssistemiujitjes_index');
        }

        return $this->render('settingssistemiujitjes/edit.html.twig', array(
            'settingsSistemiUjitje' => $settingsSistemiUjitje,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsSistemiUjitjes entity.
     *
     * @Route("/{id}", name="settingssistemiujitjes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsSistemiUjitjes $settingsSistemiUjitje)
    {
        $form = $this->createDeleteForm($settingsSistemiUjitje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsSistemiUjitje);
            $em->flush();
        }

        return $this->redirectToRoute('settingssistemiujitjes_index');
    }

    /**
     * Creates a form to delete a SettingsSistemiUjitjes entity.
     *
     * @param SettingsSistemiUjitjes $settingsSistemiUjitje The SettingsSistemiUjitjes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsSistemiUjitjes $settingsSistemiUjitje)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingssistemiujitjes_delete', array('id' => $settingsSistemiUjitje->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
