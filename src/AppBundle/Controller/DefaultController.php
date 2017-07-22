<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Task;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $tasks = $em->getRepository('AppBundle:Task')
        ->findAll();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'tasks' => $tasks
        ]);
    }

	/**
     * @Route("/task/{id}", name="task")
     */
	public function taskAction(Request $request)
	{
		$em = $this->getDoctrine()->getEntityManager();
        $task = $em->getRepository('AppBundle:Task')->find(  $request->get('id') );
		
		return $this->render('default/task.html.twig', [
			'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
			'task' => $task
		]);
	}
	
    /**
     * @Route("/add", name="add")
     */
    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $label = $request->request->get('label');

        $task = new Task();
        $task->setLabel($label);

		$validator = $this->get('validator');
		$errors = $validator->validate($task);
		
		if (count($errors) > 0) 
		{
			return new Response(json_encode(["error" => "Please enter a task description"]));
		}
		
        $em->persist($task);
        $em->flush();
		
        return new Response( json_encode( [ "Id" => $task->getId(), "label" => $task->getLabel() ] ) );
    }
	
	/**
     * @Route("/delete", name="delete")
     */
	public function deleteAction(Request $request)
	{
		$em = $this->getDoctrine()->getEntityManager();
        $task = $em->getRepository('AppBundle:Task')->find(  $request->request->get('Id') );
		
		$returnVal = [ "Id" => $task->getId(), "Action" => "Del" ];
		
		$em->remove($task);
		$em->flush();
		
		return new Response( json_encode( $returnVal ) );
	}
	
	/**
     * @Route("/complete", name="complete")
     */
	public function completeAction(Request $request)
	{
		$em = $this->getDoctrine()->getEntityManager();
        $task = $em->getRepository('AppBundle:Task')->find(  $request->request->get('Id') );
		
		$task->setStatus('C');
		
		$em->persist($task);
        $em->flush();
		
		return new Response( json_encode( ["Statut" => "success"] ));
	}
}
