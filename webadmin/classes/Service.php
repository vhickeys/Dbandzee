<?php

class Service
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    // ✅ CREATE SERVICE
    public function createService($service_name, $caption, $description, $image, $status)
    {
        $slug = generateSlug($service_name);
        $slug = createUniqueSlug($this->db, $slug);

        $image_name      = $image['name'];
        $image_size      = $image['size'];
        $image_tmp_name  = $image['tmp_name'];
        $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $filename        = uniqid() . '.' . $image_extension;

        $valid_extensions = ['jpg', 'jpeg', 'png', 'webp'];

        if ($image_name != null) {

            if (! in_array($image_extension, $valid_extensions)) {
                $_SESSION['errorMessage'] = "Invalid file format!";
                header("location: ../create-service.php");
                exit(0);
            }

            if ($image_size > 512000) {
                $_SESSION['errorMessage'] = "File too large!";
                header("location: ../create-service.php");
                exit(0);
            }

            $destination = "../../assets/images/services/$filename";
            move_uploaded_file($image_tmp_name, $destination);

            $sql = "INSERT INTO services(service_name, slug, caption, description, image, status)
                VALUES(?,?,?,?,?,?)";

            $statement = $this->db->prepare($sql);
            $insert    = $statement->execute([$service_name, $slug, $caption, $description, $filename, $status]);

            if ($insert) {
                $_SESSION['successMessage'] = "Service created successfully!";
                header("location: ../view-services.php");
                exit(0);
            } else {
                $_SESSION['errorMessage'] = "Something went wrong!";
                header("location: ../create-service.php");
                exit(0);
            }

        } else {
            $_SESSION['errorMessage'] = "Please upload an image.";
            header("location: ../create-service.php");
            exit(0);
        }
    }

    // ✅ UPDATE SERVICE
    public function updateService($service_id, $service_name, $caption, $description, $image, $old_image, $status)
    {
        $slug = generateSlug($service_name);
        $slug = createUniqueSlug($this->db, $slug);

        $image_name      = $image['name'];
        $image_size      = $image['size'];
        $image_tmp_name  = $image['tmp_name'];
        $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $filename        = uniqid() . '.' . $image_extension;

        $valid_extensions = ['jpg', 'jpeg', 'png', 'webp'];

        if ($image_name != null) {

            if (! in_array($image_extension, $valid_extensions)) {
                $_SESSION['errorMessage'] = "Invalid file format!";
                header("location: ../edit-service.php?id=$service_id");
                exit(0);
            }

            if ($image_size > 512000) {
                $_SESSION['errorMessage'] = "File too large!";
                header("location: ../edit-service.php?id=$service_id");
                exit(0);
            }

            // delete old image
            $old_path = "../../assets/images/services/$old_image";
            if (file_exists($old_path)) {
                unlink($old_path);
            }

            // upload new
            $destination = "../../assets/images/services/$filename";
            move_uploaded_file($image_tmp_name, $destination);

            $sql = "UPDATE services
                SET service_name=?, slug=?, caption=?, description=?, image=?, status=?
                WHERE id=?";

            $statement = $this->db->prepare($sql);
            $update    = $statement->execute([$service_name, $slug, $caption, $description, $filename, $status, $service_id]);

        } else {

            $sql = "UPDATE services
                SET service_name=?, slug=?, caption=?, description=?, status=?
                WHERE id=?";

            $statement = $this->db->prepare($sql);
            $update    = $statement->execute([$service_name, $slug, $caption, $description, $status, $service_id]);
        }

        if ($update) {
            $_SESSION['successMessage'] = "Service updated successfully!";
            header("location: ../view-services.php");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something went wrong!";
            header("location: ../edit-service.php?id=$service_id");
            exit(0);
        }
    }

    // ✅ GET ALL SERVICES
    public function getServices($status='active')
    {
        $sql       = "SELECT * FROM services WHERE status=? ORDER BY created_at DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute([$status]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // ✅ GET SINGLE SERVICE
    public function getServiceById($id)
    {
        $sql       = "SELECT * FROM services WHERE id = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // ✅ UPDATE STATUS ONLY (Optional but useful)
    public function updateServiceStatus($service_id, $status)
    {
        $sql       = "UPDATE services SET status = ? WHERE id = ?";
        $statement = $this->db->prepare($sql);
        $update    = $statement->execute([$status, $service_id]);

        if ($update) {
            $_SESSION['successMessage'] = "Service status updated!";
        } else {
            $_SESSION['errorMessage'] = "Failed to update status.";
        }

        header("location: ../view-services.php");
        exit(0);
    }
}
