<?php

namespace uni\Bundle\superheroesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use uni\Bundle\superheroesBundle\Entity\SUPERHEROE;
use uni\Bundle\superheroesBundle\Form\SUPERHEROEType;

/**
 * SUPERHEROE controller.
 *
 */
class SUPERHEROEController extends Controller
{

    /**
     * Lists all SUPERHEROE entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('unisuperheroesBundle:SUPERHEROE')->findAll();

        return $this->render('unisuperheroesBundle:SUPERHEROE:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SUPERHEROE entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SUPERHEROE();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('superheroe_show', array('id' => $entity->getId())));
        }

        return $this->render('unisuperheroesBundle:SUPERHEROE:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a SUPERHEROE entity.
     *
     * @param SUPERHEROE $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SUPERHEROE $entity)
    {
        $form = $this->createForm(new SUPERHEROEType(), $entity, array(
            'action' => $this->generateUrl('superheroe_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SUPERHEROE entity.
     *
     */
    public function newAction()
    {
        $entity = new SUPERHEROE();
        $form   = $this->createCreateForm($entity);

        return $this->render('unisuperheroesBundle:SUPERHEROE:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SUPERHEROE entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('unisuperheroesBundle:SUPERHEROE')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SUPERHEROE entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('unisuperheroesBundle:SUPERHEROE:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SUPERHEROE entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('unisuperheroesBundle:SUPERHEROE')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SUPERHEROE entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('unisuperheroesBundle:SUPERHEROE:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SUPERHEROE entity.
    *
    * @param SUPERHEROE $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SUPERHEROE $entity)
    {
        $form = $this->createForm(new SUPERHEROEType(), $entity, array(
            'action' => $this->generateUrl('superheroe_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SUPERHEROE entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('unisuperheroesBundle:SUPERHEROE')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SUPERHEROE entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('superheroe_edit', array('id' => $id)));
        }

        return $this->render('unisuperheroesBundle:SUPERHEROE:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SUPERHEROE entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('unisuperheroesBundle:SUPERHEROE')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SUPERHEROE entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('superheroe'));
    }

    /**
     * Creates a form to delete a SUPERHEROE entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('superheroe_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
