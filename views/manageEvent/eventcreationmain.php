<?php
include "../../DB/db.php";
include "../Template/header.php";
?>

<?php
$username = $_SESSION['username'];

// Total ticket
$query = "SELECT total_ticket FROM profit WHERE username = '$username'";
$result = $conn->query($query);
foreach ($result  as $ticket) {
  $totalticketsold = $ticket['total_ticket'];
}
$totalnotsold = 0;
$query = "SELECT quantity_left FROM ticket WHERE username = '$username'";
$result = $conn->query($query);

foreach ($result  as $ticket) {
  $totalnotsold = $totalnotsold + $ticket['quantity_left'];
}

$query = "SELECT * FROM profitbymonth WHERE username = '$username' LIMIT 1";
$result = $conn->query($query);
foreach ($result  as $month) {
  $january = $month['january'];
  $february = $month['february'];
  $march = $month['march'];
  $april = $month['april'];
  $may = $month['may'];
  $june = $month['june'];
  $july = $month['july'];
  $august = $month['august'];
  $september = $month['september'];
  $october = $month['october'];
  $november = $month['november'];
  $december = $month['december'];
}
?>

<style>
  .dropbtn {

    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {
    background-color: #ddd;
  }

  .show {
    display: block;
  }
</style>
<script>
  // line chart

  const label = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December',
  ];

  const data = {
    labels: label,
    datasets: [{
      label: 'Monthly Profit',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [<?= $january ?>, <?= $february ?>, <?= $march ?>, <?= $april ?>, <?= $may ?>, <?= $june ?>, <?= $july ?>, <?= $august ?>, <?= $september ?>, <?= $october ?>, <?= $november ?>, <?= $december ?>],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };


  // donut chart
  const data2 = {
    labels: ['Not Sold',
      'Sold',

    ],
    datasets: [{
      label: 'My First Dataset',
      data: [<?= $totalnotsold ?>, <?= $totalticketsold ?>],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)'

      ],
      hoverOffset: 4
    }]
  };

  const config2 = {
    type: 'doughnut',
    data: data2,
  };
</script>

<div>




  <section class="h-screen w-full" x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>

    <div>
      <h2 class="mt-10 ml-10 mb-8 text-5xl font-bold text-gray-900">Events Creation Panel</h2>
      <div>
        <div class="flex justify-evenly mx-24">
          <div class="shadow-md hover:shadow-lg border-t-2 transition-shadow p-3 flex-1 rounded-sm mr-5">
            <h1 class="text-center font-semibold mb-2"><?= date("Y") ?> Profit Made</h1>
            <div>
              <div>
                <canvas class="max-h-96" id="lineChart"></canvas>
              </div>
            </div>

          </div>
          <div class="shadow-md hover:shadow-lg border-t-2 transition-shadow p-3 rounded-sm  ">
            <h1 class="text-center font-semibold mb-2">Total Tickets Sold</h1>
            <div>
              <canvas id="donutChart"></canvas>
            </div>

          </div>

        </div>




        <div>

          <div class="flex lg:flex-row-reverse mt-5 mr-auto lg:mr-44">
            <a class="bg-blue-500 hover:bg-blue-700 transition-all text-white font-bold py-2 px-4 rounded" href="eventcreation.php?page=info">Create Event</a>
          </div>
          <div class="flex justify-center ">
            <table class="container mt-5 mb-8 text-center">
              <thead class="bg-gradient-to-tr from-indigo-600 to-purple-600 rounded-md font-semibold h-10">
                <td>Event Name</td>
                <td>Venue</td>
                <td>Organizer</td>
                <td>Date</td>
                <td>Status</td>
                <td class="w-32 text-center">Edit</td>
              </thead>
              <?php
              if (isset($_SESSION['username'])) {


                include "../../DB/db.php";
                $username = $_SESSION['username'];
                $query = "SELECT title, locations, organizer,dates,event_status, event_id, slots FROM events WHERE created_by = '$username' ORDER BY uploaded_on DESC";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                  // while ($row = $result->fetch_assoc()) {
                  $rows =  mysqli_fetch_all($result, MYSQLI_ASSOC);
                  foreach ($rows as $row) :
              ?>
                    <?php
                    // output data of each row
                    $title = $row["title"];
                    $locations = $row["locations"];
                    $organizer = $row["organizer"];
                    $dates = $row["dates"];
                    $status = $row["event_status"];
                    $id = $row["event_id"];
                    $slot = $row['slots'];
                    ?>

                    <tr class="border-b">
                      <td><?= $title ?></td>
                      <td><?= $locations ?>
                      </td>
                      <td><?= $organizer ?>
                      </td>
                      <td><?= $dates ?>
                      </td>
                      <td><?= $status ?></td>
                      <td>
                        <div class="lg:mx-10 mx-auto">                      
                          <div class="flex-col justify-center m-2">
                              <?php if ($status == 'Published') { ?>
                            <a class="text-center transition-all mb-1 block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white px-1 border border-blue-500 hover:border-transparent rounded" href="../viewEvent/eventdetail.php?eid=<?= $id ?>">View</a>
                             <?php } ?>
                            <a class="text-center transition-all mb-1 block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white px-1 border border-blue-500 hover:border-transparent rounded" href="eventedit.php?action=update&eid=<?= $id ?>">Edit</a>
                            <?php if ($status == 'Draft') { ?>
                              <a class="text-center transition-all mb-1 block bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white px-1 border border-green-500 hover:border-transparent rounded" href="eventcreation.php?page=preview&eid=<?= $id ?>">Pay</a>
                            <?php } ?>
                            <?php if ($status == 'Published') { ?>
                              <a class="text-center transition-all mb-1 block bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white px-1 border border-green-500 hover:border-transparent rounded" href="eventcreation.php?page=finished&eid=<?= $id ?>">Receipt</a>
                            <?php } ?>
                            <a data-id="<?= $id . " " . $slot . " " . $dates ?>" class="delete_btn text-center transition-all block bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white px-1 border border-red-500 hover:border-transparent rounded cursor-pointer" @click="showModal = true ">Delete</a>
                          </div>
                        <?php endforeach // }   
                        ?>
                        <div class="flex flex-wrap p-4 h-full items-center">
                          <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'fixed inset-0 z-10 flex items-center justify-center ': showModal }">
                            <!--Dialog-->
                            <p class="bg-white"></p>
                            <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" x-cloak>
                              <!--Title-->
                              <div class="flex justify-between items-center pb-3">
                                <p class="text-2xl font-bold">Warning <i class="bi bi-exclamation-triangle"></i></p>
                                <div class="cursor-pointer z-50" @click="showModal = false">
                                  <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                    </path>
                                  </svg>
                                </div>
                              </div>
                              <!-- content -->
                              <p><b>Please contact via admin@prodigystudio.live before deleting this event for 50% refund</b></p><br>
                              <hr>
                              <p><b>Are you sure you want to delete this event ?</b></p>
                              <p>This action is irreversible</p><br>
                              <!--Footer-->
                              <a href="<?= $_GET['eid'] ?>" id="modalDelete" class="px-4 bg-red-500 p-3 rounded-lg text-white hover:bg-red-400 cursor-pointer">Delete</a>
                              <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2" @click="showModal = false">Cancel</button>
                              <script>
                                // delete button event listener
                                $('.delete_btn').click(function(event) {
                                  //get cover id
                                  let id = $(this).data('id');
                                  let idArr = id.split(" ");
                                  console.log(idArr);

                                  $('#modalDelete').attr('href', '../../controller/manageEventController.php?action=delete&eid=' + idArr[0] + '&slot=' + idArr[1] + '&date=' + idArr[2]);
                                })
                              </script>
                            </div>
                            <!--/Dialog -->
                          </div><!-- /Overlay -->
                        </div>
                        <!--Overlay-->

                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a class="text-blue-600 hover:underline" href="printCsv.php"><i class="bi bi-download"></i> Export CSV</a>
                      </td>
                    </tr>
                <?php
                } else {
                  echo "   
                <tr>
                <td class='text-center' colspan='6'>
                <h2 class='mt-10 ml-10 mb-8 text-5xl font-bold text-gray-900'>It seems empty over here...</h2>
                <p class='mt-10 ml-10 mb-8 text-2xl font-bold text-gray-700'>Click Create Event to start your journey</p>
                
                </td>
              </tr>";
                }
                $conn->close();
              } else {
                echo "<script>location.href = '../index.php'</script>";
              }
                ?>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</section>
</body>

<script>
  // chartjs
  const line = new Chart(
    document.getElementById('lineChart'),
    config
  );
  const donut = new Chart(
    document.getElementById('donutChart'),
    config2
  );
</script>

</html>