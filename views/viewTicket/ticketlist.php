<?php

use module\viewTickets\viewTickets\viewTickets\viewTickets;

include $_SERVER['DOCUMENT_ROOT']."/DB/db.php";
include "../Template/header.php";
include "../../module/viewTickets/viewTickets.php";
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
</div>
</div>
<?php
include "../Template/footer.php";
?>