<?php
class Request
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    // Create a new request
    public function createRequest($donation_id, $beneficiary_id, $purpose)
    {
        if (empty($purpose)) {
            $_SESSION['errorMessage'] = "Please provide a reason or purpose for your request.";
            header("location: ../../request-donation.php?donation_id=$donation_id");
            exit(0);
        }

        $sql = "INSERT INTO requests (beneficiary_id, donation_id, purpose, status) VALUES (?, ?, ?, 0)";
        $statement = $this->db->prepare($sql);
        $result = $statement->execute([$beneficiary_id, $donation_id, $purpose]);

        if ($result) {
            header("location: ../../request-donation.php?donation_id=$donation_id");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something went wrong while submitting your request.";
            header("location: ../../request-donation.php?donation_id=$donation_id");
            exit(0);
        }
    }

    // ✅ Update request status
    public function updateRequestStatus($request_id, $status)
    {
        $sql = "UPDATE requests SET status = ? WHERE id = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$status, $request_id]);

        if ($statement) {
            $_SESSION['successMessage'] = "Request status updated successfully! Email sent to recipients";
            header("location: ../beneficiary-requests.php");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Failed to update status.";
            header("location: ../beneficiary-requests.php");
            exit(0);
        }
    }

    public function donorUpdateRequestStatus($request_id, $status)
    {
        $sql = "UPDATE requests SET status = ? WHERE id = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$status, $request_id]);

        if ($statement) {
            $_SESSION['successMessage'] = "Request status updated successfully! Email sent to recipients";
            header("location: ../donor-view-requests.php");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Failed to update status.";
            header("location: ../donor-view-requests.php");
            exit(0);
        }
    }

    // ✅ Get request by ID
    public function getRequestById($id)
    {
        $sql = "SELECT * FROM requests WHERE id = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // Check if user has made donation before

    public function getRequestByUserAndDonation($beneficiary_id, $donation_id)
    {
        $sql = "SELECT * FROM requests WHERE beneficiary_id = ? AND donation_id = ? LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$beneficiary_id, $donation_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRequestByDonor($request_id)
    {
        $query = "
        SELECT 
            r.id AS request_id,
            r.purpose,
            r.status,
            r.created_at,
            r.beneficiary_id,
            d.id AS donation_id,
            d.title AS donation_title,
            d.brand AS donation_brand,
            d.image AS donation_image,
            u.full_Name AS beneficiary_name,
            u.email AS beneficiary_email
        FROM requests r
        INNER JOIN donations d ON r.donation_id = d.id
        LEFT JOIN users u ON r.beneficiary_id = u.id
        WHERE r.id = ?
        ORDER BY r.created_at DESC
    ";

        $statement = $this->db->prepare($query);
        $statement->execute([$request_id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getRequestByBeneficiary($beneficiary_id)
    {
        $query = "
        SELECT 
            r.id AS request_id,
            r.purpose,
            r.status,
            r.created_at,
            r.beneficiary_id,
            d.id AS donation_id,
            d.title AS donation_title,
            d.brand AS donation_brand,
            d.image AS donation_image,
            du.full_name AS donor_name,
            du.email AS donor_email
        FROM requests r
        INNER JOIN donations d ON r.donation_id = d.id
        INNER JOIN users du ON d.donor_id = du.id
        WHERE r.beneficiary_id = ?
        ORDER BY r.created_at DESC
    ";

        $statement = $this->db->prepare($query);
        $statement->execute([$beneficiary_id]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRequestsByDonor($donor_id)
    {
        $query = "
        SELECT 
            r.id AS request_id,
            r.purpose,
            r.status,
            r.created_at,
            r.beneficiary_id,
            d.id AS donation_id,
            d.title AS donation_title,
            d.brand AS donation_brand,
            d.image AS donation_image,
            u.full_Name AS beneficiary_name,
            u.email AS beneficiary_email
        FROM requests r
        INNER JOIN donations d ON r.donation_id = d.id
        LEFT JOIN users u ON r.beneficiary_id = u.id
        WHERE d.donor_id = ?
        ORDER BY r.created_at DESC
    ";

        $statement = $this->db->prepare($query);
        $statement->execute([$donor_id]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countRequestsByDonor($donor_id)
    {
        $query = "
        SELECT COUNT(*) 
        FROM requests r
        INNER JOIN donations d ON r.donation_id = d.id
        WHERE d.donor_id = ?
    ";

        $statement = $this->db->prepare($query);
        $statement->execute([$donor_id]);
        return (int) $statement->fetchColumn();
    }

    public function countDonationsByDonor($donor_id)
    {
        $query = "
        SELECT COUNT(*) 
        FROM donations 
        WHERE donor_id = ?
    ";

        $statement = $this->db->prepare($query);
        $statement->execute([$donor_id]);
        return (int) $statement->fetchColumn();
    }


    public function getAllBnfRequests()
    {
        $query = "
        SELECT 
            r.id AS request_id,
            r.purpose,
            r.status,
            r.created_at,
            d.id AS donation_id,
            d.title AS donation_title,
            d.brand AS donation_brand,
            d.image AS donation_image
        FROM requests r
        LEFT JOIN donations d ON r.donation_id = d.id
        ORDER BY r.created_at DESC
    ";

        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countRequestsByBeneficiary($beneficiary_id)
    {
        $query = "
        SELECT COUNT(*) 
        FROM requests 
        WHERE beneficiary_id = ?
    ";

        $statement = $this->db->prepare($query);
        $statement->execute([$beneficiary_id]);
        return (int) $statement->fetchColumn();
    }

    public function viewBnfRequest($request_id)
    {
        $query = "
        SELECT 
            r.id AS request_id,
            r.purpose,
            r.status,
            r.created_at,
            d.id AS donation_id,
            d.title AS donation_title,
            d.brand AS donation_brand,
            d.image AS donation_image
        FROM requests r
        LEFT JOIN donations d ON r.donation_id = d.id
        WHERE r.id = ?
        ORDER BY r.created_at DESC
    ";

        $statement = $this->db->prepare($query);
        $statement->execute([$request_id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteRequest($request_id, $beneficiary_id)
    {
        $query = "DELETE FROM requests WHERE id = ? AND beneficiary_id = ?";
        $statement = $this->db->prepare($query);
        $statement->execute([$request_id, $beneficiary_id]);

        if ($statement) {
            $_SESSION['successMessage'] = "Request status deleted successfully!";
            header("location: ../view-requests.php");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Failed to delete request.";
            header("location: ../view-requests.php");
            exit(0);
        }
    }
}
