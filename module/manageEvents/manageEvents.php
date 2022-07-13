<?php

namespace module\manageEvents\manageEvents;

session_start();
class manageEvents
{

    private $id;
    private $username;
    private $title;
    private $organizer;
    private $tag1;
    private $tag2;
    private $tag3;
    private $location;
    private $slots;
    private $date;
    private $description;
    private $ticketname;
    private $ticketquantity;
    private $ticketmax;
    private $ticketprice;
    private $slotdate;


    public function __construct()
    {
    }

    public function setCredentials($id, $title, $organizer, $tag1, $tag2, $tag3, $location, $slots, $date, $username)
    {
        $this->id = $id;
        $this->title = $title;
        $this->organizer = $organizer;
        $this->tag1 = $tag1;
        $this->tag2 = $tag2;
        $this->tag3 = $tag3;
        $this->location = $location;
        $this->slots = $slots;
        $this->date = $date;
        $this->username = $username;
    }
    public function generateRandomString($length = 25)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        if ($this->location == 'sangkarseni1') {
            $this->location = 'Sangkar Seni 1';
            $this->id = $randomString . 'SS1';
            $_SESSION['eid'] =  $this->id;
            // die($_SESSION['eid']);
        } else if ($this->location == 'sangkarseni2') {
            $this->location = 'Sangkar Seni 2';
            $this->id = $randomString . 'SS2';
            $_SESSION['eid'] =  $this->id;
        } else if ($this->location == 'sarangseni') {
            $this->location = 'Sarang Seni';
            $this->id = $randomString . 'SSE';
            $_SESSION['eid'] =  $this->id;
        } else
            $this->id = '##########';
        $_SESSION['eid'] =  $this->id;
    }

    public function insertEvent()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";

        $query = "INSERT INTO events (title,organizer,tag1,tag2,tag3,locations,slots,dates, event_id, event_status,created_by) VALUES('$this->title','$this->organizer', '$this->tag1','$this->tag2','$this->tag3', '$this->location', '$this->slots',  '$this->date' ,'$this->id', 'Draft','$this->username')";
        $conn->query($query);
        $query = "INSERT INTO ticket (event_id) VALUES('$this->id')";
        $conn->query($query);
        $conn->close();
        unset($_SESSION['tag1']);
        unset($_SESSION['tag2']);
        unset($_SESSION['tag3']);
    }
    //debug functions
    public function display()
    {
        echo $this->id;
        echo '<br>' . $this->title;
        echo '<br>' . $this->organizer;
        echo '<br>' . $this->tags;
        echo '<br>' . $this->location;
        echo '<br>' . $this->slots;
        echo '<br>' . $this->date;
    }



    public function uploadImage()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $targetDir = "../module/manageEvents/bannerUploads/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf',);
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                // die($this->id);
                $query = "INSERT into banners (file_name,uploaded_on,event_id) VALUES ('" . $fileName . "',NOW(),'$this->id')";
                $insert = $conn->query($query);
                // $insert = $conn->query("INSERT into banners (file_name, uploaded_on,event_id) VALUES ('" . $fileName . "', NOW()), '$this->id'");
                if ($insert) {
                    $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                } else {
                    $statusMsg = "File upload failed, please try again.";
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
        $conn->close();
    }

    public function insertDescription($description)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $this->description = $description;
        $query = "UPDATE events SET descriptions = '$this->description' WHERE event_id = '$this->id'";
        $conn->query($query);
        $conn->close();
    }

    public function setTicketDetail($ticketname, $ticketquantity, $ticketmax, $ticketprice)
    {
        $this->ticketname = $ticketname;
        $this->ticketquantity = $ticketquantity;
        $this->ticketmax = (int)$ticketmax;
        $this->ticketprice = number_format((float)$ticketprice, 2, '.', '');
    }
    public function insertTicketDetail()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $this->id = $_SESSION['eid'];
        $username = $_SESSION['username'];
        $quantity_left = $this->ticketquantity;
        $query = "UPDATE ticket SET ticketname ='$this->ticketname', quantity ='$this->ticketquantity' , max = $this->ticketmax, price = $this->ticketprice, quantity_left = '$quantity_left', username='$username' WHERE event_id ='$this->id' ";
        $conn->query($query);
        $conn->close();
    }
    public function updateStatus($status)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $this->id = $_SESSION['eid'];
        $query = "UPDATE events SET event_status ='$status' WHERE event_id ='$this->id' ";
        $conn->query($query);
        $conn->close();
    }

    public function deleteEvent($id)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $this->id = $id;
        // die($this->id );
        $query = "DELETE FROM events WHERE event_id = '$this->id' ";
        $conn->query($query);
        $conn->close();
    }

    public function setUpdateDetails($id, $title, $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;     
    }
    public function updateEvent()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $query = "UPDATE events SET title ='$this->title', descriptions = '$this->description' WHERE event_id = '$this->id'";
        $conn->query($query);
        $conn->close();
    }

    public function insertReceipt($event_id, $transaction_id, $billcode, $order_id, $status_id, $price)
    {
        
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $order_id = rand();
        $query = "INSERT INTO receipt (event_id,transaction_id,billcode,order_id,status_id,total_paid) VALUES('$event_id','$transaction_id','$billcode','$order_id','$status_id','$price');";
        $result = $conn->query($query);
        
        if($result == false){
        $query = "UPDATE receipt SET event_id = '$event_id',transaction_id ='$transaction_id',billcode='$billcode',order_id='$order_id',status_id='$status_id',total_paid = '$price' WHERE event_id = '$event_id'";
        $result = $conn->query($query);
        }

        if ($status_id == '1') {
            $query = "UPDATE events SET event_status = 'Published' WHERE event_id = '$event_id'";
            $conn->query($query);
        }
    }

    //not implementable yet
    public function viewPreview()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $this->id = $_SESSION['eid'];
        $query = "SELECT title,descriptions,slots,dates, locations FROM events WHERE event_id = '$this->id' LIMIT 1";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $title = $row["title"];
                $description = $row["descriptions"];
                $slots = $row["slots"];
                $dates = $row["dates"];
                $locations = $row["locations"];

                return   array($title, $description, $slots, $dates, $locations);
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }
    // event slot function
    public function setEventSlot($slotdate)
    {
        $this->slotdate = $slotdate;
        $_SESSION['slotdate'] = $this->slotdate;
    }

    public function displayEventSlot()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $query = "SELECT slot1,slot2,slot3 FROM eventslot WHERE event_date = '$this->slotdate'";
        // $result = $conn->query($query);  
        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function insertIntoEventSlot()
    {

        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";

        $this->slotdate = $_SESSION['slotdate'];
        $this->id = $_SESSION['eid'];
        // var_dump($this->id);
        // die();
        $query = "SELECT event_date FROM eventslot WHERE event_date = '$this->slotdate' LIMIT 1";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            if ($this->slots == 'slot1') {
                $query = "UPDATE eventslot SET slot1 = '$this->id' WHERE event_date = '$this->slotdate'";
                $result = $conn->query($query);
                $conn->close();
            } elseif ($this->slots == 'slot2') {
                $query = "UPDATE eventslot SET slot2 = '$this->id' WHERE event_date = '$this->slotdate'";
                $result = $conn->query($query);
                $conn->close();
            } elseif ($this->slots == 'slot3') {
                $query = "UPDATE eventslot SET slot3 = '$this->id' WHERE event_date = '$this->slotdate'";
                $result = $conn->query($query);
                $conn->close();
            }
        } else {
            if ($this->slots == 'slot1') {
                $query = "INSERT INTO eventslot (slot1,event_date) VALUES('$this->id','$this->slotdate')";
                $result = $conn->query($query);
                $conn->close();
            } elseif ($this->slots == 'slot2') {
                $query = "INSERT INTO eventslot (slot2,event_date) VALUES('$this->id') WHERE event_date = '$this->slotdate'";
                $result = $conn->query($query);
                $conn->close();
            } elseif ($this->slots == 'slot3') {
                $query = "INSERT INTO eventslot (slot3,event_date) VALUES('$this->id') WHERE event_date = '$this->slotdate'";
                $result = $conn->query($query);
                $conn->close();
            }
        }
    }
    // delete slot by setting it to null
    public function deleteEventSlot($id, $slot, $date)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        if ($slot == 'slot1') {
            $query = "UPDATE eventslot SET slot1 = NULL WHERE event_date = '$date' AND slot1='$id'";
            $result = $conn->query($query);
            $conn->close();
        }
        if ($slot == 'slot2') {
            $query = "UPDATE eventslot SET slot2 = NULL WHERE event_date = '$date' AND slot2='$id'";
            $result = $conn->query($query);
            $conn->close();
        }
        if ($slot == 'slot3') {
            $query = "UPDATE eventslot SET slot3 = NULL WHERE event_date = '$date' AND slot3='$id'";
            $result = $conn->query($query);
            $conn->close();
        }
    }

    public function insertProfitByTotal()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $query = "SELECT SUM(total_paid) FROM receipt";
        $result = $conn->query($query);
        foreach ($result as $row) {
            $total_event_profit = $row['SUM(total_paid)'];
        }

        $query = "SELECT * FROM profitbytotal";
        $result = $conn->query($query);

        if ($result->num_rows == 0) {
            $query = "INSERT INTO profitbytotal (profit_total) VALUES('$total_event_profit')";
            $result = $conn->query($query);
        } elseif ($result->num_rows > 0) {
            $query = "UPDATE profitbytotal SET profit_total = '$total_event_profit'";
            $result = $conn->query($query);         
        } else {
            echo "Oops . . . ";
        }
    }

    // experimental function(s) for temporary json

    function fileWriteAppend()
    {
        $current_data = file_get_contents('tempStorage\\temp.json');
        $array_data = json_decode($current_data, true);
        $extra = array(
            'event id'           =>     $this->id,
            'event title'        =>     $this->title,
            'event organizer'    =>     $this->organizer,
            'event tags'         =>     $this->tags,
            'event location'     =>     $this->location,
            'event slot'         =>     $this->slots,
            'event date'         =>     $this->date

        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        return $final_data;
    }
    function fileCreateWrite()
    {
        $file = fopen("tempStorage\\temp.json", "w");
        $array_data = array();
        $extra = array(
            'event id'           =>     $this->id,
            'event title'        =>     $this->title,
            'event organizer'    =>     $this->organizer,
            'event tags'         =>     $this->tags,
            'event location'     =>     $this->location,
            'event slot'         =>     $this->slots,
            'event date'         =>     $this->date

        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        fclose($file);
        return $final_data;
    }

    // else {
    //     $statusMsg = 'Please select a file to upload.';
    //     }
}
