<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsGrackaObjektivi;
use AiadBundle\Form\SettingsGrackaObjektiviType;

/**
 * SettingsGrackaObjektivi controller.
 *
 * @Route("/konfigurime/gracka_objektivi")
 */
class SettingsGrackaObjektiviController extends Controller
{
    /**
     * Lists all SettingsGrackaObjektivi entities.
     *
     * @Route("/", name="settingsgrackaobjektivi_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsGrackaObjektivis = $em->getRepository('AiadBundle:SettingsGrackaObjektivi')->findAll();

        return $this->render('settingsgrackaobjektivi/index.html.twig', array(
            'settingsGrackaObjektivis' => $settingsGrackaObjektivis,
        ));
    }

    /**
     * Creates a new SettingsGrackaObjektivi entity.
     *
     * @Route("/new", name="settingsgrackaobjektivi_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsGrackaObjektivi = new SettingsGrackaObjektivi();
        $form = $this->createForm('AiadBundle\Form\SettingsGrackaObjektiviType', $settingsGrackaObjektivi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsGrackaObjektivi);
            $em->flush();

            return $this->redirectToRoute('settingsgrackaobjektivi_index');
        }

        return $this->render('settingsgrackaobjektivi/new.html.twig', array(
            'settingsGrackaObjektivi' => $settingsGrackaObjektivi,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsGrackaObjektivi entity.
     *
     * @Route("/{id}", name="settingsgrackaobjektivi_show")
     * @Method("GET")
     */
    public function showAction(SettingsGrackaObjektivi $settingsGrackaObjektivi)
    {
        $deleteForm = $this->createDeleteForm($settingsGrackaObjektivi);

        return $this->render('settingsgrackaobjektivi/show.html.twig', array(
            'settingsGrackaObjektivi' => $settingsGrackaObjektivi,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsGrackaObjektivi entity.
     *
     * @Route("/{id}/edit", name="settingsgrackaobjektivi_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsGrackaObjektivi $settingsGrackaObjektivi)
    {
        $deleteForm = $this->createDeleteForm($settingsGrackaObjektivi);
        $editForm = $this->createForm('AiadBundle\Form\SettingsGrackaObjektiviType', $settingsGrackaObjektivi);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsGrackaObjektivi);
            $em->flush();

            return $this->redirectToRoute('settingsgrackaobjektivi_index');
        }

        return $this->render('settingsgrackaobjektivi/edit.html.twig', array(
            'settingsGrackaObjektivi' => $settingsGrackaObjektivi,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsGrackaObjektivi entity.
     *
     * @Route("/{id}", name="settingsgrackaobjektivi_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsGrackaObjektivi $settingsGrackaObjektivi)
    {
        $form = $this->createDeleteForm($settingsGrackaObjektivi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsGrackaObjektivi);
            $em->flush();
        }

        return $this->redirectToRoute('settingsgrackaobjektivi_index');
    }

    /**
     * Creates a form to delete a SettingsGrackaObjektivi entity.
     *
     * @param SettingsGrackaObjektivi $settingsGrackaObjektivi The SettingsGrackaObjektivi entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsGrackaObjektivi $settingsGrackaObjektivi)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsgrackaobjektivi_delete', array('id' => $settingsGrackaObjektivi->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
