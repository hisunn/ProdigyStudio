<?php
function returnEvent()
{
    include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
    // die($date);
    $query = "SELECT title,slots,dates FROM events";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {


        foreach ($result as $row) {
            $x = 0;
            $event_title = $row['title'];
            $event_slot = $row['slots'];
            $event_date = $row['dates'];

            $newdata =  array(
                'event_title' =>  $event_title,
                'event_slot' =>  $event_slot,
                'event_date' =>  $event_date
            );

            $array_event[$x][] = $newdata;
            ++$x;
        }
        return $array_event;
    }
}


// Set your timezone
date_default_timezone_set('Asia/Tokyo');

// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}

// Check format
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// Today
$today = date('Y-m-j', time());

// For H3 title
$html_title = date('Y / m', $timestamp);

// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) - 1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) + 1, 1, date('Y', $timestamp)));
// You can also use strtotime!  
// $prev = date('Y-m', strtotime('-1 month', $timestamp));
// $next = date('Y-m', strtotime('+1 month', $timestamp));

// Number of days in the month
$day_count = date('t', $timestamp);

// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
//$str = date('w', $timestamp);

// Create Calendar!!
$weeks = array();
$week = '';

// Add empty cell
$week .= str_repeat('<td class="border bg-gray-100 p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300"></td>', $str);
$event = returnEvent();
for ($day = 1; $day <= $day_count; $day++, $str++) {


    $date = $ym . '-' . $day;


    // var_dump($date);
    // die();
    if (isset($event[0][$day - 1]['event_date'])) {    

    if ($date == $event[0][$day - 1]['event_date']) {
        $week .= '<td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease bg-green-700 ">' . "<span class='text-gray-500   rounded-full p-1'>" . $day . "aaaa" . "</span>";
    }   else {
        $week .= '<td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300 ">' . $day;
        // retrieve data from db, if events.dates = calendar date, display 


    }
    $week .= '</td>';
}else{

    if ($today == $date) {
        $week .= '<td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease bg-green-700 ">' . "<span class='text-gray-500   rounded-full p-1'>" . $day . "</span>";
    } else {
        $week .= '<td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300 ">' . $day;
        // retrieve data from db, if events.dates = calendar date, display 


    }
    $week .= '</td>';
}


    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td class="border bg-gray-100 p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300"></td>', 6 - ($str % 7));
        }

        $weeks[] = '<tr class="text-center align-text-top h-20">' . $week . '</tr>';

        // Prepare for new week
        $week = '';
    }
}


?>

<?php
include "../Template/header.php" ?>
<h1 class="text-center text-2xl -mb-5 text-gray-900">Event Schedule</h1>

<div class="container mx-auto mt-10 mb-6">
    <div class="wrapper bg-white rounded shadow w-full ">
        <div class="header flex justify-between border-b p-2">
            <span class="text-lg font-bold">
                <?= date('F Y', strtotime($ym));  ?>
            </span>
            <div class="buttons">
                <button class="p-1" onclick="location.href='?ym=<?php echo $prev; ?>'">
                    <svg width="1em" fill="gray" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z" />
                        <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z" />
                    </svg>
                </button>
                <button class="p-1" onclick="location.href='?ym=<?php echo $next; ?>'">
                    <svg width="1em" fill="gray" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path fill-rule="evenodd" d="M7.646 11.354a.5.5 0 0 1 0-.708L10.293 8 7.646 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z" />
                        <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </button>
            </div>
        </div>
        <table class="w-full">
            <thead>
                <tr>
                    <th class="p-2 border-r border-b h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
                        <span class="xl:block lg:block md:block sm:block hidden">Sunday</span>
                        <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Sun</span>
                    </th>
                    <th class="p-2 border-r border-b  h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
                        <span class="xl:block lg:block md:block sm:block hidden">Monday</span>
                        <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Mon</span>
                    </th>
                    <th class="p-2 border-r border-b  h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
                        <span class="xl:block lg:block md:block sm:block hidden">Tuesday</span>
                        <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Tue</span>
                    </th>
                    <th class="p-2 border-r border-b  h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
                        <span class="xl:block lg:block md:block sm:block hidden">Wednesday</span>
                        <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Wed</span>
                    </th>
                    <th class="p-2 border-r border-b  h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
                        <span class="xl:block lg:block md:block sm:block hidden">Thursday</span>
                        <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Thu</span>
                    </th>
                    <th class="p-2 border-r border-b  h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
                        <span class="xl:block lg:block md:block sm:block hidden">Friday</span>
                        <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Fri</span>
                    </th>
                    <th class="p-2 border-r border-b  h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
                        <span class="xl:block lg:block md:block sm:block hidden">Saturday</span>
                        <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Sat</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- class:h-20 dibuang -->
                <tr class="text-center">

                    <?php foreach ($weeks as $week) { ?>

                        <?= $week; ?>


                    <?php      } ?>


                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>


<?php include "../Template/footer.php" ?>