<?php
include $_SERVER['DOCUMENT_ROOT']."/DB/db.php";
include "../Template/header.php";
include "../Template/progressbar.php";
?>

<?php
if (!isset($_SESSION['username'])) {
    echo "<script>location.href = '../index.php'</script>";
}
if ($_GET['page'] == 'info') {
?>
    <form class="flex flex-col items-center" action="../../controller/manageEventController.php" enctype="multipart/form-data" method="POST">
        <div class="sm:w-5/12">
            <div class=" px-10 pt-10 pb-8 bg-white shadow-xl ring-2  ring-indigo-300  w-full  sm:rounded-lg ">
                <div>
                    <div>
                        <div class="py-8 text-base leading-7 space-y-6 text-gray-600">
                            <h1 class="text-3xl"><b>Basic Info</b></h1>
                            <h2 class="text-base"><b>Event Title</b></h2>
                            <p>Name your event. Using a catcy name really helps :D</p>
                            <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="eventtitle" name="eventtitle" type="text" placeholder="Event Title">
                            <h2 class="text-base"><b>Event Organizer Name</b></h2>
                            <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="organizer" name="organizer" type="text" placeholder="Organizer">
                            <h2 class="text-base"><b>Tags</b></h2>
                            <p>To help your events to be discovered easily.</p>
                            <p><i>(Click add without inputting for random number tags)</i></p>
                            <div class="flex">
                                <input id="tag_input" required class="m-4 -ml-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tags" name="tags" type="text" placeholder="#Enter your tags">
                                <a id="button" style="height: 45px; width: 150px;" class="text-center cursor-pointer -mr-4 mt-3 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow ">
                                    Add
                                </a>
                            </div>
                            <i hidden id="delete_tag1" class="bi bi-x-circle-fill cursor-pointer"></i><span hidden id="tag_input1" class="ml-4 bg-gray-500 text-white rounded-full text-sm px-3 py-1"></span>
                            <i hidden id="delete_tag2" class="bi bi-x-circle-fill cursor-pointer"></i><span hidden id="tag_input2" class="ml-4 bg-gray-500 text-white rounded-full text-sm px-3 py-1"></span>
                            <i hidden id="delete_tag3" class="bi bi-x-circle-fill cursor-pointer"></i><span hidden id="tag_input3" class="ml-4 bg-gray-500 text-white rounded-full text-sm px-3 py-1"></span>
                        </div>
                        <div class="pt-8 text-base leading-7 font-semibold">
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            let count = 0;
                            let tag1, tag2, tag3;
                            $("#button").click(function() {
                                if (count == 0) {
                                    if ($("#tag_input").val() == '' || $("#tag_input").val() == '#') {
                                        tag1 = "#"+Math.floor(Math.random() * 900)+ $("#tag_input").val();
                                    }else
                                    tag1 = "#" + $("#tag_input").val();
                                    console.log(tag1);
                                    $("#tag_input").val("");
                                    $("#tag_input1").show();
                                    $("#delete_tag1").show();
                                    $.post("../../controller/manageEventController.php", {
                                            tag1: tag1,
                                            save_btn1: 'set'
                                        },
                                        function(data, status) {
                                            $("#tag_input1").html(data);
                                        });
                                } else if (count == 1) {
                                    if ($("#tag_input").val() == '' || $("#tag_input").val() == '#') {
                                        tag2 = "#"+Math.floor(Math.random() * 900)+ $("#tag_input").val();
                                    }else
                                    tag2 = "#" + $("#tag_input").val();
                                    console.log(tag2);
                                    $("#tag_input").val("");
                                    $("#tag_input2").show();
                                    $("#delete_tag2").show();
                                    $.post("../../controller/manageEventController.php", {
                                            tag2: tag2,
                                            save_btn1: 'set'
                                        },
                                        function(data, status) {
                                            $("#tag_input2").html(data);
                                        });
                                } else if (count == 2) {
                                    if ($("#tag_input").val() == '' || $("#tag_input").val() == '#') {
                                        tag3 = "#"+Math.floor(Math.random() * 900)+ $("#tag_input").val();
                                    }else
                                    tag3 = "#" + $("#tag_input").val();
                                    console.log(tag3);
                                    $("#tag_input").val("");
                                    $("#tag_input3").html(tag3);
                                    $("#tag_input3").show();
                                    $("#delete_tag3").show();
                                    $.post("../../controller/manageEventController.php", {
                                            tag3: tag3,
                                            save_btn1: 'set'
                                        },
                                        function(data, status) {
                                            $("#tag_input3").html(data);
                                        });
                                } else
                                    console.log("banana");
                                ++count;
                                if (count > 2) {
                                    $("#button").addClass("bg-gray-200");
                                    $("#button").css("pointer-events", "none");
                                    $("#tag_input").attr("disabled", "true");
                                }
                                console.log(count);
                            });
                            $('#delete_tag1').click(function() {
                                console.log("clicked");
                                $("#tag_input1").hide();
                                $("#delete_tag1").hide();
                                --count;
                                console.log(count);
                                if (count < 3) {
                                    console.log("ASDASD");
                                    $("#button").removeClass("bg-gray-200");
                                    $("#button").css("pointer-events", "auto");
                                    $("#button").addClass("cursor-pointer");
                                    $("#tag_input").removeAttr("disabled");
                                }
                            }); {
                            }
                            $('#delete_tag2').click(function() {
                                console.log("clicked");
                                $("#tag_input2").hide();
                                $("#delete_tag2").hide();
                                --count;
                                console.log(count);
                                if (count < 3) {
                                    console.log("ASDASD2");
                                    $("#button").removeClass("bg-gray-200");
                                    $("#button").css("pointer-events", "auto");
                                    $("#button").addClass("cursor-pointer");
                                    $("#tag_input").removeAttr("disabled");
                                }
                            }); {
                            }
                            $('#delete_tag3').click(function() {
                                $("#tag_input3").hide();
                                $("#delete_tag3").hide();
                                --count;
                                console.log("clicked");
                                console.log(count);
                                if (count < 3) {
                                    console.log("ASDASD3");
                                    $("#button").removeClass("bg-gray-200");
                                    $("#button").css("pointer-events", "auto");
                                    $("#button").addClass("cursor-pointer");
                                    $("#tag_input").removeAttr("disabled");
                                }
                            }); {
                            }
                            // ajax request
                        });
                    </script>
                </div>
            </div>
            <span class="m-2"></span>
            <div class="px-6 pt-10 pb-8 bg-white shadow-xl ring-2  ring-indigo-300 w-full sm:rounded-lg sm:px-10" x-data="{toggle1: false, toggle2: false, toggle3:false}">
                <div>
                    <div class="text-center">
                        <div class="py-8 text-base leading-7 space-y-6 text-gray-600">
                            <h1 class="text-3xl -ml-80"><b>Location</b></h1>
                            <p class="-ml-32">Pick where do you want to held your event</p> <br>
                            <fieldset name="location" id="location" class="py-2 px-3">
                                <input required type="radio" value="sangkarseni1" name="location">
                                <label for="sangkarseni1">Sarang Seni 1</label>
                                <a x-on:click="toggle1 = !toggle1" :class="toggle1 ? 'bg-indigo-200' : 'bg-blue-800'" class="text-white px-4 py-2 rounded-sm w-full cursor-pointer ml-10 select-none">
                                    See Description<i class="bi bi-chevron-compact-down"></i>
                                </a> <br> <br>
                                <!-- x-show - Toggle the visibility of an toggle 1 element-->
                                <div x-show="toggle1" x-transition x-cloak>
                                    <img class="shadow-lg" src="../../Img/Sarang Seni 1.png" class="border-1" alt="Sarang_Seni1">
                                    <p class="bg-gray-200 p-4 my-6 rounded text-justify">
                                        <b>Sarang Seni 1</b> is an event place for dance/zumba/ballet/rehearsal space. Also can be use for other type of events. <i>(Max pax: 50)</i> <span class="ml-4 bg-yellow-400 text-white rounded-full text-sm px-5 ">RM 100</span>
                                    </p>
                                </div>
                                <input required type="radio" value="sangkarseni2" name="location">
                                <label for="sangkarseni2">Sarang Seni 2</label> <a x-on:click="toggle2 = !toggle2" :class="toggle2 ? 'bg-blue-200' : 'bg-blue-800'" class="text-white px-4 py-2 rounded-sm w-full cursor-pointer ml-10 select-none">
                                    See Description<i class="bi bi-chevron-compact-down"></i>
                                </a><br> <br>
                                <!-- x-show - Toggle the visibility of an element-->
                                <div x-show="toggle2" x-transition x-cloak>
                                    <img class="shadow-lg" src="../../Img/Sarang Seni 2.png" class="border-1" alt="Sarang_Seni2">
                                    <p class="bg-gray-200 p-4 my-6 rounded text-justify">
                                        <b>Sarang Seni 2</b> is a specific event space for Jamming and Gig related events. Also can be use for other type of events. <i>(Max pax: 40)</i><span class="ml-4 bg-yellow-400 text-white rounded-full text-sm px-5 ">RM 80</span>
                                    </p>
                                </div>
                                <input type="radio" value="sarangseni" name="location">
                                <label required for="sarangseni">Sangkar Seni&nbsp;</label>
                                <a x-on:click="toggle3 = !toggle3" :class="toggle3 ? 'bg-blue-200' : 'bg-blue-800'" class="text-white px-4 py-2 rounded-sm w-full cursor-pointer ml-10 select-none">
                                    See Description<i class="bi bi-chevron-compact-down"></i>
                                </a> <br><br>
                                <!-- x-show - Toggle the visibility of an element-->
                                <div x-show="toggle3" x-transition x-cloak>
                                    <img class="shadow-lg" src="../../Img/Sangkar Seni.png" class="border-1" alt="Sangkar_Seni">
                                    <p class="bg-gray-200 p-4 my-6 rounded text-justify">
                                        <b>Sarang Seni</b> is a specific event space for Jamming and Music Rehearsal Space. Also can be use for other type of events. <i>(Max pax: 10)</i><span class="ml-4 bg-yellow-400 text-white rounded-full text-sm px-5 ">RM 50</span>
                                    </p>
                                    </p>
                                </div>
                            </fieldset>
                        </div>
                        <div class="pt-8 text-base leading-7 font-semibold">
                        </div>
                    </div>
                </div>
            </div>
            <span class="m-2"></span>
            <div class=" px-6 pt-10 pb-8 bg-white shadow-xl ring-2  ring-indigo-300  sm:rounded-lg sm:px-10">
                <div class="max-w-md mx-auto">
                    <div class="divide-y divide-gray-300/50">
                        <div class="py-8 text-base leading-7 space-y-6 text-gray-600">
                            <h1 class="text-3xl"><b>Date and time</b></h1>
                            <p>Specify when your event will be held, when its starting and ending.</p> <br>
                            <label class="text-base" for="date"><b>Date</b></label> <br>                           
                            <script>
                                // nnti dri db push masuk array unavilable Dates
                                var unavailableDates = ["", "", ""];
                                function unavailable(date) {
                                    dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
                                    if ($.inArray(dmy, unavailableDates) == -1) {
                                        return [true, ""];
                                    } else {
                                        return [false, "", "Unavailable"];
                                    }
                                }
                                $(function() {
                                    $("#datepicker").datepicker({
                                        dateFormat: 'dd MM yy',
                                        beforeShowDay: unavailable,
                                        minDate: 0,
                                        maxDate: "+2W"
                                    });
                                });
                                function getDate() {
                                    let jsDate = $("#datepicker").datepicker('getDate');
                                    console.log(jsDate.toString());
                                    $("#displayDate").html("Chosen date: <span class='ml-4 bg-blue-500 text-white rounded-full text-sm px-3 py-1'>" + jsDate.toDateString() + "</span>");
                                    $("#datedescription").hide();
                                    $("#slot").show();
                                    $.post("../../controller/manageEventController.php", {
                                            slotdate: jsDate.toLocaleDateString(),
                                        },
                                        function(data, status) {
                                            // alert("Data: " + data + "\nStatus: " + status);
                                            let viewslot = data.split(" ");
                                            console.log(data);
                                            console.log(viewslot);
                                            let slot1 = viewslot[0];
                                            let slot2 = viewslot[1];
                                            let slot3 = viewslot[2];
                                            if (slot1 == '') {
                                                slot1 = null;
                                            }
                                            if (slot2 == '') {
                                                slot2 = null;
                                            }
                                            if (slot3 == '') {
                                                slot3 = null;
                                            }
                                            if (slot1) {
                                                $("#slot1").prop('disabled', true);
                                            } else {
                                                $("#slot1").prop('disabled', false);

                                            }
                                            if (slot2) {
                                                $("#slot2").prop('disabled', true);
                                            } else {
                                                $("#slot2").prop('disabled', false);

                                            }
                                            if (slot3) {
                                                $("#slot3").prop('disabled', true);
                                            } else {
                                                $("#slot3").prop('disabled', false);

                                            }
                                            if (slot1 && slot2 && slot3) {
                                                $("#slotindicator").html("Slot Status: <span class='ml-4 mt-5 bg-red-500 text-white rounded-full text-sm px-3 py-1'>Slot Full <i class='bi bi-exclamation-circle-fill'></i></span>");

                                            } else {
                                                $("#slotindicator").html("Slot Status: <span class='ml-4 mt-5 bg-green-500 text-white rounded-full text-sm px-3 py-1'>Slot Available <i class='bi bi-check'></i></span>");
                                            }

                                        });
                                }
                            </script>
                            <input onchange="getDate()" class="cursor-pointer bg-blue-800 text-center placeholder-white p-1 border-2 border-indigo-300 rounded-sm text-white" placeholder="Select a Date" type="text" name="date" id="datepicker">
                            <p id="displayDate"></p><br><span id="slotindicator"></span>

                            <br> <br>
                            <label class="text-base" for="slot"><b>Available Slots</b></label> <br>
                            <p id="datedescription">Please choose a date</p>
                            <fieldset class="hidden" name="slot" id="slot" class="py-2 px-3">
                                <input required type="radio" value="slot1" name="slot" id="slot1">
                                <label for="slot1">9.00 am - 11.00 am <span class="ml-4 bg-blue-500 text-white rounded-full text-sm px-3">2 hours</span><span class="ml-4 bg-pink-400 text-white rounded-full text-sm px-3">Regular slot 1</span></label><br>
                                <input required type="radio" value="slot2" name="slot" id="slot2">
                                <label for="slot2">2.00 pm - 4.00 pm <span class="ml-6 bg-blue-500 text-white rounded-full text-sm px-3">2 hours</span><span class="ml-4 bg-pink-400 text-white rounded-full text-sm px-3">Regular slot 2</span></label><br>
                                <input required type="radio" value="slot3" name="slot" id="slot3">
                                <label for="slot3">8.00 pm - 11.00 pm <span class="ml-4 bg-blue-500 text-white rounded-full text-sm px-3">3 hours</span><span class="ml-4 bg-red-400 text-white rounded-full text-sm px-5">Main slot</span></label><br>
                            </fieldset>

                        </div>
                        <div class="pt-8 text-base leading-7"></div>
                        <div class="py-8 px-4 rounded-lg text-base  shadow-lg">
                            <h1 class="-mt-4 text-gray-600 font-bold"> Slots rate</h1> <br>
                            <table class="border-solid">
                                <tr>
                                    <td> <span class="ml-4 bg-pink-400 text-white rounded-full text-sm px-3">Regular slot</span></td>
                                    <td class="pl-2"><i class="bi bi-caret-right-fill"></i></i><span class="ml-4 bg-yellow-400 text-white rounded-full text-sm px-5 ">RM 20</span></td>
                                </tr>
                                <tr>
                                    <td><span class="ml-4 bg-red-400 text-white rounded-full text-sm px-5 ">Main slot</span></td>
                                    <td class="pl-2"><i class="bi bi-caret-right-fill"></i><span class="ml-4 bg-yellow-400 text-white rounded-full text-sm px-5 ">RM 30</span></td>
                                </tr>
                            </table>


                        </div>

                    </div>
                </div>
            </div>
            <span class="m-2"></span>
            <div class=" px-6 pt-10 pb-8 bg-white shadow-xl ring-2  ring-indigo-300  sm:rounded-lg sm:px-10">
                <div class="max-w-full mx-auto">

                    <div class="divide-y divide-gray-300/50">
                        <div class="py-8 text-base leading-7 space-y-6 text-gray-600">
                            <div class="max-w-full mx-auto">
                                <h1 class="text-3xl"><b>Description</b></h1> <br>
                                <p>Add the event description.</p> <br>
                                <div class="max-w-full mx-auto">
                                    <textarea  class="border-2 w-96" name="description" id="mytextarea" cols="30" rows="10" maxlength="50" ></textarea>
                                </div>
                            </div>
                            <div class="pt-8 text-base leading-7 font-semibold">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="flex justify-center">
                    <button name="save_btn1" type="submit" class="m-4 bg-indigo-500 hover:bg-indigo-400 text-white font-bold py-2 px-4 border-b-4 border-indigo-700 hover:border-indigo-500 rounded">
                        Save & Continue
                    </button>
                </div>
            </div>
    </form>
<?php
} elseif ($_GET['page'] == 'ticket') {
?>
    <header>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://unpkg.com/dropzone@6.0.0-beta.2/dist/dropzone.css" />
        <link href="https://unpkg.com/cropperjs@1.5.12/dist/cropper.css" rel="stylesheet" />
        <script src="https://unpkg.com/dropzone@6.0.0-beta.2/dist/dropzone.js"></script>
        <script src="https://unpkg.com/cropperjs@1.5.12/dist/cropper.js"></script>
    </header>
    <form class="flex flex-col items-center" action="../../controller/manageEventController.php" method="POST">
        <div class="sm:w-5/12">
            <div class="px-6 pt-10 pb-8 bg-white shadow-xl ring-2  ring-indigo-300  sm:rounded-lg sm:px-10">

                <?php
                include $_SERVER['DOCUMENT_ROOT']."/DB/db.php";
                $str = $_SESSION['eid'];
                $pattern1 = "/SS1/i";
                $pattern2 = "/SS2/i";
                $pattern3 = "/SSE/i";
                $result1 = preg_match_all($pattern1, $str);
                $result2 = preg_match_all($pattern2, $str);
                $result3 = preg_match_all($pattern3, $str);
                $query = "SELECT title FROM events WHERE event_id = '$str';";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {    
                    while ($row = $result->fetch_assoc()) {
                        $title = $row['title'];
                ?>
                        <?php
                        if (isset($_SESSION['eid'])) { ?>
                            <div x-data="{sliderMax:0,slider1:0,slider2:0,slider3:0,eventName:'<?= $title ?>'}">
                                <div class="w-full">

                                    <div class="py-8 text-base leading-7 space-y-6 text-gray-600">
                                          <?php
                                        if(isset($_GET['error'])){
                                            
                                            echo "<h1 class='text-center text-red-700 text-xl'> ".$_GET['error'] . " </h1>";
                                        }                                        
                                        ?>
                                        <h1 class="text-3xl"><b>Ticket Details</b></h1>
                                        <h1 class="text-xl"><b>Event / Ticket Banner</b></h1>
                                        <p>Upload your event thumbnails here.</p> <br>
                                        <div align="center">
                                            <div>
                                                <div class="image_area">

                                                    <label for="upload_image">
                                                        <img src="https://www.pngrepo.com/png/15592/180/picture.png" alt="Upload Banner" id="uploaded_image" class="cursor-pointer border-2 p-5 hover:shadow-md transition-all" />
                                                        <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div>
                                                        <h5 class="modal-title">Crop Banner Before Upload</h5>
                                                        <div>
                                                            <div class="img-container">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <img alt="" src="" class="cursor-pointer" id="sample_image" />
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="preview"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="m-5">
                                                            <button type="button" id="crop" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Crop</button>
                                                            <button type="button" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" data-dismiss="modal">Cancel</button>
                                                        </div> &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                var $modal = $('#modal');
                                                var image = document.getElementById('sample_image');
                                                var cropper;
                                                $('#upload_image').change(function(event) {
                                                    var files = event.target.files;

                                                    var done = function(url) {
                                                        image.src = url;
                                                        $modal.modal('show');
                                                    };

                                                    if (files && files.length > 0) {
                                                        reader = new FileReader();
                                                        reader.onload = function(event) {
                                                            done(reader.result);
                                                        };
                                                        reader.readAsDataURL(files[0]);
                                                    }
                                                });

                                                $modal.on('shown.bs.modal', function() {
                                                    cropper = new Cropper(image, {
                                                        aspectRatio: 1,
                                                        viewMode: 1,
                                                        preview: '.preview'
                                                    });
                                                }).on('hidden.bs.modal', function() {
                                                    cropper.destroy();
                                                    cropper = null;
                                                });

                                                $('#crop').click(function() {
                                                    canvas = cropper.getCroppedCanvas({
                                                        width: 400,
                                                        height: 400
                                                    });
                                                    canvas.toBlob(function(blob) {
                                                        url = URL.createObjectURL(blob);
                                                        var reader = new FileReader();
                                                        reader.readAsDataURL(blob);
                                                        reader.onloadend = function() {
                                                            var base64data = reader.result;
                                                            $.ajax({
                                                                url: 'upload.php',
                                                                method: 'POST',
                                                                data: {
                                                                    image: base64data,
                                                                    id: '<?= $str ?>',
                                                                },
                                                                success: function(data) {
                                                                    $modal.modal('hide');
                                                                    console.log(data);
                                                                    $('#uploaded_image').attr('src', data);
                                                                }
                                                            });
                                                        };
                                                    });
                                                });
                                            });
                                        </script>
                                        <!-- end banner upload with crop -->
                                        <h1 class="text-xl"><b>Ticket Information </b></h1>
                                        <p>Ticket Name:</p>
                                        <input x-text="eventName" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="useEventName" name="ticketname" type="text" placeholder="Ticket Name: <?= $title ?>">
                                        <input type="checkbox" name="useEventName" id="" onclick="toggleName(this.checked)">
                                        <script>
                                            function toggleName(togglecheck) {
                                                if (togglecheck == true) {
                                                    let eventname = document.getElementById("useEventName").value = " <?= $title ?>";

                                                } else
                                                    document.getElementById("useEventName").value = "";
                                            }
                                        </script>
                                        <label for="useEventName"><i>Use event name</i></label>
                                        <?php if ($result1 == true) { ?>
                                            <p>Ticket Quantity <i>(Max 50):</i></p>
                                            <input x-model="slider1" required class="w-5/6 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" id="" name="quantity" type="range" min="1" max="50" value="1">
                                            <input x-model="slider1" type="text" class="w-6 border-2 text-center rounded-md" disabled>
                                        <?php } elseif ($result2 == true) { ?>
                                            <p>Ticket Quantity <i>(Max 40):</i></p>
                                            <input x-model="slider2" required class="w-5/6 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" id="" name="quantity" type="range" min="1" max="40" value="1">
                                            <input x-model="slider2" type="text" x-model="" class="w-6 border-2 text-center rounded-md" disabled>
                                        <?php } elseif ($result3 == true) { ?>
                                            <p>Ticket Quantity <i>(Max 10):</i></p>
                                            <input x-model="slider3" required class="w-5/6 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" id="" name="quantity" type="range" min="1" max="10" value="1">
                                            <input type="text" x-model="slider3" class="w-6 border-2 text-center rounded-md" disabled>
                                        <?php } else {
                                            echo "Ooops";
                                        } ?>
                                    <?php } ?>
                                    <p>Max Ticket per Order <i>(Max 5)</i>:</p>
                                    <input x-model="sliderMax" required class="w-5/6 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" id="" name="max" type="range" min="1" max="5" value="1">
                                    <input type="text" x-model="sliderMax" class="w-6 border-2 text-center" disabled>
                                    <p>Ticket Price:</p>
                                    <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" name="price" type="number" step="0.01" placeholder="RM 0.00">
                                    </div>
                                    <div class="pt-8 text-base leading-7 font-semibold flex justify-center">
                                    </div>
                                </div>
                            </div>
                    <?php }
                } ?>
            </div>
        </div>
        <div class="flex justify-center">
               <a href='../../controller/manageEventController.php?delete_draft_btn=true' name="delete_draft_btn" value="Draft" class="m-4 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow transition-all">
                Discard
            </a>
            <button name="save_btn2" type="submit" class="m-4 bg-indigo-500 hover:bg-indigo-400 text-white font-bold py-2 px-4 border-b-4 border-indigo-700 hover:border-indigo-500 rounded">
                Save & Continue
            </button>
        </div>
    </form>
    <?php
} elseif ($_GET['page'] == 'preview') {

    include $_SERVER['DOCUMENT_ROOT']."/DB/db.php";
    if (isset($_SESSION['eid'])) {
        $id = $_SESSION['eid'];
    }

    if (!empty($_GET['eid'])) {
        $id = $_GET['eid'];
    }
    $query = "SELECT events.title AS title,events.descriptions AS descriptions,events.slots AS slots,events.dates AS dates,events.locations AS locations,banners.file_name AS banner
    FROM events
    INNER JOIN banners
    ON events.event_id=banners.event_id WHERE events.event_id = '$id' ";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
        <?php
            // output data of each row
            $title = $row["title"];
            $descriptions = $row["descriptions"];
            $slots = $row["slots"];
            $dates = $row["dates"];
            $locations = $row["locations"];
            $banner = $row['banner'];

            if ($slots = 'slot1') {
                $slots = "9.00 am - 11.00 am";
            } elseif ($slots = 'slot2') {
                $slots = "2.00 pm - 4.00 pm";
            } elseif ($slots = 'slot2') {
                $slots = "8.00 pm - 11.00 pm";
            }
        } ?>

        <form action="../../controller/manageEventController.php" method="POST">
            <input hidden name="eid" type="text" value="<?= $id ?>">
            <div class="my-30">
                <div class="relative px-6 pt-10 pb-8 bg-white shadow-xl ring-2  ring-indigo-300 ring-gray-900/5 max-w-4xl sm:mx-auto sm:rounded-lg sm:px-10 ">
                    <h1 class="text-xl mb-1">Event banner preview</h1>
                    <div class="max-w-md mx-auto flex">
                        <img class="relative right-48 object-cover w-full h-96 rounded-t-lg md:h-auto md:w-96 md:rounded-none md:rounded-l-lg " src="./<?= $banner ?>" alt="BannerImage">
                        <div class="divide-y divide-gray-300/50 relative right-36">
                            <div class="py-8 text-base leading-7 space-y-6 text-gray-600 w-96">
                                <!-- <h1 class="text-base">Event title:</h1> -->
                                <h1 class="text-2xl"><b><?= $title ?></b></h1>
                                <br>
                                <h1 class="text-base"><b>Event Description:</b></h1>
                                <p><?= $descriptions ?></p>
                                <br><br><br>
                                <h2 class="text-base"><b>Event Slot: </b><?= ucfirst($slots) ?> </h2>
                                <h2><b>Date: </b><?= $dates ?></h2>
                                <h2 class="text-base"><b>Venue: </b>Prodigy Studio, <?= $locations ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <button type="submit" name="save_btn3" value="Draft" class="m-4 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow transition-all">
                    Discard
                </button>
                <button type="submit" name="save_btn3" value="Published" class="m-4 bg-indigo-500 hover:bg-indigo-400 text-white font-bold py-2 px-4 border-b-4 border-indigo-700 hover:border-indigo-500 rounded transition-all">
                    Proceed Payment
                </button>
            </div>
        <?php
    } else {
        echo "";
    }
    // $conn->close();
        ?>
        </form>
        <?php
    } elseif ($_GET['page'] == 'payment') {

        include $_SERVER['DOCUMENT_ROOT']."/DB/db.php";


        if (isset($_GET['error'])) {
            if ($_GET['error'] == '1') {
                echo "<script>alert('Please Enter correct credentials !')</script>";
            }
        }

        if (!empty($_GET['eid'])) {
            if ($_GET['eid'] !== '') {
                $id = $_GET['eid'];
            }
        } else
            $id = $_SESSION['eid'];
        // echo  $id;
        $query = "SELECT events.event_id AS event_id,events.title AS title,events.descriptions AS descriptions,events.slots AS slots,events.dates AS dates,events.locations AS locations,banners.file_name AS banner
        FROM events
        INNER JOIN banners
        ON events.event_id=banners.event_id WHERE events.event_id= '$id';";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>

            <?php
                // output data of each row
                $id = $row["event_id"];
                $title = $row["title"];
                $descriptions = $row["descriptions"];
                $slots = $row["slots"];
                $dates = $row["dates"];
                $locations = $row["locations"];
                $banner = $row['banner'];

                $venue_price = 0;
                $slot_price = 0;
                $total_price = 0;

                /* 
                
                Payment rate Sarang seni 1: RM100
                Payment rate Sarang seni 2: RM80
                Payment rate Sangkar seni : RM50

                Main slot :  RM 30
                Regular slot: RM 20
                
                */
            }


            if ($locations == 'Sangkar Seni 1') {
                $venue_price = 100;
            } elseif ($locations == 'Sangkar Seni 2') {
                $venue_price = 80;
            } elseif ($locations == 'Sarang Seni') {
                $venue_price = 50;
            } else
                $venue_price = 0;

            if ($slots == 'slot1') {
                $slot_price = 20;
            } elseif ($slots == 'slot2') {
                $slot_price = 20;
            } elseif ($slots == 'slot3') {
                $slot_price = 30;
            } else
                $slot_price = 0;

            if ($slots = 'slot1') {
                $slots = "9.00 am - 11.00 am";
            } elseif ($slots = 'slot2') {
                $slots = "2.00 pm - 4.00 pm";
            } elseif ($slots = 'slot2') {
                $slots = "8.00 pm - 11.00 pm";
            }

            $total_price =  $venue_price + $slot_price;


            ?>

            <form action="../../module/payment/generate-gateway-payment-call.php" method="POST">
                <div class="my-30">
                    <div class="relative px-6 pt-10 pb-8 bg-white shadow-xl ring-2  ring-indigo-300 ring-gray-900/5 max-w-4xl sm:mx-auto sm:rounded-lg sm:px-10 ">
                        <h1 class="text-2xl"><b>Event Booking Details</b> for <b><?= $title ?></b></h1>
                        <input name="event_id" hidden type="text" value="<?= $id ?>">
                        <input name="title" hidden type="text" value="<?= $title ?>">
                        <hr>
                        <div class="max-w-md mx-auto flex">                           
                            <div class="relative right-36">
                                <div class=" text-base leading-7 space-y-6 text-gray-600 w-96">
                                    <!-- <p><?= $descriptions ?></p> -->
                                    <br>
                                    <h2 class="text-base"><b>Venue: </b>Prodigy Studio, <?= $locations ?></h2>
                                    <input name="location" hidden type="text" value="<?= $locations ?>">
                                    <h2 class="text-base"><b>Event Slot: </b><?= ucfirst($slots) ?> </h2>
                                    <input name="slot" hidden type="text" value="<?= ucfirst($slots) ?>">
                                    <h2><b>Date: </b><?= $dates ?></h2>
                                    <input name="date" hidden type="text" value="<?= $dates ?>">
                                    <h2 class="text-base"><b>Total Booking Price: </b>RM <input class="cursor-default" readonly name="totalprice" type="text" value="<?= $total_price ?>"></h2>
                                    <hr>
                                    <h2 class="text-base"><b>Please fill your credentials: </b></h2>
                                    <h2 class="text-base"><b>Name: </b> </h2>
                                    <input name="name" id="name" class=" shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required type="text">
                                    <input type="checkbox" id="checkbox1" onclick="toggleName1(this.checked)"><label for="checkbox1"><i> Use account name</i></label>
                                    <h2 class="text-base"><b>Email: </b> </h2>
                                    <input name="email" id="email" class=" shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required type="text">
                                    <input type="checkbox" id="checkbox2" onclick="toggleName2(this.checked)"> <label for="checkbox2"> Use account email</label>
                                      <?php
                                    include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
                                    $username = $_SESSION['username'];
                                    $query = "SELECT first_name, last_name, email FROM users WHERE username = '$username' ";
                                    $result = $conn->query($query);

                                    foreach ($result as $row) {
                                        $row['first_name'];
                                        $row['last_name'];
                                        $row['email'];
                                    }
                                    ?>                                    
                                    <script>
                                        function toggleName1(togglecheck) {
                                            if (togglecheck == true) {
                                                let eventname = document.getElementById("name").value = "<?= $row['first_name'] . " " . $row['last_name'] ?>";
                                            } else
                                                document.getElementById("name").value = "";
                                        }
                                        function toggleName2(togglecheck) {
                                            if (togglecheck == true) {
                                                let eventname = document.getElementById("email").value = "<?= $row['email'] ?>";
                                            } else
                                                document.getElementById("email").value = "";
                                        }
                                    </script>
                                    <h2 class="text-base"><b>Phone Number: </b> </h2>
                                    <input name="phonenumber" class=" shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required type="number">
                                    <br> <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <a href="eventcreationmain.php" value="Draft" class="m-4 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow transition-all">
                        Discard
                    </a>
                    <button type="submit" name="save_btn4" value="Processing" class="m-4 bg-indigo-500 hover:bg-indigo-400 text-white font-bold py-2 px-4 border-b-4 border-indigo-700 hover:border-indigo-500 rounded transition-all">
                        Checkout ToyyibPay payment gateway
                    </button>
                </div>
            </form>
        <?php     } else {
            echo "";
            $conn->close();
        }
    } else if ($_GET['page'] == 'finished') {
        date_default_timezone_set("Asia/Kuala_Lumpur");

        include $_SERVER['DOCUMENT_ROOT']."/DB/db.php";
        $id = $_GET['eid'];

        $query = "SELECT receipt.transaction_id AS transaction_id,receipt.billcode AS billcode,receipt.order_id AS order_id,receipt.status_id AS status_id,receipt.paid_on AS paid_on,receipt.total_paid AS total_paid ,events.title AS title FROM receipt INNER JOIN events ON receipt.event_id = events.event_id WHERE receipt.event_id = '$id'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $title = $row['title'];
                $transaction_id = $row['transaction_id'];
                $status_id = $row['status_id'];
                $billcode = $row['billcode'];
                $order_id = $row['order_id'];
                $total_paid = $row['total_paid'];
                $paid_on =  $row['paid_on'];                
            }
        }
        ?>
        <form action="printreceipt.php" method="POST">
            <input name="event_title" hidden type="text" value="<?= $title ?>">
            <input name="event_id" hidden type="text" value="<?= $id ?>">
            <input name="transaction_id" hidden type="text" value="<?= $transaction_id ?>">
            <input name="status_id" hidden type="text" value="<?= $status_id ?>">
            <input name="billcode" hidden type="text" value="<?= $billcode ?>">
            <input name="order_id" hidden type="text" value="<?= $order_id ?>">
            <input name="msg" hidden type="text" value="<?= $msg ?>">
            <input name="total_paid" hidden type="text" value="<?= $total_paid ?>">

            <div class="mt-16">
                <div class="relative px-6 pt-10 pb-8 bg-white shadow-xl ring-2  ring-indigo-300 ring-gray-900/5 max-w-4xl sm:mx-auto sm:rounded-lg sm:px-10 ">
                    <h1 class="text-3xl text-center" style="font-family: 'Harlow Solid Italic', sans-serif;"><b>Prodigy Studio</b></h1> <br>
                    <h1 class="text-2xl" style="font-family: 'Harlow Solid Italic', sans-serif;"><b>Payment Receipt</b></h1>
                    <hr>
                    <div class="max-w-lg mx-auto flex">
                        <div class="border-2 p-20 rounded-lg mt-5">
                            <h1 class="text-3xl text-center -mt-10 mb-8 font-extralight"><b><?= $title ?></b></h1> <br>
                            <table>
                                <tr>
                                    <td>Event id</td>
                                    <td>: <?= $id ?></td>
                                </tr>
                                <tr>
                                    <td>Bill Code</td>
                                    <td>: <?= $billcode ?></td>
                                </tr>
                                <tr>
                                    <td>Reference No</td>
                                    <td>: <?= $transaction_id ?></td>
                                </tr>
                                <tr>
                                    <td>Total Paid</td>
                                    <td>: RM <?= $total_paid ?></td>
                                </tr>
                                <tr>
                                    <td>Transaction Time</td>
                                    <td>: <?= $paid_on ?></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </table> <br> <br>
                            <p>Payment via</p>
                            <img alt="toyyibPay" width="203" src="https://dev.toyyibpay.com/assets/img/icon/typ2022.png">
                            <img class="mt-16 -mb-20" alt="CatReceiptEvent" width="400" src="../../Img/CatEventReceipt2.jpg">

                        </div>

                    </div> <br>
                    <h1 class="text-2xl text-center" style="font-family: 'Harlow Solid Italic', sans-serif;"><b>Thank you for booking with Prodigy Studio</b></h1>

                </div>
            </div>
            <div class="flex justify-center">
                <a href="eventcreationmain.php" name="" value="" class="m-4 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow transition-all">
                    Back to event creation panel
                </a>
                <button type="submit" name="receipt_btn" class="m-4 bg-indigo-500 hover:bg-indigo-400 text-white font-bold py-2 px-4 border-b-4 border-indigo-700 hover:border-indigo-500 rounded transition-all">
                    Print Receipt
                </button>
            </div>
        </form>

    <?php  }
    $conn->close();
    ?>
    </form>
    </body>
    </html>
    <script>
        function counter() {
            return {
                width: 0,
                increment() {
                    this.width = '100';
                },
                decrement() {
                    this.width--;
                }
            };
        }
    </script>