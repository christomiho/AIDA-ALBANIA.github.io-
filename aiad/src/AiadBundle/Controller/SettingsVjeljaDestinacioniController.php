<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsVjeljaDestinacioni;
use AiadBundle\Form\SettingsVjeljaDestinacioniType;

/**
 * SettingsVjeljaDestinacioni controller.
 *
 * @Route("/konfigurime/vjelja_destinacioni")
 */
class SettingsVjeljaDestinacioniController extends Controller
{
    /**
     * Lists all SettingsVjeljaDestinacioni entities.
     *
     * @Route("/", name="settingsvjeljadestinacioni_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsVjeljaDestinacionis = $em->getRepository('AiadBundle:SettingsVjeljaDestinacioni')->findAll();

        return $this->render('settingsvjeljadestinacioni/index.html.twig', array(
            'settingsVjeljaDestinacionis' => $settingsVjeljaDestinacionis,
        ));
    }

    /**
     * Creates a new SettingsVjeljaDestinacioni entity.
     *
     * @Route("/new", name="settingsvjeljadestinacioni_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsVjeljaDestinacioni = new SettingsVjeljaDestinacioni();
        $form = $this->createForm('AiadBundle\Form\SettingsVjeljaDestinacioniType', $settingsVjeljaDestinacioni);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsVjeljaDestinacioni);
            $em->flush();

            return $this->redirectToRoute('settingsvjeljadestinacioni_index');
        }

        return $this->render('settingsvjeljadestinacioni/new.html.twig', array(
            'settingsVjeljaDestinacioni' => $settingsVjeljaDestinacioni,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsVjeljaDestinacioni entity.
     *
     * @Route("/{id}", name="settingsvjeljadestinacioni_show")
     * @Method("GET")
     */
    public function showAction(SettingsVjeljaDestinacioni $settingsVjeljaDestinacioni)
    {
        $deleteForm = $this->createDeleteForm($settingsVjeljaDestinacioni);

        return $this->render('settingsvjeljadestinacioni/show.html.twig', array(
            'settingsVjeljaDestinacioni' => $settingsVjeljaDestinacioni,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsVjeljaDestinacioni entity.
     *
     * @Route("/{id}/edit", name="settingsvjeljadestinacioni_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsVjeljaDestinacioni $settingsVjeljaDestinacioni)
    {
        $deleteForm = $this->createDeleteForm($settingsVjeljaDestinacioni);
        $editForm = $this->createForm('AiadBundle\Form\SettingsVjeljaDestinacioniType', $settingsVjeljaDestinacioni);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsVjeljaDestinacioni);
            $em->flush();

            return $this->redirectToRoute('settingsvjeljadestinacioni_index');
        }

        return $this->render('settingsvjeljadestinacioni/edit.html.twig', array(
            'settingsVjeljaDestinacioni' => $settingsVjeljaDestinacioni,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsVjeljaDestinacioni entity.
     *
     * @Route("/{id}", name="settingsvjeljadestinacioni_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsVjeljaDestinacioni $settingsVjeljaDestinacioni)
    {
        $form = $this->createDeleteForm($settingsVjeljaDestinacioni);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsVjeljaDestinacioni);
            $em->flush();
        }

        return $this->redirectToRoute('settingsvjeljadestinacioni_index');
    }

    /**
     * Creates a form to delete a SettingsVjeljaDestinacioni entity.
     *
     * @param SettingsVjeljaDestinacioni $settingsVjeljaDestinacioni The SettingsVjeljaDestinacioni entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsVjeljaDestinacioni $settingsVjeljaDestinacioni)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsvjeljadestinacioni_delete', array('id' => $settingsVjeljaDestinacioni->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
