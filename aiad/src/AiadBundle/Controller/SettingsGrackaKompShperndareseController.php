<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsGrackaKompShperndarese;
use AiadBundle\Form\SettingsGrackaKompShperndareseType;

/**
 * SettingsGrackaKompShperndarese controller.
 *
 * @Route("/konfigurime/gracka_kompania_shperndarese")
 */
class SettingsGrackaKompShperndareseController extends Controller
{
    /**
     * Lists all SettingsGrackaKompShperndarese entities.
     *
     * @Route("/", name="settingsgrackakompshperndarese_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsGrackaKompShperndarese = $em->getRepository('AiadBundle:SettingsGrackaKompShperndarese')->findAll();

        return $this->render('settingsgrackakompshperndarese/index.html.twig', array(
            'settingsGrackaKompShperndarese' => $settingsGrackaKompShperndarese,
        ));
    }

    /**
     * Creates a new SettingsGrackaKompShperndarese entity.
     *
     * @Route("/new", name="settingsgrackakompshperndarese_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsGrackaKompShperndarese = new SettingsGrackaKompShperndarese();
        $form = $this->createForm('AiadBundle\Form\SettingsGrackaKompShperndareseType', $settingsGrackaKompShperndarese);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsGrackaKompShperndarese);
            $em->flush();

            return $this->redirectToRoute('settingsgrackakompshperndarese_index');
        }

        return $this->render('settingsgrackakompshperndarese/new.html.twig', array(
            'settingsGrackaKompShperndarese' => $settingsGrackaKompShperndarese,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsGrackaKompShperndarese entity.
     *
     * @Route("/{id}", name="settingsgrackakompshperndarese_show")
     * @Method("GET")
     */
    public function showAction(SettingsGrackaKompShperndarese $settingsGrackaKompShperndarese)
    {
        $deleteForm = $this->createDeleteForm($settingsGrackaKompShperndarese);

        return $this->render('settingsgrackakompshperndarese/show.html.twig', array(
            'settingsGrackaKompShperndarese' => $settingsGrackaKompShperndarese,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsGrackaKompShperndarese entity.
     *
     * @Route("/{id}/edit", name="settingsgrackakompshperndarese_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsGrackaKompShperndarese $settingsGrackaKompShperndarese)
    {
        $deleteForm = $this->createDeleteForm($settingsGrackaKompShperndarese);
        $editForm = $this->createForm('AiadBundle\Form\SettingsGrackaKompShperndareseType', $settingsGrackaKompShperndarese);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsGrackaKompShperndarese);
            $em->flush();

            return $this->redirectToRoute('settingsgrackakompshperndarese_index');
        }

        return $this->render('settingsgrackakompshperndarese/edit.html.twig', array(
            'settingsGrackaKompShperndarese' => $settingsGrackaKompShperndarese,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsGrackaKompShperndarese entity.
     *
     * @Route("/{id}", name="settingsgrackakompshperndarese_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsGrackaKompShperndarese $settingsGrackaKompShperndarese)
    {
        $form = $this->createDeleteForm($settingsGrackaKompShperndarese);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsGrackaKompShperndarese);
            $em->flush();
        }

        return $this->redirectToRoute('settingsgrackakompshperndarese_index');
    }

    /**
     * Creates a form to delete a SettingsGrackaKompShperndarese entity.
     *
     * @param SettingsGrackaKompShperndarese $settingsGrackaKompShperndarese The SettingsGrackaKompShperndarese entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsGrackaKompShperndarese $settingsGrackaKompShperndarese)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsgrackakompshperndarese_delete', array('id' => $settingsGrackaKompShperndarese->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
