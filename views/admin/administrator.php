<?php
include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
include "../../views/Template/header.php";


?>
<form action="printCsv.php" method="post">

<div class="min-h-screen flex">
  <div class="py-12 px-10 w-1/4">
    <div class="flex space-2 items-center border-b-2 pb-4">
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
      <div class="ml-3">
        <h1 class="text-2xl font-bold text-indigo-600"> PRODIGY STUDIO ADMIN </h1>
        <p class="text-left text-sm text-indigo-600 mt-1 font-serif">DASHBOARD</p>
      </div>
    </div>
    <div class="flex items-center space-x-4 mt-6 p-2 bg-indigo-600 rounded-">
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
        </svg>
      </div>
      <div>
        <p class="text-lg text-white font-semibold">Dashboard</p>
      </div>
    </div>
    <div class="mt-8">
      <ul class="space-y-10">
        <li>
          <a href="../index.php" class="flex items-center text-sm font-semibold text-gray-500 hover:text-white hover:bg-indigo-600 p-3 rounded-md transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4 text-gray-400 hover:text-indigo-600 transition duration-200" viewBox="0 0 20 20" fill="currentColor">
              <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
            </svg>
            Main page</a>
        </li>
        <li>
          <button type="submit" href="" class="w-full flex items-center text-sm font-semibold text-gray-500 hover:text-white hover:bg-indigo-600 p-3 rounded-md transition duration-200" hover:text-indigo-600>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4 text-gray-400 hover:text-indigo-600 transition duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            Generate Report</button>
        </li>
        <!-- <li>
          <a href="#" class="flex items-center text-sm font-semibold text-gray-500 hover:text-indigo-600 transition duration-200" hover:text-indigo-600>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4 text-gray-400 hover:text-indigo-600 transition duration-200" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            Security</a
          >
        </li> -->
        <li>
          <a href="../viewSchedule/schedule.php" class="flex items-center text-sm font-semibold text-gray-500 hover:text-white hover:bg-indigo-600 p-3 rounded-md transition duration-200" hover:text-indigo-600>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4 text-gray-400 hover:text-indigo-600 transition duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            Schedules</a>
        </li>
        <!-- <li>
          <a href="#" class="flex items-centerx text-sm font-semibold text-gray-500 hover:text-indigo-600 transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4 text-gray-400 hover:text-indigo-600 transition duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Payouts</a
          >
        </li> -->
        <!-- <li>
          <a href="#" class="flex items-center text-sm font-semibold text-gray-500 hover:text-indigo-600 transition duration-200" hover:text-indigo-600>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4 text-gray-400 hover:text-indigo-600 transition duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Settings</a
          >
        </li> -->

        <li>
          <a href="../signout.php" class="block font-semibold text-gray-500 hover:text-white hover:bg-indigo-600 p-3 rounded-md transition duration-200"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-4 text-gray-400 hover:text-indigo-600 transition duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>Logout</a>

        </li>
      </ul>
    </div>

  </div>
  <div class="bg-indigo-50 flex-grow py-12 px-10">
    <div class="flex justify-between">
      <div>
        <h4 class="text-sm font-bold text-indigo-600">Hello, <?= $_SESSION['username'] ?></h4>
        <h1 class="text-4xl font-bold text-indigo-900 mt-">Welcome to your Dashboard</h1>
      </div>
      <div>
        <!-- <div class="flex items-center border rounded-lg bg-white w-max py-2 px-4 space-x-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
          <input class="outline-none" type="text" placeholder="Search" />
        </div> -->
      </div>
    </div>
    <div>
      <div class="flex space-x-4">
        <div class="flex items-center justify-around p-6 bg-white w-64 rounded-xl space-x-2 mt-10 shadow-lg">
          <div>
            <span class="text-sm font-semibold text-gray-400">Total Event Registered</span>
            <?php
            $query = "SELECT COUNT(*) FROM events";
            $result = $conn->query($query);
            foreach ($result as $row) : ?>
              <h1 class="text-2xl font-bold"><input class="w-24 font-bold" readonly type="text" name="registered_event" value="<?= $row['COUNT(*)'] ?>"></h1>
            <?php endforeach; ?>
          </div>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7" />
            </svg>
          </div>
        </div>
        <div class="flex items-center justify-around p-6 bg-white w-64 rounded-xl space-x-2 mt-10 shadow-lg">
          <div>
            <span class="text-sm font-semibold text-gray-400">Total User Registered</span>
            <?php
            $query = "SELECT COUNT(*) FROM users";
            $result = $conn->query($query);
            foreach ($result as $row) : ?>
            <h1 class="text-2xl font-bold"><input class="w-24 font-bold"  readonly type="text" name="registered_user" type="text" value="<?= $row['COUNT(*)']?>"></h1>
            <?php endforeach; ?>
          </div>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" viewBox="0 0 20 20" fill="currentColor">
              <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
            </svg>
          </div>
        </div>
        <div class="flex items-center justify-around p-6 bg-white w-64 rounded-xl space-x-2 mt-10 shadow-lg">
          <div>
            <span class="text-sm font-semibold text-gray-400">Total Events Profit</span>
            <?php
            $query = "SELECT profit_total FROM profitbytotal";
            $result = $conn->query($query);
            foreach ($result as $row) : ?>
            <h1 class="text-2xl font-bold">RM <input class="w-24 font-bold"  readonly type="text" name="total_profit" type="text" value="<?= $row['profit_total']?>"></h1>
            <?php endforeach; ?>
          </div>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
            </svg>
          </div>
        </div>
        <div class="flex items-center justify-around p-6 bg-white w-64 rounded-xl space-x-2 mt-10 shadow-lg">
          <div>
            <span class="text-sm font-semibold text-gray-400">Total Ticket Sold</span>
            <?php
            $query = "SELECT SUM(total_ticket) FROM profit";
            $result = $conn->query($query);
            foreach ($result as $row) : ?>
            <h1 class="text-2xl font-bold"><input class="w-24 font-bold"  readonly type="text" name="total_ticket" type="text" value="<?= $row['SUM(total_ticket)']?>"></h1>
            <?php endforeach; ?>
          </div>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
            </svg>
          </div>
        </div>
      </div>
      <div class="flex mt-10 justify-center max-h-96 overflow-y-scroll">
        <div>
          <table class="min-w-full table-auto">
            <thead class="justify-between">
              <tr class="bg-indigo-600">
                <th class="px-16 py-2">
                  <span class="text-gray-300"></span>
                </th>
                <th class="px-16 py-2">
                  <span class="text-indigo-50">Event</span>
                </th>
                <th class="px-16 py-2">
                  <span class="text-indigo-50">Organizer</span>
                </th>
                <th class="px-16 py-2">
                  <span class="text-indigo-50">Date</span>
                </th>

                <th class="px-16 py-2">
                  <span class="text-indigo-50">Ticket Price</span>
                </th>
                <th class="px-16 py-2">
                  <span class="text-indigo-50">Status</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-gray-200">

              <?php

              $query = "SELECT events.title AS title, events.organizer AS organizer, events.dates AS dates, ticket.price AS price, events.event_status AS event_status FROM events INNER JOIN ticket ON events.event_id = ticket.event_id";
              $result = $conn->query($query);
              foreach ($result as $row) :
              ?>
                <tr class="bg-white border-4 border-gray-200 text-center">
                  <td class="px-16 py-2 flex flex-row items-center">
                    <!-- <img class="h-8 w-8 object-cover" src="https://randomuser.me/api/portraits/men/30.jpg" alt="" /> -->
                  </td>
                  <td>
                    <span class="text-center ml-2 font-semibold"><?= $row['title'] ?></span>
                  </td>
                  <td class="px-16 py-2"><?= $row['organizer'] ?></td>
                  <td class="px-16 py-2">
                    <span><?= $row['dates'] ?></span>
                  </td>
                  <td class="px-16 py-2">
                    <span>RM <?= $row['price'] ?></span>
                  </td>

                  <td class="px-16 py-2">
                    <?php if (isset($row['event_status'])) {
                      if ($row['event_status'] == 'Published') { ?>
                        <span class="text-green-500"> <span><?= $row['event_status'] ?> <i class="bi bi-check2"></i></span></span>

                      <?php } elseif ($row['event_status'] == 'Draft') { ?>
                        <span class="text-yellow-500"><?= $row['event_status'] ?><i class="bi bi-exclamation-lg"></i></span></span>

                    <?php }
                    } ?>



                  </td>
                </tr>
              <?php endforeach; ?>
              <!-- <img class="h-8 w-8 object-cover" src="https://randomuser.me/api/portraits/men/76.jpg" alt="" /> -->
              <!-- <tr class="bg-white border-4 border-gray-200 text-center">
                <td class="px-16 py-2 flex flex-row items-center">
                </td>
                <td>
                  <span class="text-center ml-2 font-semibold">Lepak Sanggaq 2</span>
                </td>
                <td class="px-16 py-2">organizer 2</td>
                <td class="px-16 py-2">
                  <span>05/06/2020</span>
                </td>
                <td class="px-16 py-2">
                  <span>12:15</span>
                </td>

                <td class="px-16 py-2">
                  <span class="text-yellow-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" />
                      <circle cx="12" cy="12" r="9" />
                      <polyline points="12 7 12 12 15 15" />
                    </svg>
                  </span>
                </td>
              </tr> -->
              <!-- <img class="h-8 w-8 object-cover" src="https://randomuser.me/api/portraits/men/38.jpg" alt="" /> -->
              <!-- <tr class="bg-white border-4 border-gray-200 text-center">
                <td class="px-16 py-2 flex flex-row items-center">
                </td>
                <td>
                  <span class="text-center ml-2 font-semibold">Kajang Live</span>
                </td>
                <td class="px-16 py-2">Organizer 3</td>
                <td class="px-16 py-2">
                  <span>05/06/2020</span>
                </td>
                <td class="px-16 py-2">
                  <span>08:35</span>
                </td>

                <td class="px-16 py-2">
                  <span class="text-yellow-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" />
                      <line x1="18" y1="6" x2="6" y2="18" />
                      <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                  </span>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </div>
      <div></div>
      <div></div>
    </div>
    <div></div>
    <div></div>
  </div>
</div>
</form>
</body>

</html>