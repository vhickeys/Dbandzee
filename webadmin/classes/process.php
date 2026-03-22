<?php
require 'functions.php';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {

        // Create Normal User
        case 'create-user':
            $full_name     = $_POST['full_name'];
            $email         = $_POST['email'];
            $password      = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $phone         = $_POST['phone'] ?? null;
            $address       = $_POST['address'] ?? null;
            $role          = $_POST['role'] ?? '0';
            $profile_photo = $_FILES['profile_photo'] ?? null;

            $user->createUser($full_name, $email, $password, $phone, $address, $role, $profile_photo);
            break;

        case 'registerUser':
            if (isset($_POST)) {
                $adminFname    = $_POST['adminFname'];
                $adminEmail    = $_POST['adminEmail'];
                $adminPassword = $_POST['adminPassword'];
                $role          = $_POST['role'];

                $user->registerUser($adminFname, $adminEmail, $adminPassword, $role);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'loginUser':
            if (isset($_POST)) {
                $adminEmail    = $_POST['adminEmail'];
                $adminPassword = $_POST['adminPassword'];

                $user->loginUser($adminEmail, $adminPassword);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'changePassword':
            if (isset($_POST)) {
                $userId       = $_POST['userId'];
                $new_password = $_POST['new_password'];

                $user->changePassword($userId, $new_password);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'contactSubmit':
            if (isset($_POST)) {
                $firstname = $_POST['firstname'];
                $lastname  = $_POST['lastname'];
                $email     = $_POST['email'];
                $phone     = $_POST['phone'];
                $subject   = $_POST['subject'];
                $message   = $_POST['message'];

                $contact->contactSubmit($firstname, $lastname, $email, $phone, $subject, $message);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'loginAdmin':
            if (isset($_POST['adminLoginSubmit'])) {
                $adminEmail    = $_POST['adminEmail'];
                $adminPassword = $_POST['adminPassword'];

                $user->loginAdmin($adminEmail, $adminPassword);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'logout':
            if (isset($_POST)) {

                $user->logoutUser();
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        // SERVICES

        case 'create-service':
            if (isset($_POST['submit-service'])) {

                $service_name = $_POST['service_name'];
                $caption      = $_POST['caption'];
                $description  = $_POST['description'];
                $image        = $_FILES['image'];
                $status       = $_POST['status']; // active or inactive

                $service->createService($service_name, $caption, $description, $image, $status);

            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'update-service':
            if (isset($_POST['edit-service'])) {

                $service_id   = $_POST['service_id'];
                $service_name = $_POST['service_name'];
                $caption      = $_POST['caption'];
                $description  = $_POST['description'];
                $image        = $_FILES['image'];
                $old_image    = $_POST['old_image'];
                $status       = $_POST['status']; // active or inactive

                $service->updateService(
                    $service_id,
                    $service_name,
                    $caption,
                    $description,
                    $image,
                    $old_image,
                    $status
                );

            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        // Requests

        case 'make-donation-request':
            if (isset($_POST['createRequest'])) {
                $donation_id    = $_POST['donation_id'];
                $beneficiary_id = $_POST['beneficiary_id'];
                $purpose        = $_POST['purpose'];

                $request->createRequest($donation_id, $beneficiary_id, $purpose);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'update-request-status':
            if (isset($_POST['update_request_status'])) {

                $request_id = $_POST['request_id'];
                $status     = $_POST['status'];

                $request->updateRequestStatus($request_id, $status);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'donor-update-request-status':
            if (isset($_POST['donor_update_request_status'])) {

                $request_id = $_POST['request_id'];
                $status     = $_POST['status'];

                $request->donorUpdateRequestStatus($request_id, $status);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'delete-request':
            if (isset($_POST['delete-request'])) {
                $request_id     = $_POST['requestDeleteModalId'];
                $beneficiary_id = $_SESSION['user_data']['userId'] ?? 'Anonymous';

                $request->deleteRequest($request_id, $beneficiary_id);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'settings':
            if (isset($_POST['submit-settings'])) {

                $discount_offer = $_POST['discount_offer'];
                $about          = $_POST['about'];

                $phone          = $_POST['phone'];
                $email          = $_POST['email'];
                $office_address = $_POST['office_address'];

                $error_message  = $_POST['error_message'];
                $payment_notice = $_POST['payment_notice'];

                $facebook       = $_POST['facebook'];
                $instagram      = $_POST['instagram'];
                $twitter        = $_POST['twitter'];
                $linkedIn       = $_POST['linkedIn'];
                $youtube        = $_POST['youtube'];
                $whatsapp       = $_POST['whatsapp'];
                $whatsapp_group = $_POST['whatsapp_group'];

                $logo      = $_FILES['logo'];
                $old_image = $_POST['old_image'];
                $status    = $_POST['status'] == true ? '1' : '0';

                $settings->modifySettings($discount_offer, $about, $phone, $email, $office_address, $error_message, $payment_notice, $facebook, $instagram, $twitter, $linkedIn, $youtube, $whatsapp, $whatsapp_group, $logo, $old_image, $status, "1");
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'delete-user':
            if (isset($_POST['delete-user'])) {
                $user_Id = $_POST['userDeleteModalId'];
                $record->deleteRecord("users", $user_Id, "User", "view-users.php");
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'changeUserRole':
            if (isset($_POST['changeUserRoleBtn'])) {
                $user_Id   = $_POST['userId'];
                $user_role = $_POST['user_role'];
                $user->updateUserRole($user_role, $user_Id);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'setUserAccess':
            if (isset($_POST['userAccessBtn'])) {
                $userAccess = $_POST['userAccess'];
                $user_Id    = $_POST['user_id'];

                $userAccess == 1 ? $userAccess = 0 : $userAccess = 1;
                $user->userAccess($userAccess, $user_Id);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        default:
            # code...
            break;
    }
} else {
    echo "<script>window.location.href='../../index.php'</script>";
}
