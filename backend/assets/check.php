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


class dbConnect
{
    private $host = 'localhost';
    private $user = 'root';
    private $dbname = 'restro';
    private $password = '';

    function connect()
    {
        try {
            $conn = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->dbname . ';', $this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
        }
    }
}


class restroData
{
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

    function setrestroId($restro_id)
    {
        $this->restro_id = $restro_id;
    }

    function setrestroCategoryId($restro_category_id)
    {
        $this->restro_category_id = $restro_category_id;
    }

    function setrestroName($restro_name)
    {
        $this->restro_name = $restro_name;
    }

    function setrestroDesc($restro_desc)
    {
        $this->restro_desc = $restro_desc;
    }

    function setrestroImage($restro_image)
    {
        $this->restro_image = $restro_image;
    }

    function setrestroImageAlt($restro_image_alt)
    {
        $this->restro_image_alt = $restro_image_alt;
    }
    function setrestroTabAvl($restro_tab_avl)
    {
        $this->restro_tab_avl = $restro_tab_avl;
    }

    function setrestroEmail($restro_email)
    {
        $this->restro_email = $restro_email;
    }

    function setrestroAddress($restro_address)
    {
        $this->restro_address = $restro_address;
    }

    function setrestroCityId($restro_city_id)
    {
        $this->restro_city_id = $restro_city_id;
    }

    function setrestroPincode($restro_pincode)
    {
        $this->restro_pincode = $restro_pincode;
    }

    function setrestroPhoneNo($restro_phone_no)
    {
        $this->restro_phone_no = $restro_phone_no;
    }

    function setrestroContactNo($restro_contact_no)
    {
        $this->restro_contact_no = $restro_contact_no;
    }

    function getrestroId()
    {
        return $this->restro_id;
    }

    function getrestroCategoryId()
    {
        return $this->restro_category_id;
    }

    function getrestroName()
    {
        return $this->restro_name;
    }

    function getrestroDesc()
    {
        return $this->restro_desc;
    }

    function getsetrestroImage()
    {
        return $this->restro_image;
    }

    function getrestroImageAlt()
    {
        return $this->restro_image_alt;
    }
    function getrestroTabAvl()
    {
        return $this->restro_tab_avl;
    }

    function getrestroEmail()
    {
        return $this->restro_email;
    }

    function getrestroAddress()
    {
        return $this->restro_address;
    }

    function getrestroCityId()
    {
        return $this->restro_city_id;
    }

    function getrestroPincode()
    {
        return $this->restro_pincode;
    }

    function getrestroPhoneNo()
    {
        return $this->restro_phone_no;
    }

    function getrestroContactNo()
    {
        return $this->restro_contact_no;
    }


    function __construct()
    {
        $db = new dbConnect;
        $this->dbconn = $db->connect();
    }

    function restroInsert()
    {

        $query = "INSERT INTO restaurant (restro_name,restro_desc,restro_image,restro_image_alt,restro_tab_avl,restro_email,restro_address,restro_city_id,restro_pincode,restro_phone_no,restro_contact_no) ";
        $query .= "VALUES(:restro_name,:restro_desc,:restro_image,:restro_image_alt,:restro_tab_avl,:restro_email,:restro_address,:restro_city_id,:restro_pincode,:restro_phone_no,:restro_contact_no)";

        $stmt = $this->dbconn->prepare($query);
        //$stmt->bindParam(':restro_category_id',$this->restro_category_id);
        $stmt->bindParam(':restro_name', $this->restro_name);
        $stmt->bindParam(':restro_desc', $this->restro_desc);
        $stmt->bindParam(':restro_image', $this->restro_image);
        $stmt->bindParam(':restro_image_alt', $this->restro_image_alt);
        $stmt->bindParam(':restro_tab_avl', $this->restro_tab_avl);
        $stmt->bindParam(':restro_email', $this->restro_email);
        $stmt->bindParam(':restro_address', $this->restro_address);
        $stmt->bindParam(':restro_city_id', $this->restro_city_id);
        $stmt->bindParam(':restro_pincode', $this->restro_pincode);
        $stmt->bindParam(':restro_phone_no', $this->restro_phone_no);
        $stmt->bindParam(':restro_contact_no', $this->restro_contact_no);
        $stmt->execute();
        if ($stmt->errorCode()) {
            return 1;
        } else {
            return 0;
        }
    }

    function restroLocations()
    {

        $query = "SELECT DISTINCT (restro_city) FROM restaurant";

        $stmt = $this->dbconn->prepare($query);
        $stmt->execute();
        if (!$stmt->errorCode()) {
            die('Query Failed');
        } else {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function restroLocByCity()
    {

        $query = "SELECT *FROM restaurant WHERE restro_city_id=:restro_city_id";

        $stmt = $this->dbconn->prepare($query);
        $stmt->bindParam(':restro_city_id', $this->restro_city_id);
        $stmt->execute();
        if (!$stmt->errorCode()) {
            die('Query Failed');
        } else {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function updateRestroTable($stat)
    {
        if ($stat == 1) {
            $query = "UPDATE restaurant SET restro_tab_avl = restro_tab_avl - 1 WHERE restro_id = :restro_id";
        } else {
            $query = "UPDATE restaurant SET restro_tab_avl = restro_tab_avl + 1 WHERE restro_id = :restro_id";
        }
        $stmt = $this->dbconn->prepare($query);
        $stmt->bindParam(':restro_id', $this->restro_id);
        $stmt->execute();

        if (!$stmt->errorCode()) {
            die('Query Failed');
        } else {
            return 0;
        }
    }
}

class restroLocData
{
    private $dbconn;
    private $restro_loc_id;
    private $restro_loc_city_name;

    function setrestroLocId($restro_loc_id)
    {
        $this->restro_loc_id = $restro_loc_id;
    }

    function setrestroCityName($restro_loc_city_name)
    {
        $this->restro_loc_city_name = $restro_loc_city_name;
    }

    function getrestroLocId()
    {
        return $this->restro_loc_id;
    }

    function getrestroCityName()
    {
        return $this->restro_loc_city_name;
    }


    function __construct()
    {
        $db = new dbConnect;
        $this->dbconn = $db->connect();
    }

    function restroLocInsert()
    {

        $query_pre = "SELECT * FROM restro_locations WHERE restro_loc_city_name = :restro_loc_city_name";
        $stmt_pre = $this->dbconn->prepare($query_pre);
        $stmt_pre->bindParam(':restro_loc_city_name', $this->restro_loc_city_name);
        $stmt_pre->execute();
        if ($stmt_pre->rowCount() > 0) {
            die("Location Already exists");
        }

        $query = "INSERT INTO restro_locations (restro_loc_city_name) ";
        $query .= "VALUES(:restro_loc_city_name)";

        $stmt = $this->dbconn->prepare($query);
        //$stmt->bindParam(':restro_category_id',$this->restro_category_id);
        $stmt->bindParam(':restro_loc_city_name', $this->restro_loc_city_name);
        $stmt->execute();
        if ($stmt->errorCode()) {
            return 1;
        } else {
            return 0;
        }
    }

    function restroLocShow()
    {

        $query = "SELECT * FROM restro_locations";

        $stmt = $this->dbconn->prepare($query);
        $stmt->execute();
        if (!$stmt->errorCode()) {
            die('Query Failed');
        } else {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function restroLocShowById()
    {

        $query = "SELECT * FROM restro_locations WHERE restro_loc_id = :restro_loc_id";

        $stmt = $this->dbconn->prepare($query);
        $stmt->bindParam(':restro_loc_id', $this->restro_loc_id);
        $stmt->execute();
        if (!$stmt->errorCode()) {
            die('Query Failed');
        } else {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
}

class user
{
    private $user_id;
    private $email;
    private $username;
    private $password;
    private $role;
    private $phone_no;
    private $address;
    private $pincode;
    private $dbconn;

    function __construct()
    {
        $db = new dbConnect;
        $this->dbconn = $db->connect();
    }

    function getUser_id()
    {
        return $this->user_id;
    }

    function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function getUsername()
    {
        return $this->username;
    }

    function setUsername($username)
    {
        $this->username = $username;
    }

    function getPassword()
    {
        return $this->password;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

    function getRole()
    {
        return $this->role;
    }

    function setRole($role)
    {
        $this->role = $role;
    }

    function getPhone_no()
    {
        return $this->phone_no;
    }

    function setPhone_no($phone_no)
    {
        $this->phone_no = $phone_no;
    }

    function getAddress()
    {
        return $this->address;
    }

    function setAddress($address)
    {
        $this->address = $address;
    }

    function getPincode()
    {
        return $this->pincode;
    }

    function setPincode($pincode)
    {
        $this->pincode = $pincode;
    }

    function createUser()
    {
        $query_pre = "SELECT * FROM user WHERE email=:email";
        $stmt_pre = $this->dbconn->prepare($query_pre);
        $stmt_pre->bindParam(':email', $this->email);
        $stmt_pre->execute();
        if ($stmt_pre->rowCount() == 0) {
            $query = "INSERT INTO user (username,email, password) VALUES (:username, :email, :password)";
            $stmt = $this->dbconn->prepare($query);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
            $stmt->execute();
            if (!$stmt->errorCode()) {
                die('Error');
            } else {
                return 0;
            }
        }
    }

    function loginAccess()
    {
        $query = "SELECT * FROM user WHERE email= :email";
        $stmt = $this->dbconn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        if (!$stmt->errorCode()) {
            die('Error');
        } else {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($this->password, $row['password'])) {
                session_start();
                session_regenerate_id();
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_email'] = $row['email'];
                return 1;
            } else {
                return 0;
            }
        }
    }
}

class userBook
{
    private $user_book_id;
    private $user_id;
    private $user_restaurant_id;
    private $user_time;
    private $user_date;
    private $user_phone;
    private $user_guest;
    private $dbconn;

    function __construct()
    {
        $db = new dbConnect;
        $this->dbconn = $db->connect();
    }

    function getUser_book_id()
    {
        return $this->user_book_id;
    }

    function setUser_book_id($user_book_id)
    {
        $this->user_book_id = $user_book_id;
    }

    function getUser_id()
    {
        return $this->user_id;
    }

    function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    function getUser_restaurant_id()
    {
        return $this->user_restaurant_id;
    }

    function setUser_restaurant_id($user_restaurant_id)
    {
        $this->user_restaurant_id = $user_restaurant_id;
    }
    function getUser_time()
    {
        return $this->user_time;
    }

    function setUser_time($user_time)
    {
        $this->user_time = $user_time;
    }

    function getUser_date()
    {
        return $this->user_date;
    }

    function setUser_date($user_date)
    {
        $this->user_date = $user_date;
    }

    function getUser_phone()
    {
        return $this->user_phone;
    }

    function setUser_phone($user_phone)
    {
        $this->user_phone = $user_phone;
    }

    function getUser_guest()
    {
        return $this->user_guest;
    }

    function setUser_guest($user_guest)
    {
        $this->user_guest = $user_guest;
    }

    function bookRestro()
    {
        $query = "INSERT INTO user_book (user_id,user_restaurant_id,user_time,user_date,user_phone,user_guest) VALUES (:user_id,:user_restaurant_id,:user_time,:user_date,:user_phone,:user_guest)";
        $stmt = $this->dbconn->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':user_restaurant_id', $this->user_restaurant_id);
        $stmt->bindParam(':user_time', $this->user_time);
        $stmt->bindParam(':user_date', $this->user_date);
        $stmt->bindParam(':user_phone', $this->user_phone);
        $stmt->bindParam(':user_guest', $this->user_guest);
        $stmt->execute();
        if (!$stmt->errorCode()) {
            die('Error');
        } else {
            return 0;
        }
    }

    function bookedRestro()
    {
        $query = "SELECT * FROM user_book WHERE user_id = :user_id";
        $stmt = $this->dbconn->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();
        if (!$stmt->errorCode()) {
            die('Error');
        } else {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function bookedRestroFullData()
    {
        $query = "SELECT * FROM user_book INNER JOIN restaurant ON user_book.user_restaurant_id = restaurant.restro_id  WHERE user_id = :user_id AND soft_delete='no'";
        $stmt = $this->dbconn->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();
        if (!$stmt->errorCode()) {
            die('Error');
        } else {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}
