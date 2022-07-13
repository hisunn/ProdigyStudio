<?php
include "../../DB/db.php";
include "../Template/header.php";
?>

<?php
include $_SERVER['DOCUMENT_ROOT']."/DB/db.php";
$id = $_GET['eid'];
$query = "SELECT events.title AS title,events.descriptions AS descriptions,events.slots AS slots,events.dates AS dates,events.locations AS locations,banners.file_name AS banner
  FROM events
  INNER JOIN banners
  ON events.event_id=banners.event_id WHERE events.event_id= '$id' LIMIT 1";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // output data of each row
        $title = $row["title"];
        $descriptions = $row["descriptions"];
        $slots = $row["slots"];
        $dates = $row["dates"];
        $locations = $row["locations"];
        $banner = $row['banner']; ?>
    <?php       } ?>
<?php } else {
    echo "0 results";
}
$conn->close();
?>


<section x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>
    <form onload="display();" action="../../controller/manageEventController.php" method="POST" enctype="multipart/form-data">
        <div class="my-20">

            <div class="relative px-6 pt-10 pb-8 bg-white shadow-xl ring-1 ring-gray-900/5 max-w-4xl sm:mx-auto sm:rounded-lg sm:px-10 ">
                <div class="max-w-md mx-auto flex flex-col">
                    <label for="title">Event Title:</label>
                    <input required class="m-4 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" valu id="title" name="title" type="text" value="<?=$title?>" placeholder="Event Title">
          

                    <label for="description">Event Description:</label> <br>
                    <textarea class="border-2 w-96" name="description" id="mytextarea" name="description" cols="30" rows="10"><?= $descriptions?></textarea> <br>
                  
                </div>

            </div>

        </div>
        <!--Overlay-->
        <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModal }">
            <!--Dialog-->
            <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">

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
                <p><b>Are you sure you want to update this event ?</b></p>
                <p>This action is irreversible</p>


                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <button type="submit" name="update_btn" value="<?= $id ?>" class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400" @click="location.href='../../controller/manageEventController.php'">Update</button>
                     <a href="eventcreationmain.php" class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2" @click="showModal = false">Cancel</a>
                </div>


            </div>
            <!--/Dialog -->
        </div><!-- /Overlay -->
        <div class="flex justify-center -mt-20">
            <a class="transition-all m-4 bg-indigo-500 hover:bg-indigo-400 text-white font-bold py-2 px-4 border-b-4 border-indigo-700 hover:border-indigo-500 rounded cursor-pointer" @click="showModal = true">
                Update Event !
            </a>
        </div>
    </form>

</section>

</body>

</html>