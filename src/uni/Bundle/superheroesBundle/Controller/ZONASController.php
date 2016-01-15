<?php

namespace uni\Bundle\superheroesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use uni\Bundle\superheroesBundle\Entity\ZONAS;
use uni\Bundle\superheroesBundle\Form\ZONASType;

/**
 * ZONAS controller.
 *
 */
class ZONASController extends Controller
{

    /**
     * Lists all ZONAS entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('unisuperheroesBundle:ZONAS')->findAll();

        return $this->render('unisuperheroesBundle:ZONAS:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ZONAS entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ZONAS();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('zonas_show', array('id' => $entity->getId())));
        }

        return $this->render('unisuperheroesBundle:ZONAS:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ZONAS entity.
     *
     * @param ZONAS $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ZONAS $entity)
    {
        $form = $this->createForm(new ZONASType(), $entity, array(
            'action' => $this->generateUrl('zonas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ZONAS entity.
     *
     */
    public function newAction()
    {
        $entity = new ZONAS();
        $form   = $this->createCreateForm($entity);

        return $this->render('unisuperheroesBundle:ZONAS:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ZONAS entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('unisuperheroesBundle:ZONAS')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ZONAS entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('unisuperheroesBundle:ZONAS:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ZONAS entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('unisuperheroesBundle:ZONAS')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ZONAS entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('unisuperheroesBundle:ZONAS:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ZONAS entity.
    *
    * @param ZONAS $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ZONAS $entity)
    {
        $form = $this->createForm(new ZONASType(), $entity, array(
            'action' => $this->generateUrl('zonas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ZONAS entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('unisuperheroesBundle:ZONAS')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ZONAS entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('zonas_edit', array('id' => $id)));
        }

        return $this->render('unisuperheroesBundle:ZONAS:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ZONAS entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('unisuperheroesBundle:ZONAS')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ZONAS entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('zonas'));
    }

    /**
     * Creates a form to delete a ZONAS entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('zonas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    public function buscarAction()
    {
        
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('unisuperheroesBundle:ZONAS')->findAll();

        return $this->render('unisuperheroesBundle:ZONAS:buscar.html.twig', array(
            'cats' => $entities,
        ));
    }
    
     public function responderAction(Request $request)
    {
      //    $nom= $_POST['categoria']; // Coger variables usando php clásico.
         $nom= $request->request->get('nombre'); // Modo symfony2
         
         $em = $this->getDoctrine()->getManager();
        if  ($nom=="Todas")
                $entities = $em->getRepository('unisuperheroesBundle:ZONAS')->findAll();
        else 
            $entities = $em->getRepository('unisuperheroesBundle:ZONAS')->findBynombre($nom);

        return $this->render('unisuperheroesBundle:ZONAS:responder.html.twig', array(
            'entities' => $entities,
            'nombre'=> $nom,
        ));
    }

}
