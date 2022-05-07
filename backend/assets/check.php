<?php
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME']) && !isset($_SERVER['HTTP_REFERER'])) {
    /*
    Up to you which header to send, some prefer 404 even if
    the files does exist for security
    */
    header('HTTP/1.0 403 Forbidden', TRUE, 403);

    /* choose the appropriate page to redirect users */
    die(header('location: /new_blog/error403.php'));
}


class dbConnect {
    private $host = 'localhost';
    private $user = 'root';
    private $dbname = 'restro';
    private $password = '';

    function connect() {
        try{
            $conn = new PDO('mysql:host='.$this->host.'; dbname='.$this->dbname.';',$this->user,$this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e){
            echo 'Database Error: '. $e->getMessage();
        }
    }
}


class restroData {
    private $restro_id;
    private $restro_category_id;
    private $restro_name;
    private $restro_desc;
    private $restro_image;
    private $restro_image_alt;
    private $restro_tab_avl;
    
    private $restro_email;
    private $restro_address;
    private $restro_city_id;
    private $restro_pincode;
    private $restro_phone_no;
    private $restro_contact_no;
    private $dbconn;

    function setrestroId($restro_id) {
        $this->restro_id = $restro_id;
    }

    function setrestroCategoryId($restro_category_id) {
        $this->restro_category_id= $restro_category_id;
    }

    function setrestroName($restro_name) {
        $this->restro_name = $restro_name;
    }

    function setrestroDesc($restro_desc) {
        $this->restro_desc = $restro_desc;
    }

    function setrestroImage($restro_image) {
        $this->restro_image = $restro_image;
    }

    function setrestroImageAlt($restro_image_alt) {
        $this->restro_image_alt = $restro_image_alt;
    }
    function setrestroTabAvl($restro_tab_avl) {
        $this->restro_tab_avl = $restro_tab_avl;
    }

    function setrestroEmail($restro_email) {
        $this->restro_email = $restro_email;
    }

    function setrestroAddress($restro_address) {
        $this->restro_address = $restro_address;
    }

    function setrestroCityId($restro_city_id) {
        $this->restro_city_id = $restro_city_id;
    }

    function setrestroPincode($restro_pincode) {
        $this->restro_pincode = $restro_pincode;
    }

    function setrestroPhoneNo($restro_phone_no) {
        $this->restro_phone_no = $restro_phone_no;
    }
    
    function setrestroContactNo($restro_contact_no) {
        $this->restro_contact_no = $restro_contact_no;
    }

    function getrestroId() {
        return $this->restro_id;
    }
    
    function getrestroCategoryId() {
        return $this->restro_category_id;
    }

    function getrestroName() {
        return $this->restro_name;
    }

    function getrestroDesc() {
        return $this->restro_desc;
    }

    function getsetrestroImage() {
        return $this->restro_image;
    }

    function getrestroImageAlt() {
        return $this->restro_image_alt;
    }
    function getrestroTabAvl() {
        return $this->restro_tab_avl;
    }

    function getrestroEmail() {
        return $this->restro_email;
    }

    function getrestroAddress() {
        return $this->restro_address;
    }

    function getrestroCityId() {
        return $this->restro_city_id;
    }

    function getrestroPincode() {
        return $this->restro_pincode;
    }

    function getrestroPhoneNo() {
        return $this->restro_phone_no;
    }
    
    function getrestroContactNo() {
        return $this->restro_contact_no;
    }


    function __construct() {
        $db = new dbConnect;
        $this->dbconn = $db->connect();
    }

    function restroInsert() {

        $query = "INSERT INTO restaurant (restro_name,restro_desc,restro_image,restro_image_alt,restro_tab_avl,restro_email,restro_address,restro_city_id,restro_pincode,restro_phone_no,restro_contact_no) ";
        $query .="VALUES(:restro_name,:restro_desc,:restro_image,:restro_image_alt,:restro_tab_avl,:restro_email,:restro_address,:restro_city_id,:restro_pincode,:restro_phone_no,:restro_contact_no)";

        $stmt = $this->dbconn->prepare($query);
        //$stmt->bindParam(':restro_category_id',$this->restro_category_id);
        $stmt->bindParam(':restro_name',$this->restro_name);
        $stmt->bindParam(':restro_desc',$this->restro_desc);
        $stmt->bindParam(':restro_image',$this->restro_image);
        $stmt->bindParam(':restro_image_alt',$this->restro_image_alt);
        $stmt->bindParam(':restro_tab_avl',$this->restro_tab_avl);
        $stmt->bindParam(':restro_email',$this->restro_email);
        $stmt->bindParam(':restro_address',$this->restro_address);
        $stmt->bindParam(':restro_city_id',$this->restro_city_id);
        $stmt->bindParam(':restro_pincode',$this->restro_pincode);
        $stmt->bindParam(':restro_phone_no',$this->restro_phone_no);
        $stmt->bindParam(':restro_contact_no',$this->restro_contact_no);
        $stmt->execute();
        if($stmt->errorCode()) {
            return 1;
        } else {
            return 0;
        }
    }

    function restroLocations() {

        $query = "SELECT DISTINCT (restro_city) FROM restaurant";

        $stmt = $this->dbconn->prepare($query);
        $stmt->execute();
        if(!$stmt->errorCode()) {
            die('Query Failed');
        } else {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function restroLocByCity() {

        $query = "SELECT *FROM restaurant WHERE restro_city_id=:restro_city_id";

        $stmt = $this->dbconn->prepare($query);
        $stmt->bindParam(':restro_city_id',$this->restro_city_id);
        $stmt->execute();
        if(!$stmt->errorCode()) {
            die('Query Failed');
        } else {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }


}

class restroLocData {
    private $restro_loc_id;
    private $restro_loc_city_name;

    function setrestroLocId($restro_loc_id) {
        $this->restro_loc_id= $restro_loc_id;
    }

    function setrestroCityName($restro_loc_city_name) {
        $this->restro_loc_city_name= $restro_loc_city_name;
    }

    function getrestroLocId() {
        return $this->restro_loc_id;
    }
    
    function getrestroCityName() {
        return $this->restro_loc_city_name;
    }


    function __construct() {
        $db = new dbConnect;
        $this->dbconn = $db->connect();
    }

    function restroLocInsert() {

        $query_pre = "SELECT * FROM restro_locations WHERE restro_loc_city_name = :restro_loc_city_name";
        $stmt_pre = $this->dbconn->prepare($query_pre);
        $stmt_pre->bindParam(':restro_loc_city_name',$this->restro_loc_city_name);
        $stmt_pre->execute();
        if($stmt_pre->rowCount() > 0) {
            die("Location Already exists");
        }

        $query = "INSERT INTO restro_locations (restro_loc_city_name) ";
        $query .="VALUES(:restro_loc_city_name)";

        $stmt = $this->dbconn->prepare($query);
        //$stmt->bindParam(':restro_category_id',$this->restro_category_id);
        $stmt->bindParam(':restro_loc_city_name',$this->restro_loc_city_name);
        $stmt->execute();
        if($stmt->errorCode()) {
            return 1;
        } else {
            return 0;
        }
    }

    function restroLocShow() {

        $query = "SELECT * FROM restro_locations";

        $stmt = $this->dbconn->prepare($query);
        $stmt->execute();
        if(!$stmt->errorCode()) {
            die('Query Failed');
        } else {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function restroLocShowById() {

        $query = "SELECT * FROM restro_locations WHERE restro_loc_id = :restro_loc_id";

        $stmt = $this->dbconn->prepare($query);
        $stmt->bindParam(':restro_loc_id',$this->restro_loc_id);
        $stmt->execute();
        if(!$stmt->errorCode()) {
            die('Query Failed');
        } else {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
}

if(isset($_POST['book_submit'])) {
    print_r($_POST);
    session_start();
    $_SESSION['book_date'] = $_POST['book_date'];
    $_SESSION['book_time'] = $_POST['book_time'];
    $_SESSION['book_phone'] = $_POST['book_phone'];
    $_SESSION['book_guest'] = $_POST['book_guest'];
    $_SESSION['submit_check'] = 1;
    header('location: ../../booked.php');
}

?>