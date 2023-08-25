<?php
  class Vehicle
  {
    private $plate_number;
    private $vehicle_type;
    private $in_hours;
    private $in_mins;
    private $out_hours;
    private $out_mins;

    public function __construct($plate_number, $vehicle_type,
                              $in_hours, $in_mins,
                              $out_hours, $out_mins) {
      $this->plate_number = $plate_number;
      $this->vehicle_type = $vehicle_type;
      $this->in_hours = $in_hours;
      $this->in_mins = $in_mins;
      $this->out_hours = $out_hours;
      $this->out_mins = $out_mins;
    }

    public function getPlateNumber() {
      return $this->plate_number;
    }

    public function getVehicleType() {
      return $this->vehicle_type;
    }

    public function getInHours() {
      return $this->in_hours;
    }

    public function getInMins() {
      return $this->in_mins;
    }
  
    public function getOutHours() {
      return $this->out_hours;
    }

    public function getOutMins() {
      return $this->out_mins;
    }
  
    public function checkInHours() {
      if ($this->in_hours >= 0 && $this->in_hours <= 24) {
        return true;
      } else {
        return false;
      }
    }

    public function checkOutHours() {
      if ($this->out_hours >= 0 && $this->out_hours <= 24) {
        return true;
      } else {
        return false;
      }
    }

    public function checkInMins() {
      if ($this->in_mins >= 0 && $this->in_mins <= 59) {
        return true;
      } else {
        return false;
      }
    }

    public function checkOutMins() {
      if ($this->out_mins >= 0 && $this->out_mins <= 59) {
        return true;
      } else {
        return false;
      }
    }

    public function checkInputTime() {
      # hours, mins check
      if ($this->checkInHours() && $this->checkInMins() 
        && $this->checkOutHours() && $this->checkOutMins()) {
        # Out >= In check
        if ($this->getOutTotalMins() >= $this->getInTotalMins()) {
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }
    }

    public function getInTotalMins() {
      return (60 * $this->in_hours) + $this->in_mins;
    }

    public function getOutTotalMins() {
      return (60 * $this->out_hours) + $this->out_mins;
    }

    public function getTotalHours() {
      $mins = $this->getOutTotalMins() - $this->getInTotalMins();
      $hours = intdiv($mins, 60);

      if ($mins % 60 != 0) {
        $hours++;
      }

      return $hours;
    }

    public function getAmountToBePaid() {
      $paid = 0.00;

      if ($this->vehicle_type == 'Car') {
        if ($this->getTotalHours() <= 3) {
          $paid = 30.00;
        } else {
          $paid = 30.00 + (($this->getTotalHours() - 3) * 5.00);
        }
      } elseif ($this->vehicle_type == 'Motorbike') {
        if ($this->getTotalHours() <= 2) {
          $paid = 20.00;
        } else {
          $paid = 20.00 + (($this->getTotalHours() - 2) * 5.00);
        }
      } elseif ($this->vehicle_type == 'Bike') {
        $paid = 20.00;
      } elseif ($this->vehicle_type == 'Truck') {
        if ($this->getTotalHours() <= 3) {
          $paid = 40.00;
        } else {
          $paid = 40.00 + (($this->getTotalHours() - 3) * 10.00);
        }
      }

      return number_format($paid, 2);
    }
  }
?>