<?php

use module\viewTickets\viewTickets\viewTickets\viewTickets;

include $_SERVER['DOCUMENT_ROOT']."/DB/db.php";
include "../Template/header.php";
include "../../module/viewTickets/viewTickets.php";

// if (isset($_SESSION['username'])) {



// }else{

// }

$ticket = new viewTickets();
$row = $ticket->displayTicketList($_SESSION['username']);

?>

<div class="bg-white min-h-screen r">
  <h2 class="mt-10 ml-10 mb-8 text-5xl font-bold text-gray-900 bg-white">Your Tickets</h2>
  <table class="container mt-5 mb-8 mx-auto bg-white text-center shadow-md">
    <thead class="bg-gradient-to-tr from-indigo-600 to-purple-600 rounded-md px-4 text-white font-bold text-md mt-6">
      <tr>
        <td class="py-3">Event Name</td>
        <td class="py-3">Venue</td>
        <td class="py-3">Date Purchased</td>
        <td class="py-3">View Details</td>
      </tr>
    </thead>

    <?php
    if (isset($row->num_rows)) {

      if ($row->num_rows > 0) {
        foreach ($row as $row) : ?>
          <tr class="border-b hover:shadow-md">
            <td class="py-6"><?= $row['title'] ?></td>
            <td class="py-6"><?= $row['locations'] ?></td>
            <td class="py-6"><?= $row['paid_on'] ?></td>
            <td class="py-6"> <a href="receipt.php?eid=<?= $row['eid'] ?>" class="cursor-pointer px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none m-0.5">
                <i class="bi bi-receipt"></i>
              </a></td>
          </tr>
    <?php endforeach;
      }
    } else
      echo " <tr>
        <td class='text-center' colspan='6'>
        <h2 class='mt-10 ml-10 mb-8 text-5xl font-bold text-gray-900'>It seems empty over here...</h2>
        <p class='mt-10 ml-10 mb-8 text-2xl font-bold text-gray-700'><a class='bg-blue-500 hover:bg-blue-700 transition-all text-white font-bold py-2 px-4 rounded text-base' href='../viewEvent/eventpage.php?sort=all'>Browse Events</a></p>
        
        </td>
      </tr>";
    ?>

  </table>
  <!-- <div>

    <div class="p-4">

      <div class="bg-white p-4 rounded-md">
        <div>
          <h2 class="mb-4 text-xl font-bold text-gray-700">Your Tickets</h2>

          <div>
            <div class="flex justify-around bg-gradient-to-tr from-indigo-600 to-purple-600 rounded-md py-2 px-4 text-white font-bold text-md mt-6">
              <div>
                <span>Event Name</span>
              </div>
              <div>
                <span>Venue</span>
              </div>
              <div>

              </div>
              <div>
                <span>Date purchased</span>
              </div>
              <div>
                <span>View Detail</span>
              </div>
            </div>
            <div>
              <div class="flex justify-between border-t text-sm font-normal mt-4 space-x-4">
                <div class="px-2 flex">
                  <span>Lepak Sanggaq</span>
                </div>
                <div>
                  <span>Sangkar Seni</span>
                </div>

                <div class="px-2">
                  <span>28/12/2021</span>
                </div>
                <div class="pr-24">
                  <button onclick="location.href='ticketdetail.php'" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none m-0.5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                      <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                    </svg></button>

                </div>
              </div>
              <div class="flex justify-between border-t-2 text-sm font-normal mt-4 space-x-4">
                <div class="px-2">
                  <span>Lepak Sanggaq 2</span>
                </div>
                <div>
                  <span>Sangkar Seni</span>
                </div>

                <div class="px-2">
                  <span>28/12/2021</span>
                </div>
                <div class="pr-24">
                  <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none m-0.5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                      <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                    </svg></button>

                </div>
              </div>
              <div class="flex justify-between border-t-2 text-sm font-normal mt-4 space-x-4">
                <div class="px-2">
                  <span>Kajang Live</span>
                </div>
                <div>
                  <span>Sangkar Seni</span>
                </div>

                <div class="px-2">
                  <span>28/12/2021</span>
                </div>
                <div class="pr-24">
                  <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none m-0.5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                      <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                    </svg></button>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
</div>
</div>
<?php
include "../Template/footer.php";
?>