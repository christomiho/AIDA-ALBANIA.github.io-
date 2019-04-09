<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraProdhimiParashikuar;
use AiadBundle\Form\MostraProdhimiParashikuarType;

/**
 * MostraProdhimiParashikuar controller.
 *
 * @Route("/mostraprodhimiparashikuar")
 */
class MostraProdhimiParashikuarController extends Controller
{
    /**
     * Lists all MostraProdhimiParashikuar entities.
     *
     * @Route("/", name="mostraprodhimiparashikuar_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraProdhimiParashikuars = $em->getRepository('AiadBundle:MostraProdhimiParashikuar')->findBy(array('parcela'=>$parcela));

        return $this->render('mostraprodhimiparashikuar/index.html.twig', array(
            'mostraProdhimiParashikuars' => $mostraProdhimiParashikuars,
        ));
    }

    /**
     * Creates a new MostraProdhimiParashikuar entity.
     *
     * @Route("/new", name="mostraprodhimiparashikuar_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraProdhimiParashikuar = new MostraProdhimiParashikuar();
        $form = $this->createForm('AiadBundle\Form\MostraProdhimiParashikuarType', $mostraProdhimiParashikuar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraProdhimiParashikuar);
            $em->flush();

            //return $this->redirectToRoute('mostraprodhimiparashikuar_show', array('id' => $mostraProdhimiParashikuar->getId()));
            return $this->redirectToRoute('mostraprodhimiparashikuar_index');
        }

        return $this->render('mostraprodhimiparashikuar/new.html.twig', array(
            'mostraProdhimiParashikuar' => $mostraProdhimiParashikuar,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraProdhimiParashikuar entity.
     *
     * @Route("/{id}", name="mostraprodhimiparashikuar_show")
     * @Method("GET")
     */
    public function showAction(MostraProdhimiParashikuar $mostraProdhimiParashikuar)
    {
        $deleteForm = $this->createDeleteForm($mostraProdhimiParashikuar);

        return $this->render('mostraprodhimiparashikuar/show.html.twig', array(
            'mostraProdhimiParashikuar' => $mostraProdhimiParashikuar,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraProdhimiParashikuar entity.
     *
     * @Route("/{id}/edit", name="mostraprodhimiparashikuar_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraProdhimiParashikuar $mostraProdhimiParashikuar)
    {
        $deleteForm = $this->createDeleteForm($mostraProdhimiParashikuar);
        $editForm = $this->createForm('AiadBundle\Form\MostraProdhimiParashikuarType', $mostraProdhimiParashikuar);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraProdhimiParashikuar);
            $em->flush();

            //return $this->redirectToRoute('mostraprodhimiparashikuar_edit', array('id' => $mostraProdhimiParashikuar->getId()));
            return $this->redirectToRoute('mostraprodhimiparashikuar_index');
        }

        return $this->render('mostraprodhimiparashikuar/edit.html.twig', array(
            'mostraProdhimiParashikuar' => $mostraProdhimiParashikuar,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraProdhimiParashikuar entity.
     *
     * @Route("/{id}", name="mostraprodhimiparashikuar_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraProdhimiParashikuar $mostraProdhimiParashikuar)
    {
        $form = $this->createDeleteForm($mostraProdhimiParashikuar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraProdhimiParashikuar);
            $em->flush();
        }

        return $this->redirectToRoute('mostraprodhimiparashikuar_index');
    }

    /**
     * Creates a form to delete a MostraProdhimiParashikuar entity.
     *
     * @param MostraProdhimiParashikuar $mostraProdhimiParashikuar The MostraProdhimiParashikuar entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraProdhimiParashikuar $mostraProdhimiParashikuar)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostraprodhimiparashikuar_delete', array('id' => $mostraProdhimiParashikuar->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
