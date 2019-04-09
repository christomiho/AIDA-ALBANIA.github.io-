<?php
/**
 * Created by PhpStorm.
 * User: Dorjan
 * Date: 7/7/16
 * Time: 10:09 AM
 */

namespace AiadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class HartaController extends Controller{


    /**
     * @param Request $request
     * @Route("/harta", name="hartaParcela")
     */
    public function displayHartaAction(){
        $em = $this->getDoctrine()->getManager();
        $alerts=$em->getRepository('AiadBundle:MapAlert')->findAll();
        return $this->render('AiadBundle:Harta:display.html.twig', array('alerts'=>$alerts));
    }



    /**
     * @param Request $request
     * @Route("/set_Alert", name="setAlert")
     */
    public function setAlertAction(){

        $post = Request::createFromGlobals();
        $em = $this->getDoctrine()->getManager();

        $row_ids=array();
        $circle_radiuses=array();
        $colors=array();
        $njoftimi=array();


        if ($post->request->has('submit')) {

            $parcel_ids=$post->request->get('parcel_id');
            $circle_radiuses=$post->request->get('radius');
            $colors=$post->request->get('circleColor');
            $njoftimi=$post->request->get('message');


            $max = sizeof($parcel_ids);
            for($i=0; $i<$max; $i++){
                //firstly check then insert or update
                $parcel_row=$parcel_ids[$i];
                $check_sql="Select * from `map_alert` where `parcela`='$parcel_row'";
                $stmt = $em->getConnection()->prepare($check_sql);
                $stmt->execute();
                $results=$stmt->fetchAll();
                if(empty($results)){
                    //insert
                    $rad=$circle_radiuses[$i];
                    $col=$colors[$i];
                    $msg=$njoftimi[$i];
                    $insert_sql="INSERT INTO `map_alert`(`id`, `parcela`, `radius`, `circle_color`, `message`) VALUES ('','$parcel_row','$rad','$col','$msg')";
                    $stmt = $em->getConnection()->prepare($insert_sql);
                    $stmt->execute();

                }else{

                    //update
                    $rad=$circle_radiuses[$i];
                    $col=$colors[$i];
                    $msg=$njoftimi[$i];

                    if($msg==""){
                        continue;
                    }

                    $update_sql="UPDATE `map_alert` SET `radius`='$rad',`circle_color`='$col',`message`='$msg' WHERE `parcela`='$parcel_row'";
                    $stmt = $em->getConnection()->prepare($update_sql);
                    $stmt->execute();

                }


            }

          return $this->redirect($this->generateUrl('hartaParcela'));




        }else{
            //get all parcels qe ka useri
            $user = $this->container->get('security.context')->getToken()->getUser();
            $id=$user->getId();
            $parcels=$em->getRepository('AiadBundle:UserHasParcel')->findBy(array('user'=>$id));
            return $this->render('AiadBundle:Harta:alert_insert_form.html.twig',array('parcels'=>$parcels));
        }



    }



} 