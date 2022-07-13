<?php
include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
include "../Template/header.php";

$query = "SELECT dates, slots,title, locations FROM events ORDER BY dates DESC";
$result = $conn->query($query);

if ($result->num_rows > 0) {  ?>

    <h1 class="mt-10 ml-10 mb-3 text-5xl font-bold text-gray-900 text-center">Event Schedule</h1>
    <?php
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $date = date('Y-m-d');
    ?>
    <div class="container mx-auto">
        <div style="height: 600px;" class="flex mt-12 justify-center overflow-y-scroll">
            <div>
                <div align='center'>
                    <table>
                        <tr>
                            <td><span class="bg-green-200 border-2 border-gray-400 w-full">GREEN EVENT</span></td>
                            <td><h1 class="text-center">&nbsp;<i class="bi bi-caret-right-fill"></i>Current day event</h1></td>
                        </tr>
                        <tr>
                            <td ><span class="bg-gray-200 border-2 border-gray-400 w-full">GRAY EVENT&nbsp;&nbsp;</span></td>
                            <td><h1 class="text-center"><i class="bi bi-caret-right-fill"></i>Completed event</h1></td>
                        </tr>
                    </table>
                    
                    <br>
                </div>
                <table class="min-w-full table-auto">
                    <thead class="justify-between">
                        <tr class="bg-indigo-600">

                            <th class="px-16 py-2">
                                <span class="text-indigo-50">Date</span>
                            </th>
                            <th class="px-16 py-2">
                                <span class="text-indigo-50">Time</span>
                            </th>
                            <th class="px-16 py-2">
                                <span class="text-indigo-50">Event</span>
                            </th>

                            <th class="px-16 py-2">
                                <span class="text-indigo-50">Location</span>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-gray-200">
                        <?php foreach ($result as $row) : ?>
                            <tr class="bg-white border-4 border-gray-300  text-center <?php if ($row['dates'] == $date) {
                                                                                            echo "bg-green-200";
                                                                                        } elseif ($row['dates'] < $date) {
                                                                                            echo "bg-gray-200";
                                                                                        }  ?>">

                                <td class="p-10">
                                    <span class="text-center ml-2 font-semibold"><?= $row['dates'] ?></span>
                                </td>
                                <td class="px-16 py-2"><?= $row['slots'] ?></td>
                                <td class="px-16 py-2">
                                    <span><?= $row['title'] ?></span>
                                </td>
                                <td class="px-16 py-2">
                                    <span><?= $row['locations'] ?></span>
                                </td>


                            </tr>
                    <?php endforeach;
                    } ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>