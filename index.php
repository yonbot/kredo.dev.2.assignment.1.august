<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <title>Vehicle Parking Calculator</title>
</head>
<body>
  <div class="container">
    <div class="card w-75 mx-auto mt-3 border-0">
      <div class="card-header text-center bg-dark text-white">
        <h3>VEHICLE PARKING CALCULATOR</h3>
      </div>
      <div class="card-body">
        <form action="#" method="post">
          <div class="row">
            <div class="col">
              <label for="number" class="form-label fw-bold mb-0">
                Plate Number
              </label>
              <input type="text" name="number" id="number" 
                class="form-control" required>
            </div>
          </div>
          <div class="row mt-1">
            <div class="col">
              <label for="number" class="form-label fw-bold mb-0">
                Vehicle Type
              </label>
              <select name="type" id="type" class="form-select" required>
                <option value="Car" selected>Car</option>
                <option value="Motorbike">Motorbike</option>
                <option value="Bike">Bike</option>
                <option value="Truck">Truck</option>
              </select>
            </div>
          </div>
          <div class="row mt-1">
            <div class="col">
              <label for="in-hours" class="form-label fw-bold mb-0">
                Time In
              </label>
            </div>
          </div>
          <div class="row">
              <div class="col">
                <input type="number" name="in_hours" id="in-hours" 
                  class="form-control" placeholder="hours" required>
              </div>
              <div class="col">
                <input type="number" name="in_mins" id="in-mins" 
                  class="form-control" placeholder="mins" required>
              </div>
          </div>
          <div class="row mt-1">
            <div class="col">
              <label for="out-hours" class="form-label fw-bold mb-0">
                Time Out
              </label>
            </div>
          </div>
          <div class="row">
            <div class="col">
                <input type="number" name="out_hours" id="out-hours" 
                  class="form-control" placeholder="hours" required>
              </div>
              <div class="col">
                <input type="number" name="out_mins" id="out-mins" 
                  class="form-control" placeholder="mins" required>
              </div>
          </div>
          <div class="row mt-5">
            <div class="col">
              <input type="reset" name="reset" 
                class="btn btn-outline-danger w-100 fw-bold" value="Reset">
            </div>
            <div class="col">
              <button name="calculate" class="btn btn-outline-primary w-100 fw-bold">Calculate</button>
            </div>
          </div>
        </form>
      </div>
        <?php
          include "Vehicle.php";

          if (isset($_POST['calculate'])) {
            $plate_number = $_POST['number'];
            $vehicle_type = $_POST['type'];
            $in_hours = $_POST['in_hours'];
            $in_mins = $_POST['in_mins'];
            $out_hours = $_POST['out_hours'];
            $out_mins = $_POST['out_mins'];

            $vehicle = new Vehicle($plate_number, $vehicle_type,
                                  $in_hours, $in_mins,
                                  $out_hours, $out_mins);
            
            if ($vehicle->checkInputTime()) {
        ?>
          <div class="card-footer bg-transparent border-0">
            <div class="row mt-4 mx-0">
              <div class="col" style="background-color: #85E6C5;">
                <p class="text-end fw-bold my-2">Plate Number</p>
                <p class="text-end fw-bold my-2">Vehicle Type</p>
                <p class="text-end fw-bold my-2">Time in</p>
                <p class="text-end fw-bold my-2">Time Out</p>
                <p class="text-end fw-bold my-2">Total Hours</p>
                <p class="text-end fw-bold my-2">Amount to be Paid</p>
              </div>
              <div class="col">
                <p class="text-start fw-bold my-2"><?=$vehicle->getPlateNumber()?></p>
                <p class="text-start fw-bold my-2"><?=$vehicle->getVehicleType()?></p>
                <p class="text-start fw-bold my-2"><?=$vehicle->getInHours() . ':' . $vehicle->getInMins()?></p>
                <p class="text-start fw-bold my-2"><?=$vehicle->getOutHours() . ':' . $vehicle->getOutMins()?></p>
                <p class="text-start fw-bold my-2"><?=$vehicle->getTotalHours()?></p>
                <p class="text-start fw-bold my-2"><?=$vehicle->getAmountToBePaid()?></p>
              </div>
            </div>
          </div>
        <?php
            } else {
        ?>
          <div class="card-footer bg-danger text-white text-center fw-bold">
            Invalid input. Please check again.
          </div>
        <?php
            }
          }
        ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>