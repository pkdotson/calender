<?php

  $date_arr = [ 
    "January", "February", "March", "April", "May", "June", "July", 
    "August", "September", "October", "November", "December"
  ];
  
  class Calender {

    public function __construct($date_month, $date_year){
      $this->date_month = $date_month;
      $this->date_year = $date_year;
    }

    public function build_request($date_arr){

      $count = 0;
      while($count < 3){
        $this->build_title($date_arr);
        $this->build_calender();
        if($this->date_month == 12){
          $this->date_month = 1; 
          $this->date_year += 1;
        } else {
          $this->date_month += 1; 
        }
        $count ++;
      }
    }
    
    public function build_title($date_arr){
      $date_name = $this->date_month;
      print "--------------------- \n";
      print "  " . $date_arr[$date_name - 1] . " "  . $this->date_year  ."\n";
      print "--------------------- \n";
      //$this->build_calender();
    }

    public function build_calender(){
     $days=cal_days_in_month(CAL_GREGORIAN,$this->date_month, $this->date_year);
     $date = $this->date_year . "-" . $this->date_month . "-01";
     $start_date = date('w', strtotime($date));
     $str = ''; 
     $counter = 1;
     for($i=0; $i < $days+$start_date; $i++){
       if($i >= $start_date){
         $space = '';
         if ($counter/10 < 1) {
           $space  = " ";
         }
         $str .= $space . $counter . " ";
         $counter ++;

         if(($i +1) % 7 == 0){
           $str .= "\n";
         }
       } else {
         $str .= "   ";
         continue;
       }
     }
     echo $str ."\n";
     print "--------------------- \n";
     print "\n";
    }

  }
  
  $month = (int)$argv[1];
  $year = (int)$argv[2];
  
  if(isset($month) == true && isset($year) == true){
    //print "we are good to go \n";
      $build = new Calender($month, $year);
      $build->build_request($date_arr);
    //$build
  } else {
    print "insufficient args... ie.. 1 2020 \n";
  }
?>
