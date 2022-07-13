<?php

use module\viewEvents\viewEvents\viewEvents\viewEvents;



include "../../DB/db.php";
include "../Template/header.php";
include "../../module/viewEvents/viewEvents.php";

$_event = new viewEvents();
$event = $_event->displayEventDetails($_GET['eid']);

?>

<div class="my-32">
  <div class="relative px-6 pt-10 pb-8 bg-white shadow-xl ring-2  ring-indigo-300 ring-gray-900/5 max-w-4xl sm:mx-auto sm:rounded-lg sm:px-10 ">
    <?php
    if (!empty($event)) {
      foreach ($event as  $row) :  
      
         if($row['slots'] == 'slot1'){
           $row['slots'] = '9.00 am - 11.00 am';
        }elseif($row['slots'] == 'slot2'){
           $row['slots'] = '2.00 pm - 4.00 pm';
        }elseif($row['slots'] == 'slot3'){
           $row['slots'] = '8.00 pm - 11.00 pm';
        }else{
            $row['slots'] = $row['slots'];
        }
      
      ?>
        <div class="max-w-md mx-auto flex">
          <img class="relative right-48 object-cover w-full h-96 rounded-t-lg md:h-auto md:w-96 md:rounded-none md:rounded-l-lg " src="../../views/manageEvent/<?= $row['banners'] ?>" alt="BannerImage">
          <div class="divide-y divide-gray-300/50 relative right-36">
            <div class="py-8 text-base leading-7 space-y-6 text-gray-600 w-96">
              <!-- <h1 class="text-base">Event title:</h1> -->
              <h1 class="text-2xl"><b><?= $row['title'] ?></b></h1>
              <br>
              <h1 class="text-base"><b>Event Description:</b></h1>
              <p><?= $row['descriptions']  ?></p>
              <br><br><br>
              <h2 class="text-base"><b>Event Slot: </b><?= ucfirst($row['slots'])?> </h2>
              <h2><b>Date: </b><?= $row['dates'] ?></h2>
              <h2 class="text-base"><b>Venue: </b>Prodigy Studio, <?= $row['locations'] ?></h2>
            </div>
          </div>
      <?php endforeach;
    } ?>
        </div>
        
            
       
        <div class="flex justify-end relative bottom-12 right-10 -mb-12 mt-10">
          <a   <?php if(isset($_SESSION['username'])){
        if($_SESSION['username'] == 'admin'){
            echo "hidden"; }} ?>  href="tempbook.php?eid=<?= $_GET['eid'] ?>" class="cursor-pointer text-center w-96 px-5 py-3 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none max-w-xs">BOOK TICKET</a>
        </div>
  </div>
</div>

<!-- 
<div class="my-36">
  <div class="relative px-6 pt-10 pb-8 bg-white shadow-xl ring-1 ring-gray-900/5 max-w-4xl sm:mx-auto sm:rounded-lg sm:px-10 ">
    <div class="max-w-md mx-auto flex">
   
          <img class="relative right-48 object-cover w-full h-96 rounded-t-lg md:h-auto md:w-96 md:rounded-none md:rounded-l-lg " src="../../views/manageEvent/<?= $row['banners'] ?>" alt="asdsadsad">
          <div class="divide-y divide-gray-300/50 relative right-36">
            <div class="py-8 text-base leading-7 space-y-6 text-gray-600 w-96">
              <h1 class="text-2xl"><b><?= $row['title'] ?></b></h1>
              <br>
              <p><?= $row['descriptions'] ?></p>
              <br><br><br>
              <h2 class="text-base"><b>Event time and date: </b><?= $row['slots'] ?> , <?= $row['dates'] ?></h2>
              <h2 class="text-base"><b>Venue: </b>Prodigy Studio, <?= $row['locations'] ?></h2>
            </div>
          </div>
     
    </div>
    <div class="flex justify-end relative bottom-12 right-10 -mb-12 mt-10">
      <a href="tempbook.php?eid=<?= $_GET['eid'] ?>" class="cursor-pointer text-center w-96 px-5 py-3 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none max-w-xs">BOOK TICKET</a>
    </div>
  </div>
</div> -->
<?php
include "../Template/footer.php";
?>