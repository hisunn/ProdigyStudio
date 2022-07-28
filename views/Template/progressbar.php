<?php
include "pb.php";
?>
<!-- component -->
<div <?php if (isset($_GET['page'])) {
        if ($_GET['page'] == 'finished') {
          echo "hidden";
        }
      } ?> class="w-full py-6 my-8" x-data="{width : <?= $GLOBALS['bar1'] ?>, width2: <?= $bar2 ?>,width3:'<?= $GLOBALS['bar3'] ?>' }">
  <div class="flex">
    <div class="w-1/4">
      <div class="relative mb-2">

        <!-- Basic Info done indicator -->
        <div class="w-10 h-10 mx-auto bg-indigo-500 rounded-full text-lg text-white flex items-center">
          <span class="text-center text-white w-full">
            <i class="bi bi-info-lg"></i>
          </span>
        </div>



      </div>
      <div class="text-xs text-center md:text-base">Basic Info</div>
    </div>
    <div x-transition class="w-1/4">
      <div class="relative mb-2">
        <?php if ($GLOBALS['bar1'] == '0') { ?>
          <!-- Ticket Details not done indicator -->
          <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)" role="progressbar" :aria-valuenow="width" aria-valuemin="0" aria-valuemax="100">
            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
              <div class="w-0 bg-indigo-300 py-1 rounded" style="width: 100%;" :style="`width: ${width}%; transition: width 2s;`"></div>
            </div>
          </div>

          <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
            <span class="text-center text-gray-600 w-full">
              <i class="bi bi-ticket-perforated"></i>
            </span>
          </div>

        <?php } ?>
        <?php if ($GLOBALS['bar1'] == '100') { ?>
          <!-- Ticket Details done indicator -->
          <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%); transition: width 100s; transition-delay: 100s;" role="progressbar" :aria-valuenow="width" aria-valuemin="0" aria-valuemax="100">
            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
              <div class="w-0 bg-indigo-300 py-1 rounded" :style="`width: ${width}%; `"></div>
            </div>
          </div>

          <div class="w-10 h-10 mx-auto bg-indigo-500 rounded-full text-lg text-white flex items-center">
            <span class="text-center text-white w-full">
              <i class="bi bi-ticket-perforated"></i>
            </span>
          </div>
        <?php } ?>

      </div>

      <div class="text-xs text-center md:text-base">Ticket Details</div>
    </div>



    <div class="w-1/4">
      <div class="relative mb-2">
        <?php if ($GLOBALS['bar2'] !== '100') { ?>
          <!-- Preview not done indicator -->
          <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)" role="progressbar" :aria-valuenow="width2" aria-valuemin="0" aria-valuemax="100">
            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
              <div class="w-0 bg-indigo-300 py-1 rounded" style="width: 0%;" :style="`width: ${width2}%; transition: width 2s;`"></div>
            </div>
          </div>

          <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
            <span class="text-center text-gray-600 w-full">
              <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z" />
              </svg>
            </span>
          </div>
        <?php } ?>

        <?php if ($GLOBALS['bar2'] == '100') { ?>
          <!-- Preview done indicator -->
          <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)" role="progressbar" :aria-valuenow="width2" aria-valuemin="0" aria-valuemax="100">
            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
              <div class="w-0 bg-indigo-300 py-1 rounded" style="width: 0%;" :style="`width: ${width2}%; transition: width 2s;`"></div>
            </div>
          </div>
          <div class="w-10 h-10 mx-auto  bg-indigo-500 rounded-full text-lg text-white flex items-center">
            <span class="text-center text-white w-full">
              <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z" />
              </svg>
            </span>
          </div>
        <?php } ?>
      </div>


      <div class="text-xs text-center md:text-base">Preview</div>
    </div>

    <div class="w-1/4">
      <div class="relative mb-2">
        <?php if ($GLOBALS['bar3'] == '0') { ?>
          <!-- Payment not done indicator -->
          <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)" role="progressbar" :aria-valuenow="width3" aria-valuemin="0" aria-valuemax="100">
            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
              <div class="w-0 bg-indigo-300 py-1 rounded" style="width: 0%;" :style="`width: ${width3}%; transition: width 2s;`"></div>
            </div>
          </div>

          <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
            <span class="text-center text-gray-600 w-full">
              <i class="bi bi-wallet"></i>
            </span>
          </div>
        <?php } ?>
        <?php if ($GLOBALS['bar1'] == '100' && $GLOBALS['bar2'] == '100' && $GLOBALS['bar3'] == '100') { ?>
          <!-- Payment done indicator -->
          <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)" role="progressbar" :aria-valuenow="width3" aria-valuemin="0" aria-valuemax="100">
            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
              <div class="w-0 bg-indigo-300 py-1 rounded" style="width: 0%;" :style="`width: ${width3}%; transition: width 2s;`"></div>
            </div>
          </div>

          <div class="w-10 h-10 mx-auto bg-indigo-500 rounded-full text-lg text-white flex items-center">
            <span class="text-center text-white w-full">
              <i class="bi bi-wallet"></i>
            </span>
          </div>
        <?php } ?>



      </div>
      <div class="text-xs text-center md:text-base">Payment</div>

    </div>
  </div>
</div>