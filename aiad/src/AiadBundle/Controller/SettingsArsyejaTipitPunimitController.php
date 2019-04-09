<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsArsyejaTipitPunimit;
use AiadBundle\Form\SettingsArsyejaTipitPunimitType;

/**
 * SettingsArsyejaTipitPunimit controller.
 *
 * @Route("/konfigurime/arsyeja_tipit_punimit")
 */
class SettingsArsyejaTipitPunimitController extends Controller
{
    /**
     * Lists all SettingsArsyejaTipitPunimit entities.
     *
     * @Route("/", name="settingsarsyejatipitpunimit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsArsyejaTipitPunimits = $em->getRepository('AiadBundle:SettingsArsyejaTipitPunimit')->findAll();

        return $this->render('settingsarsyejatipitpunimit/index.html.twig', array(
            'settingsArsyejaTipitPunimits' => $settingsArsyejaTipitPunimits,
        ));
    }

    /**
     * Creates a new SettingsArsyejaTipitPunimit entity.
     *
     * @Route("/new", name="settingsarsyejatipitpunimit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsArsyejaTipitPunimit = new SettingsArsyejaTipitPunimit();
        $form = $this->createForm('AiadBundle\Form\SettingsArsyejaTipitPunimitType', $settingsArsyejaTipitPunimit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsArsyejaTipitPunimit);
            $em->flush();

            return $this->redirectToRoute('settingsarsyejatipitpunimit_index');
        }

        return $this->render('settingsarsyejatipitpunimit/new.html.twig', array(
            'settingsArsyejaTipitPunimit' => $settingsArsyejaTipitPunimit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsArsyejaTipitPunimit entity.
     *
     * @Route("/{id}", name="settingsarsyejatipitpunimit_show")
     * @Method("GET")
     */
    public function showAction(SettingsArsyejaTipitPunimit $settingsArsyejaTipitPunimit)
    {
        $deleteForm = $this->createDeleteForm($settingsArsyejaTipitPunimit);

        return $this->render('settingsarsyejatipitpunimit/show.html.twig', array(
            'settingsArsyejaTipitPunimit' => $settingsArsyejaTipitPunimit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsArsyejaTipitPunimit entity.
     *
     * @Route("/{id}/edit", name="settingsarsyejatipitpunimit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsArsyejaTipitPunimit $settingsArsyejaTipitPunimit)
    {
        $deleteForm = $this->createDeleteForm($settingsArsyejaTipitPunimit);
        $editForm = $this->createForm('AiadBundle\Form\SettingsArsyejaTipitPunimitType', $settingsArsyejaTipitPunimit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsArsyejaTipitPunimit);
            $em->flush();

            return $this->redirectToRoute('settingsarsyejatipitpunimit_index');
        }

        return $this->render('settingsarsyejatipitpunimit/edit.html.twig', array(
            'settingsArsyejaTipitPunimit' => $settingsArsyejaTipitPunimit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsArsyejaTipitPunimit entity.
     *
     * @Route("/{id}", name="settingsarsyejatipitpunimit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsArsyejaTipitPunimit $settingsArsyejaTipitPunimit)
    {
        $form = $this->createDeleteForm($settingsArsyejaTipitPunimit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsArsyejaTipitPunimit);
            $em->flush();
        }

        return $this->redirectToRoute('settingsarsyejatipitpunimit_index');
    }

    /**
     * Creates a form to delete a SettingsArsyejaTipitPunimit entity.
     *
     * @param SettingsArsyejaTipitPunimit $settingsArsyejaTipitPunimit The SettingsArsyejaTipitPunimit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsArsyejaTipitPunimit $settingsArsyejaTipitPunimit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsarsyejatipitpunimit_delete', array('id' => $settingsArsyejaTipitPunimit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
