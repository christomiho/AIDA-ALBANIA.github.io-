<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsModeliPleherimit;
use AiadBundle\Form\SettingsModeliPleherimitType;

/**
 * SettingsModeliPleherimit controller.
 *
 * @Route("/konfigurime/modeli_pleherimit")
 */
class SettingsModeliPleherimitController extends Controller
{
    /**
     * Lists all SettingsModeliPleherimit entities.
     *
     * @Route("/", name="settingsmodelipleherimit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsModeliPleherimits = $em->getRepository('AiadBundle:SettingsModeliPleherimit')->findAll();

        return $this->render('settingsmodelipleherimit/index.html.twig', array(
            'settingsModeliPleherimits' => $settingsModeliPleherimits,
        ));
    }

    /**
     * Creates a new SettingsModeliPleherimit entity.
     *
     * @Route("/new", name="settingsmodelipleherimit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsModeliPleherimit = new SettingsModeliPleherimit();
        $form = $this->createForm('AiadBundle\Form\SettingsModeliPleherimitType', $settingsModeliPleherimit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsModeliPleherimit);
            $em->flush();

            return $this->redirectToRoute('settingsmodelipleherimit_show', array('id' => $settingsModeliPleherimit->getId()));
        }

        return $this->render('settingsmodelipleherimit/new.html.twig', array(
            'settingsModeliPleherimit' => $settingsModeliPleherimit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsModeliPleherimit entity.
     *
     * @Route("/{id}", name="settingsmodelipleherimit_show")
     * @Method("GET")
     */
    public function showAction(SettingsModeliPleherimit $settingsModeliPleherimit)
    {
        $deleteForm = $this->createDeleteForm($settingsModeliPleherimit);

        return $this->render('settingsmodelipleherimit/show.html.twig', array(
            'settingsModeliPleherimit' => $settingsModeliPleherimit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsModeliPleherimit entity.
     *
     * @Route("/{id}/edit", name="settingsmodelipleherimit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsModeliPleherimit $settingsModeliPleherimit)
    {
        $deleteForm = $this->createDeleteForm($settingsModeliPleherimit);
        $editForm = $this->createForm('AiadBundle\Form\SettingsModeliPleherimitType', $settingsModeliPleherimit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsModeliPleherimit);
            $em->flush();

            return $this->redirectToRoute('settingsmodelipleherimit_edit', array('id' => $settingsModeliPleherimit->getId()));
        }

        return $this->render('settingsmodelipleherimit/edit.html.twig', array(
            'settingsModeliPleherimit' => $settingsModeliPleherimit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsModeliPleherimit entity.
     *
     * @Route("/{id}", name="settingsmodelipleherimit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsModeliPleherimit $settingsModeliPleherimit)
    {
        $form = $this->createDeleteForm($settingsModeliPleherimit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsModeliPleherimit);
            $em->flush();
        }

        return $this->redirectToRoute('settingsmodelipleherimit_index');
    }

    /**
     * Creates a form to delete a SettingsModeliPleherimit entity.
     *
     * @param SettingsModeliPleherimit $settingsModeliPleherimit The SettingsModeliPleherimit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsModeliPleherimit $settingsModeliPleherimit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsmodelipleherimit_delete', array('id' => $settingsModeliPleherimit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
