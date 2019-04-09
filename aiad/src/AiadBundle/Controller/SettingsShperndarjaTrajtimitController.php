<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsShperndarjaTrajtimit;
use AiadBundle\Form\SettingsShperndarjaTrajtimitType;

/**
 * SettingsShperndarjaTrajtimit controller.
 *
 * @Route("/konfigurime/shperndarja_trajtimit")
 */
class SettingsShperndarjaTrajtimitController extends Controller
{
    /**
     * Lists all SettingsShperndarjaTrajtimit entities.
     *
     * @Route("/", name="settingsshperndarjatrajtimit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsShperndarjaTrajtimits = $em->getRepository('AiadBundle:SettingsShperndarjaTrajtimit')->findAll();

        return $this->render('settingsshperndarjatrajtimit/index.html.twig', array(
            'settingsShperndarjaTrajtimits' => $settingsShperndarjaTrajtimits,
        ));
    }

    /**
     * Creates a new SettingsShperndarjaTrajtimit entity.
     *
     * @Route("/new", name="settingsshperndarjatrajtimit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsShperndarjaTrajtimit = new SettingsShperndarjaTrajtimit();
        $form = $this->createForm('AiadBundle\Form\SettingsShperndarjaTrajtimitType', $settingsShperndarjaTrajtimit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsShperndarjaTrajtimit);
            $em->flush();

            return $this->redirectToRoute('settingsshperndarjatrajtimit_show', array('id' => $settingsShperndarjaTrajtimit->getId()));
        }

        return $this->render('settingsshperndarjatrajtimit/new.html.twig', array(
            'settingsShperndarjaTrajtimit' => $settingsShperndarjaTrajtimit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsShperndarjaTrajtimit entity.
     *
     * @Route("/{id}", name="settingsshperndarjatrajtimit_show")
     * @Method("GET")
     */
    public function showAction(SettingsShperndarjaTrajtimit $settingsShperndarjaTrajtimit)
    {
        $deleteForm = $this->createDeleteForm($settingsShperndarjaTrajtimit);

        return $this->render('settingsshperndarjatrajtimit/show.html.twig', array(
            'settingsShperndarjaTrajtimit' => $settingsShperndarjaTrajtimit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsShperndarjaTrajtimit entity.
     *
     * @Route("/{id}/edit", name="settingsshperndarjatrajtimit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsShperndarjaTrajtimit $settingsShperndarjaTrajtimit)
    {
        $deleteForm = $this->createDeleteForm($settingsShperndarjaTrajtimit);
        $editForm = $this->createForm('AiadBundle\Form\SettingsShperndarjaTrajtimitType', $settingsShperndarjaTrajtimit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsShperndarjaTrajtimit);
            $em->flush();

            return $this->redirectToRoute('settingsshperndarjatrajtimit_edit', array('id' => $settingsShperndarjaTrajtimit->getId()));
        }

        return $this->render('settingsshperndarjatrajtimit/edit.html.twig', array(
            'settingsShperndarjaTrajtimit' => $settingsShperndarjaTrajtimit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsShperndarjaTrajtimit entity.
     *
     * @Route("/{id}", name="settingsshperndarjatrajtimit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsShperndarjaTrajtimit $settingsShperndarjaTrajtimit)
    {
        $form = $this->createDeleteForm($settingsShperndarjaTrajtimit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsShperndarjaTrajtimit);
            $em->flush();
        }

        return $this->redirectToRoute('settingsshperndarjatrajtimit_index');
    }

    /**
     * Creates a form to delete a SettingsShperndarjaTrajtimit entity.
     *
     * @param SettingsShperndarjaTrajtimit $settingsShperndarjaTrajtimit The SettingsShperndarjaTrajtimit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsShperndarjaTrajtimit $settingsShperndarjaTrajtimit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsshperndarjatrajtimit_delete', array('id' => $settingsShperndarjaTrajtimit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
