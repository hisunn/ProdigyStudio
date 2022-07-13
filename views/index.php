<?php include "Template/header.php";
require $_SERVER['DOCUMENT_ROOT']."/DB/db.php"; ?>


<!-- <div class="container mx-auto bg-gray-400 h-96 rounded-md flex items-center" style="background-image: url(https://media.timeout.com/images/101206597/image.jpg);">
  <div class="sm:ml-20 text-gray-50 text-center sm:text-left">
    <h1 class="text-5xl font-bold mb-4">
      Music is <br />
      everywhere.
    </h1>
    <p class="text-lg inline-block sm:block">Discover new events</p>
    <button class="mt-8 px-4 py-2 bg-indigo-600 rounded hover:bg-indigo-900 transition-all" onclick="location.href='./viewEvent/eventpage.php'">Browse events</button>
  </div>
</div> -->  

<!-- <div class="container mx-auto bg-gray-400 h-96 rounded-md flex items-center"> -->
<div class="sliderAx h-auto rounded-lg mt-5" x-cloak x-transition>
  <div id="slider-1" class="container mx-auto">
    <div class="bg-cover bg-center  h-auto text-white py-40 px-10 object-fill" style="background-image: url(../Img/indexbanner1.png)">
      <div class="md:w-1/2">
        <!-- <p class="font-bold text-sm uppercase">Prodigy Studio</p>   -->
        <p class="text-3xl font-bold">Music is everywhere</p>
        <p class="text-2xl mb-10 leading-none">Discover new events today</p>
        <a href="./viewEvent/eventpage.php?sort=all" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Browse events</a>
      </div>
    </div> <!-- container -->
    <br>
  </div>

  <div id="slider-2" class="container mx-auto" x-cloak x-transition>
    <div class="bg-cover bg-top  h-auto text-white py-40 px-10 object-fill" style="background-image: url(../Img/indexbanner2.png)">

      <p class="text-3xl font-bold">Its Now Or Never</p>
      <p class="text-2xl mb-10 leading-none">Discover new events today</p>
      <a href="./viewEvent/eventpage.php?sort=all" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Browse events</a>

    </div> <!-- container -->
    <br>
  </div>
</div>
<div class="flex justify-between w-12 mx-auto pb-2">
  <button id="sButton1" onclick="sliderButton1()" class="bg-purple-400 rounded-full w-4 pb-2 "></button>
  <button id="sButton2" onclick="sliderButton2() " class="bg-purple-400 rounded-full w-4 p-2"></button>
</div>

<!-- </div> -->

<main class="py-16 container mx-auto px-6 md:px-0 -mt-4">
  <section>

    <h1 class="text-3xl font-bold text-gray-700 mb-10">Explore events in Prodigy Studio</h1>
    <div class="grid sm:grid-cols-3 gap-4 grid-cols-1">
      <a href="./viewEvent/eventpage.php?sort=sarangseni1">
        <div class="hover:shadow-lg duration-500 cursor-pointer shadow-sm rounded-sm">
          <img class="bg-gray-300 h-64 w-full" src="/Img/SarangSeni1HD.png" alt="">
          <h3 class="text-lg font-semibold text-gray-500 mt-2 pl-1">Events in <span id="hello" class="text-gray-700">Sarang Seni 1</span></h3>
        </div>
      </a>
      <a href="./viewEvent/eventpage.php?sort=sarangseni2">
        <div class="hover:shadow-lg duration-500 cursor-pointer shadow-sm rounded-sm ">
          <img class="bg-gray-300 h-64 w-full" src="/Img/SarangSeni2HD.png" alt="">
          <h3 class="text-lg font-semibold text-gray-500 mt-2 pl-1">Events in <span class="text-gray-700">Sarang Seni 2</span></h3>
        </div>
      </a>
      <a href="./viewEvent/eventpage.php?sort=sangkarseni">
        <div class="hover:shadow-lg duration-500 cursor-pointer shadow-sm rounded-sm ">
          <img class="bg-gray-300 h-64 w-full" src="/Img/SangkarSeniHD.png" alt="">
          <h3 class="text-lg font-semibold text-gray-500 mt-2 pl-1">Events in <span class="text-gray-700">Sangkar Seni</span></h3>
        </div>
      </a>

    </div>
    <hr class="w-40 my-14 border-4 rounded-md sm:mx-0 mx-auto" />
    <h1 class="text-xl font-bold text-gray-700 mb-10">Upcoming Event @ Prodigy Studio</h1>
  </section>
  <?php

  $query = "SELECT events.event_id AS eid, events.title AS title,events.descriptions AS descriptions,events.dates AS dates, events.slots AS slots,events.tag1 AS tag1,events.tag2 AS tag2,events.tag3 AS tag3, banners.file_name AS file_name FROM events INNER JOIN banners ON events.event_id = banners.event_id WHERE event_status = 'published' LIMIT 8; ";
  $result = $conn->query($query); ?>
  <section class="grid grid-cols-1 mx-auto gap-6 sm:grid-cols-4 justify-items-center">
    <?php if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $id = $row['eid'];
        $title = $row['title'];
        $description = substr($row['descriptions'], 0, 200);
        $date = date('F t Y ', strtotime($row['dates']));
        $slot = $row['slots'];
        $tag1 = $row['tag1'];
        $tag2 = $row['tag2'];
        $tag3 = $row['tag3'];
        $banner = $row['file_name'];
        
        
        
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
        <div class="w-full rounded overflow-hidden shadow-md transition-all hover:shadow-xl cursor-pointer">
          <a href="./viewEvent/eventdetail.php?eid=<?= $id ?>">
            <img class="w-full max-h-72 object-fill" src="./manageEvent/<?= $banner ?>" alt="EventBanner">
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
    }
    $conn->close();  ?>
  </section>

</main>
<div class="flex justify-center mb-3">
  <a href="viewEvent/eventpage.php?sort=all" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800"> More Event !</a>
</div>
</body>


<?php include "Template/footer.php" ?>

</html>

<script>
  function viewEvent() {
    location.href = "./viewEvent/eventpage.php";

  }
</script>