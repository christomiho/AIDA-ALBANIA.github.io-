<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsGrackaKompProdhuse;
use AiadBundle\Form\SettingsGrackaKompProdhuseType;

/**
 * SettingsGrackaKompProdhuse controller.
 *
 * @Route("/konfigurime/gracka_kompania_prodheuse")
 */
class SettingsGrackaKompProdhuseController extends Controller
{
    /**
     * Lists all SettingsGrackaKompProdhuse entities.
     *
     * @Route("/", name="settingsgrackakompprodhuse_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsGrackaKompProdhuses = $em->getRepository('AiadBundle:SettingsGrackaKompProdhuse')->findAll();

        return $this->render('settingsgrackakompprodhuse/index.html.twig', array(
            'settingsGrackaKompProdhuses' => $settingsGrackaKompProdhuses,
        ));
    }

    /**
     * Creates a new SettingsGrackaKompProdhuse entity.
     *
     * @Route("/new", name="settingsgrackakompprodhuse_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsGrackaKompProdhuse = new SettingsGrackaKompProdhuse();
        $form = $this->createForm('AiadBundle\Form\SettingsGrackaKompProdhuseType', $settingsGrackaKompProdhuse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsGrackaKompProdhuse);
            $em->flush();

            return $this->redirectToRoute('settingsgrackakompprodhuse_index');
        }

        return $this->render('settingsgrackakompprodhuse/new.html.twig', array(
            'settingsGrackaKompProdhuse' => $settingsGrackaKompProdhuse,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsGrackaKompProdhuse entity.
     *
     * @Route("/{id}", name="settingsgrackakompprodhuse_show")
     * @Method("GET")
     */
    public function showAction(SettingsGrackaKompProdhuse $settingsGrackaKompProdhuse)
    {
        $deleteForm = $this->createDeleteForm($settingsGrackaKompProdhuse);

        return $this->render('settingsgrackakompprodhuse/show.html.twig', array(
            'settingsGrackaKompProdhuse' => $settingsGrackaKompProdhuse,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsGrackaKompProdhuse entity.
     *
     * @Route("/{id}/edit", name="settingsgrackakompprodhuse_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsGrackaKompProdhuse $settingsGrackaKompProdhuse)
    {
        $deleteForm = $this->createDeleteForm($settingsGrackaKompProdhuse);
        $editForm = $this->createForm('AiadBundle\Form\SettingsGrackaKompProdhuseType', $settingsGrackaKompProdhuse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsGrackaKompProdhuse);
            $em->flush();

            return $this->redirectToRoute('settingsgrackakompprodhuse_index');
        }

        return $this->render('settingsgrackakompprodhuse/edit.html.twig', array(
            'settingsGrackaKompProdhuse' => $settingsGrackaKompProdhuse,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsGrackaKompProdhuse entity.
     *
     * @Route("/{id}", name="settingsgrackakompprodhuse_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsGrackaKompProdhuse $settingsGrackaKompProdhuse)
    {
        $form = $this->createDeleteForm($settingsGrackaKompProdhuse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsGrackaKompProdhuse);
            $em->flush();
        }

        return $this->redirectToRoute('settingsgrackakompprodhuse_index');
    }

    /**
     * Creates a form to delete a SettingsGrackaKompProdhuse entity.
     *
     * @param SettingsGrackaKompProdhuse $settingsGrackaKompProdhuse The SettingsGrackaKompProdhuse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsGrackaKompProdhuse $settingsGrackaKompProdhuse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsgrackakompprodhuse_delete', array('id' => $settingsGrackaKompProdhuse->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
