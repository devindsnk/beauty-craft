<?php

class CustDashboard extends Controller
{
   public function __construct()
   {
      Session::validateSession([6]);
      $this->serviceModel = $this->model('ServiceModel');
      $this->reservationModel = $this->model('ReservationModel');
      $this->customerModel = $this->model('CustomerModel');
      $this->UserModel = $this->model('UserModel');
   }

   public function home()
   {
      redirect('CustDashboard/myReservations');
   }

   public function myReservations()
   {
      $customerID = Session::getUser("id");
      $reservationsList = $this->reservationModel->getReservationsByCustomer($customerID);
      $this->view('customer/cust_myReservations', $reservationsList);
   }
   public function profileSettings()
   {
      $customerID = Session::getUser("id");
      $profileData = $this->customerModel->getCustomerDetailsByCusID($customerID)[0];
      if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'FILES')
      {
         if (!$_FILES['custimage']['name'])
         {
            $img_upload_path = $profileData->imgPath;
         }
         else
         {
            $img_name = " ";
            $new_img_name =  " ";
            $img_name = $_FILES['custimage']['name'];
            $img_size = $_FILES['custimage']['size'];
            $tmp_name = $_FILES['custimage']['tmp_name'];
            $error = $_FILES['custimage']['error'];
            $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_extension);
            $allowed_extensions = array("jpg", "jpeg", "png");
            if ($error == 0)
            {
               if (in_array($img_ex_lc, $allowed_extensions))
               {
                  $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                  $img_upload_path = '../public/imgs/customerImgs/' . $new_img_name;
                  move_uploaded_file($tmp_name, $img_upload_path);
               }
            }
         }





         $data = [

            'fName' => isset($_POST['fName']) ? trim($_POST['fName']) : '',
            'lName' =>  isset($_POST['lName']) ? trim($_POST['lName']) : '',
            'gender' => isset($_POST['gender']) ? trim($_POST['gender']) : '',
            'imgPath' => isset($new_img_name) ? $new_img_name : '',
            'mobileNo' => isset($_POST['mobileNo']) ? trim($_POST['mobileNo']) : '',
            'fNameError' => '',
            'lNameError' => '',
            'contactNoError' => '',
            'haveError' => 0,
            'oldProfImg' => isset($new_img_name) ? $new_img_name : $profileData->imgPath

         ];

         $data['fNameError'] = emptyCheck($data['fName']);
         $data['lNameError'] = emptyCheck($data['lName']);
         $data['contactNoError'] = emptyCheck($data['mobileNo']);
         // print_r($data);
         if (empty($data['contactNoError']))
         {
            $data['contactNoError'] = validateMobileNo($data['mobileNo']);
            if ($data['mobileNo'] != Session::getUser("mobileNo"))
            {
               $mobileNoAlreadyRegisterd = $this->UserModel->checkLoginExists($data['mobileNo']);
            }
            else
            {
               $mobileNoAlreadyRegisterd = 'false';
            }

            if ($mobileNoAlreadyRegisterd == 'true')
            {
               $data['contactNoError'] = 'Mobile number already registered.';
               $data['haveError'] = 1;
            }
         }
         // die();
         if (empty($data['fNameError']) && empty($data['lNameError']) && empty($data['contactNoError']))
         {
            if (!$data['imgPath'])
            {
               $data['imgPath'] = $profileData->imgPath;
               // die('empty img path');
            }

            // print_r($data);
            // die($data['imgPath']);
            $this->customerModel->beginTransaction();
            $this->customerModel->updateCustomerInfo($data, Session::getUser("id"));
            $this->customerModel->updateUserTableMobileNo($data['mobileNo'], Session::getUser("mobileNo"));
            if ($data['mobileNo'] != Session::getUser("mobileNo"))
            {
               $this->customerModel->deleteOtpRecords(Session::getUser("mobileNo"));
               // Session::getUser("mobileNo")=> $data['mobileNo'];
               // $user = $this->userModel->getUser($data['mobileNo']);
               // Session::setBundle(
               //    'user',
               //    [
               //       "mobileNo" => $user->mobileNo,
               //       "type" => $user->userType,
               //       "id" => $this->getUserData($user)[0],
               //       "name" =>  $this->getUserData($user)[1],
               //       "img" => $this->getUserData($user)[2]
               //    ]
               // );
            }

            $this->customerModel->commit();

            Toast::setToast(1, "Profile details successfully updated.", "");
            // die();
            // redirect('CustDashboard/profileSettings');
         }
         else
         {
            $data['haveError'] = 1;
         }

         $this->view('customer/cust_profileSettings', $data);
      }
      else
      {
         $data = [

            'fName' => $profileData->fName,
            'lName' => $profileData->lName,
            'gender' => $profileData->gender,
            'imgPath' => '',
            'mobileNo' => $profileData->mobileNo,
            'fNameError' => '',
            'lNameError' => '',
            'haveError' => 0,
            'contactNoError' => '',
            'oldProfImg' => $profileData->imgPath

         ];
         // print_r($profileData);
         // echo ("Ok");
         // echo ($profileData->fName);
         // die();


         $this->view('customer/cust_profileSettings', $data);
      }
   }

   public function removeCustImg()
   {
      $result = 'false';
      $result = $this->customerModel->removeCustImg(Session::getUser("id"));
      Toast::setToast(1, "Profile image removed.", "");

      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($result));
   }
   public function getCustomerHeaderImg()
   {

      $result = $this->customerModel->getCustomerByMobileNo(Session::getUser("mobileNo"))->imgPath;

      if ($result)
      {
         $path = 'http://localhost/beauty-craft/public/imgs/customerImgs/' . $result;
      }
      else
      {
         $path = 'http://localhost/beauty-craft/public/imgs/customerImgs/customerbarimg.png';
      }

      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($path));
   }
}
