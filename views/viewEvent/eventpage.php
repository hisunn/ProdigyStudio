<?php

use module\viewEvents\viewEvents\viewEvents\viewEvents;

include "../Template/header.php";
require "../../DB/db.php";
include "../../module/viewEvents/viewEvents.php";
$_event = new viewEvents();
$event = $_event->displayEvents();

if (isset($_GET['search'])) {

  $search = $_GET['search'];
  $query_sort = "SELECT events.title AS title,events.descriptions AS descriptions,events.dates AS dates, events.slots AS slots,events.tag1 AS tag1,events.tag2 AS tag2,events.tag3 AS tag3, banners.file_name AS file_name, events.event_id AS event_id FROM events INNER JOIN banners ON events.event_id = banners.event_id WHERE events.event_status = 'published' AND events.title LIKE '$search%'";
}


if (isset($_GET['sort'])) {

  $sort = $_GET['sort'];

  if ($sort == 'all') {
    $query_sort = "SELECT events.title AS title,events.descriptions AS descriptions,events.dates AS dates, events.slots AS slots,events.tag1 AS tag1,events.tag2 AS tag2,events.tag3 AS tag3, banners.file_name AS file_name, events.event_id AS event_id FROM events INNER JOIN banners ON events.event_id = banners.event_id WHERE events.event_status = 'published';";
  } elseif ($sort == 'sarangseni1') {
    $query_sort = "SELECT events.title AS title,events.descriptions AS descriptions,events.dates AS dates, events.slots AS slots,events.tag1 AS tag1,events.tag2 AS tag2,events.tag3 AS tag3, banners.file_name AS file_name, events.event_id AS event_id FROM events INNER JOIN banners ON events.event_id = banners.event_id WHERE events.event_status = 'published' AND events.locations = 'Sangkar Seni 1';";
  } elseif ($sort == 'sarangseni2') {
    $query_sort = "SELECT events.title AS title,events.descriptions AS descriptions,events.dates AS dates, events.slots AS slots,events.tag1 AS tag1,events.tag2 AS tag2,events.tag3 AS tag3, banners.file_name AS file_name, events.event_id AS event_id FROM events INNER JOIN banners ON events.event_id = banners.event_id WHERE events.event_status = 'published' AND events.locations = 'Sangkar Seni 2';";
  } elseif ($sort == 'sangkarseni') {
    $query_sort = "SELECT events.title AS title,events.descriptions AS descriptions,events.dates AS dates, events.slots AS slots,events.tag1 AS tag1,events.tag2 AS tag2,events.tag3 AS tag3, banners.file_name AS file_name, events.event_id AS event_id FROM events INNER JOIN banners ON events.event_id = banners.event_id WHERE events.event_status = 'published' AND events.locations = 'Sarang Seni';";
  }
}
?>

<h1 class="mb-8 text-5xl font-bold text-gray-900 mt-10 ml-10">Events @ Prodigy Studio</h1>

<div class="text-left">
  <div class="relative inline-flex">
    <h1 class="text-2xl font-bold text-gray-700 ml-11 mt-5">Sort event by
      <div class="relative inline-flex">
      <?php if (isset($_GET['search'])) { ?>
        <h1>Search</h1>
        <?php } ?>
            <?php if (isset($_GET['sort'])) { ?>
        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232">
          <path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero" />
        </svg>  
          <select onchange="" id="sort" class="cursor-pointer border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
            <option class="text-center" value="all">Choose eventspace</option>
            <option id="sort1" <?php if ($_GET['sort'] == 'all') {
                                  echo "selected";
                                } ?> value="all">All</option>
            <option id="sort2" <?php if ($_GET['sort'] == 'sarangseni1') {
                                  echo "selected";
                                } ?> value="sarangseni1">Sarang Seni 1</option>
            <option id="sort3" <?php if ($_GET['sort'] == 'sarangseni2') {
                                  echo "selected";
                                } ?> value="sarangseni2">Sarang Seni 2</option>
            <option id="sort4" <?php if ($_GET['sort'] == 'sangkarseni') {
                                  echo "selected";
                                } ?> value="sangkarseni">Sangkar Seni</option>
          </select>
        <?php } ?>
        <script>
          $('#sort').change(function() {
            var url = $(this).val();
            window.location = "eventpage.php?sort=" + url;
          });
        </script>
      </div>
  </div>
  <main class="py-16 container mx-auto -mt-12 px-6 md:px-0">
    <section>
      <h1 class="text-xl font-bold text-gray-700 -mb-5   mt-8">Latest Upcoming Event @ Prodigy Studio</h1> <br> <br>
      <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">
        <?php
        if (!empty($event)) {
          foreach ($event as  $row) :  ?>
            <a href="eventdetail.php?eid=<?= $row['event_id'] ?>">
              <div class="shadow-md hover:shadow-xl transition-shadow px-6 rounded-sm cursor-pointer w-full">
                <img class="w-full object-fill border-2 border-gray-200" src="../manageEvent/<?= $row['file_name'] ?>" alt="EventBanner">
                <h1 class="font-bold text-xl mb-2"><?= $row['title'] ?></h1>
                <p class="text-gray-700 text-base"><?= $row['descriptions'] ?></p>
                <div>
                  <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?= $row['tag1'] ?></span>
                  <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?= $row['tag2'] ?></span>
                  <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?= $row['tag3'] ?></span>
                
                </div> <br>

              </div>
          <?php endforeach;
        } ?>



      </div>

      </a>

    </section>



    <?php

    // $query = "SELECT events.title AS title,events.descriptions AS descriptions,events.dates AS dates, events.slots AS slots,events.tag1 AS tag1,events.tag2 AS tag2,events.tag3 AS tag3, banners.file_name AS file_name, events.event_id AS event_id FROM events INNER JOIN banners ON events.event_id = banners.event_id WHERE event_status = 'published'; ";
    $query = $query_sort;
    $result = $conn->query($query); ?>
    <?php if (isset($_GET['sort'])) { ?>
      <?php if ($_GET['sort'] == 'sarangseni1') { ?>
        <h1 class="text-xl font-bold text-gray-700 -mb-5 mt-8">Events @ Sarang Seni 1</h1>
      <?php } elseif ($_GET['sort'] == 'sarangseni2') { ?>
        <h1 class="text-xl font-bold text-gray-700 -mb-5 mt-8">Events @ Sarang Seni 2</h1>
      <?php } elseif ($_GET['sort'] == 'sangkarseni') { ?>
        <h1 class="text-xl font-bold text-gray-700 -mb-5 mt-8">Events @ Sangkar Seni</h1>
      <?php  } elseif ($_GET['sort'] == 'all') { ?>
        <h1 class="text-xl font-bold text-gray-700 -mb-5 mt-8">Events @ Prodigy Studio</h1>
      <?php } ?>
    <?php }
    if (isset($_GET['search'])) { ?>
      <h1 class="text-xl font-bold text-gray-700 -mb-5 mt-8">Search for events "<?= $search ?>"</h1>
    <?php  } ?>

    <br><br>
    <section class="grid grid-cols-1 mx-auto gap-6 sm:grid-cols-4 justify-items-center">
      <?php if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $title = $row['title'];
          $description = substr($row['descriptions'], 0, 200);
          $date = date('F t Y', strtotime($row['dates']));
          $slot = $row['slots'];
          $tag1 = $row['tag1'];
          $tag2 = $row['tag2'];
          $tag3 = $row['tag3'];
          $banner = $row['file_name'];
          $id = $row['event_id'];


 if($slot == 'slot1'){
            $slot = '9.00 am - 11.00 am';
        }elseif($slot == 'slot2'){
            $slot = '2.00 pm - 4.00 pm';
        }elseif($slot == 'slot3'){
            $slot = '8.00 pm - 11.00 pm';
        }else{
            $slot = $row['slots'];
        }
        

      ?>
          <div class="w-full rounded overflow-hidden shadow-md hover:shadow-lg transition-all cursor-pointer">
            <a href="eventdetail.php?eid=<?= $id ?>">
              <img class="w-full max-h-72 object-fill" src="../manageEvent/<?= $banner ?>" alt="EventBanner">
              <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2"><?= $title ?></div>
                <p class="text-gray-700 text-base">
                  <?= $description ?>
                </p> <br>
                <p class="text-gray-500 text-base"><i><?= $date . ", " . $slot ?></i> </p>
              </div>
              <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?= $tag1 ?></span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?= $tag2 ?></span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?= $tag3 ?></span>
                <!-- <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span> -->
              </div>
          </div></a>
      <?php }
      }else {
        echo "<h1 class='text-4xl font-bold text-gray-700 -mb-5 mt-8'>Events Not Found :(</h1>";
      }
      $conn->close();  ?>


    </section>


  </main>
  <?php
  include "../Template/footer.php";
  ?>