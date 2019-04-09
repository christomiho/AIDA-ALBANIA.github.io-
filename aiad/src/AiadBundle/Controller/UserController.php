<?php
/**
 * Created by PhpStorm.
 * User: Dorjan
 * Date: 6/4/16
 * Time: 1:30 PM
 */

namespace AiadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller{

    /**
     * @param Request $request
     * @Route("/new_perdorues", name="perdoruesNew")
     */
    public function newUserAction(){

        $post = Request::createFromGlobals();
        $em = $this->getDoctrine()->getManager();

        $name='';
        $surname='';
        $username='';
        $password='';
        $password_hash='';
        $email='';
        $adresa='';
        $dataRegjistrimit='';
        $role='';
        $flag=0;
        if ($post->request->has('submit')) {
            //get all inputs
            //check if username exists
            $name = $post->request->get('name');
            $surname = $post->request->get('surname');
            $username = $post->request->get('username');
            $password = $post->request->get('password');
            $password_hash=sha1($password);
            $email=$post->request->get('email');
            $adresa=$post->request->get('address');
            $dataRegjistrimit=date('Y-m-d');
            $role=$post->request->get('role');

            $check_sql="Select * from `user` where `username`='$username'";
            $stmt = $em->getConnection()->prepare($check_sql);
            $stmt->execute();
            $users=$stmt->fetchAll();

            if(!empty($users)){
                //redirect to creation form with the message that username is not available
                $flag=1;
                $data=array();
                $data['name']=$name;
                $data['surname']=$surname;
                $data['username']=$username;
                $data['password']=$password;
                $data['email']=$email;
                $data['adresa']=$adresa;
                $roles = $em->getRepository('AiadBundle:UserRole')->findAll();
                return $this->render('AiadBundle:User:new.html.twig',array('roles'=>$roles, 'flag'=>$flag, 'data'=>$data));

            }else{
                //insert
                $insert_sql="INSERT INTO `user`(`id`, `name`, `surname`, `username`, `password`, `email`, `adresa_banimit`, `data_regjistrimit`, `forgot_password`, `active`, `role`) VALUES ('','$name','$surname','$username','$password_hash','$email','$adresa','$dataRegjistrimit',NULL,'1','$role')";
                $stmt = $em->getConnection()->prepare($insert_sql);
                $stmt->execute();
                   //send mail to user
                   $url="<a href='aiad.al'>aiad.al</a>";
                   $to      = $email;
                   $subject = 'Albanian Integrated Agriculture Digitalization:';
                    $message = 'Pershendetje '.$name ." ".$surname. ", <br/>".
                        'Juve ju eshte akorduar nje llogari pune ne portalin AIAD. '. "<br/>".
                         'Ju mund te aksesoni panelin tuaj te punes nepermjet te dhenave me poshte:'. "<br/>".
                        'Username: '.$username.' '. "<br/>".
                        'Password: '.$password.' '. "<br/>";
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
                    $headers .= 'From: '. 'noreply@aiad.al' . "\r\n" .
                        'Reply-To: noreply@aiad.al' . "\r\n";

                    mail($to, $subject, $message, $headers);

                return $this->redirect($this->generateUrl('perdoruesList'));

            }

        }else{
            //render the user creation form
            $roles = $em->getRepository('AiadBundle:UserRole')->findAll();
            return $this->render('AiadBundle:User:new.html.twig',array('roles'=>$roles, 'flag'=>$flag));


        }

    }

    /**
     * @Route("/all_users", name="perdoruesList")
     */
    public function listAllUsersAction(){
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AiadBundle:User')->findAll();
        return $this->render('AiadBundle:User:list_all.html.twig',array('users'=>$users));

    }

    /**
     * @param Request $request
     * @param $id
     * @Route("userEdit/{id}", name="user_edit")
     * @Method({"GET", "POST"})
     */
    public function editUserAction($id)
    {
        $post = Request::createFromGlobals();
        $em = $this->getDoctrine()->getManager();

        $name='';
        $surname='';
        $username='';
        $email='';
        $adresa='';
        $role='';
        $flag=0;
        if ($post->request->has('submit')) {
            //get all inputs
            //check if username exists
            $name = $post->request->get('name');
            $surname = $post->request->get('surname');
            $username = $post->request->get('username');
            $email=$post->request->get('email');
            $adresa=$post->request->get('address');
            $role=$post->request->get('role');

            $check_sql="Select * from `user` where `username`='$username' AND `id`!='$id'";
            $stmt = $em->getConnection()->prepare($check_sql);
            $stmt->execute();
            $users=$stmt->fetchAll();


            if(!empty($users)){
                //redirect to edit form with the message that username is not available
                $flag=2;
                $data=array();
                $data['name']=$name;
                $data['surname']=$surname;
                $data['username']=$username;
                $data['email']=$email;
                $data['adresa']=$adresa;
                $roles = $em->getRepository('AiadBundle:UserRole')->findAll();
                return $this->render('AiadBundle:User:edit.html.twig',array('roles'=>$roles, 'flag'=>$flag, 'data'=>$data, 'id'=>$id));

            }else{
                //update
                $update_sql="UPDATE `user` SET `name`='$name',`surname`='$surname',`username`='$username',`email`='$email',`adresa_banimit`='$adresa',`role`='$role' WHERE `id`='$id'";
                $stmt = $em->getConnection()->prepare($update_sql);
                $stmt->execute();

                return $this->redirect($this->generateUrl('perdoruesList'));

            }

        }else{
            //render the user editing form
            $roles = $em->getRepository('AiadBundle:UserRole')->findAll();
            $user = $em->getRepository('AiadBundle:User')->find($id);
            $flag=1;
            $data=array();
            $data['name']=$user->getName();
            $data['surname']=$user->getSurname();
            $data['username']=$user->getUsername();
            $data['email']=$user->getEmail();
            $data['adresa']=$user->getAdresaBanimit();

            return $this->render('AiadBundle:User:edit.html.twig',array('roles'=>$roles, 'data'=>$data, 'flag'=>$flag, 'id'=>$id));

        }


    }


    /**
     * @param $id
     * @param Request $request
     * @Route("userProfileEdit/{id}", name="userProfile")
     * @Method({"GET", "POST"})
     */

    public function editUserProfile($id){
        $post = Request::createFromGlobals();
        $em = $this->getDoctrine()->getManager();

        $name='';
        $surname='';
        $username='';
        $email='';
        $adresa='';
        $password='';
        $password_hash='';

        $flag=0;
        if ($post->request->has('submit')) {
            //get all inputs
            //check if username exists
            $name = $post->request->get('name');
            $surname = $post->request->get('surname');
            $username = $post->request->get('username');
            $password = $post->request->get('password');
            $password_hash=sha1($password);
            $email=$post->request->get('email');
            $adresa=$post->request->get('address');


            $check_sql="Select * from `user` where `username`='$username' AND `id`!='$id'";
            $stmt = $em->getConnection()->prepare($check_sql);
            $stmt->execute();
            $users=$stmt->fetchAll();


            if(!empty($users)){
                //redirect to edit form with the message that username is not available
                $flag=2;
                $data=array();
                $data['name']=$name;
                $data['surname']=$surname;
                $data['username']=$username;
                $data['email']=$email;
                $data['adresa']=$adresa;

                return $this->render('AiadBundle:User:user_profile.html.twig',array('flag'=>$flag, 'data'=>$data, 'id'=>$id));

            }else{
                //update
                $update_sql="UPDATE `user` SET `name`='$name',`surname`='$surname',`username`='$username',`password`='$password_hash',`email`='$email',`adresa_banimit`='$adresa' WHERE `id`='$id'";
                $stmt = $em->getConnection()->prepare($update_sql);
                $stmt->execute();

                return $this->redirect($this->generateUrl('home'));

            }

        }else{
            //render the user profile editing form

            $user = $em->getRepository('AiadBundle:User')->find($id);
            $flag=1;
            $data=array();
            $data['name']=$user->getName();
            $data['surname']=$user->getSurname();
            $data['username']=$user->getUsername();
            $data['email']=$user->getEmail();
            $data['adresa']=$user->getAdresaBanimit();

            return $this->render('AiadBundle:User:user_profile.html.twig',array('data'=>$data, 'flag'=>$flag, 'id'=>$id));

        }
    }

    /**
     * @param Request $request
     * @Route("/assignParcels", name="assign_parcels_to_user")
     */
    public function assignParcelsToUser(){
        $post = Request::createFromGlobals();
        $em = $this->getDoctrine()->getManager();

        $perdorues='';
        $parcelat=array();
        if ($post->request->has('submit')) {
            $perdorues = $post->request->get('user');
            $parcelat = $post->request->get('parcelat');


            if (!empty($parcelat)) {
                foreach ($parcelat as $parcel) {

                    $check_sql="Select * from `user_has_parcel` where `user_id`='$perdorues' AND `parcel_id`='$parcel'";
                    $stmt = $em->getConnection()->prepare($check_sql);
                    $stmt->execute();
                    $parcelat_perkatese=$stmt->fetchAll();

                    if(!empty($parcelat_perkatese)){
                       continue;
                    }else{
                        $sql_insert = "INSERT INTO `user_has_parcel`(`id`, `user_id`, `parcel_id`) VALUES ('','$perdorues','$parcel')";
                        $stmt = $em->getConnection()->prepare($sql_insert);
                        $stmt->execute();
                    }

                }
            }

           return $this->redirect($this->generateUrl('home'));
        }else{

            $users = $em->getRepository('AiadBundle:User')->findBy(array('role'=>3));
            $parcels=$em->getRepository('AiadBundle:ParcelaIdentifikimi')->findAll();
            return $this->render('AiadBundle:AssignParcel:assign_parcels.html.twig',array('users'=>$users, 'parcels'=>$parcels));

        }

    }


    /**
     * @Route("/forgot_password", name="forgotPassword")
     * @Template()
     */
    public function forgotPassAction()
    {
        return $this->render('AiadBundle:ResetPass:reset_form.html.twig');
    }



    /**
     * @param Request $request
     * @Route("/send_reset_link", name="sendReset")
     */
    public function sendResetLinkAction()
    {

        $post = Request::createFromGlobals();
        $username='';


        if ($post->request->has('submit')) {
            $username=$post->request->get('username');
            //generate activation code
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 30; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $em = $this->getDoctrine()->getManager();

            $sql = "SELECT * FROM `user` WHERE `username`='$username'";
            $stmt = $em->getConnection()->prepare($sql);
            $stmt->execute();
            $user = $stmt->fetchAll();

            $flag=0;
            $x='';
            $email='';
            foreach($user as $u){

                $id=$u['id'];
                $query1="UPDATE `user` SET `forgot_password`='$randomString' WHERE `id`='$id'";
                $stmt = $em->getConnection()->prepare($query1);
                $stmt->execute();
                $flag=1;
                $x=$id;
                $email=$u['email'];
            }
                if($flag==1){
                    //dergo emailin me linkun per rivendosje fjalekalimi
                    $link='http://localhost:8080/aiad/aiad/web/app_dev.php/resetpass/'.$x.'/'.$randomString;

                    $message = \Swift_Message::newInstance()
                        ->setSubject('Link për Rivendosje Fjalëkalimi')
                        ->setFrom('dhitaj.aiad@gmail.com')
                        ->setTo($email)
                        ->setBody(
                            $this->renderView(
                                'AiadBundle:ResetPass:reset_mail.html.twig', array( 'link'=>$link)
                            ),
                            'text/html'
                        );
                    $this->get('mailer')->send($message);

    //                    $url="<a href=".$link.">".$link."</a>";
    //                    $to      = $email;
    //                    $subject = 'Link për Rivendosje Fjalëkalimi';
    //                    $message = 'Përshëndetje '.$username . ", <br/>".
    //                        'Për te rivendosuer fjalekalimin tuaj, ju lutem klikoni ne linkun me poshtë. '. "<br/>".
    //                         $url;
    //                    $headers = "MIME-Version: 1.0" . "\r\n";
    //                    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    //                    $headers .= 'From: '. 'noreply@aiad.al' . "\r\n" .
    //                        'Reply-To: noreply@aiad.al' . "\r\n";

    //                    mail($to, $subject, $message, $headers);

                    //redirect te logini dhe jepi mesazhin qe te shofi mailin
                    return $this->redirect($this->generateUrl('notificationMail'));

                }
        }else{
            return $this->redirect($this->generateUrl('forgotPassword'));
        }
    }

    /**
     * @return Response
     * @Route("/notification", name="notificationMail")
     */
    public function notificationAction(){
        return $this->render('AiadBundle:ResetPass:notification.html.twig');
    }

    /**
     * @param Request $request
     * @param $id
     * @param $activation
     * @Route("/resetpass/{id}/{activation}", name="activate_pass")
     * @Template()
     */

    public function resetAction($id, $activation)
    {
        $em = $this->getDoctrine()->getManager();
        $post = Request::createFromGlobals();
        $password='';
        $password2='';
        $user = array();

        if ($post->request->has('submit')) {

            $password=$post->request->get('password');
            $password_again=$post->request->get('password_again');

            $final=sha1($password);

            $check_sql = "SELECT * FROM `user` WHERE `id`='$id' AND `forgot_password`='$activation'";
            $stmt = $em->getConnection()->prepare($check_sql);
            $stmt->execute();

            $user = $stmt->fetchAll();

            if(count($user)==1){
                $query1="UPDATE `user` SET `password`='$final', `forgot_password`='' WHERE `id`='$id' AND `forgot_password`='$activation'";
                $stmt = $em->getConnection()->prepare($query1);
                $stmt->execute();

                return $this->redirect($this->generateUrl('login'));

            }else{
                return new Response('Ka ndodhur nje gabim');
            }

        }else{

            return $this->render('AiadBundle:ResetPass:reset_form.html.twig', array('id'=>$id, 'activation'=>$activation));

        }

    }





} 