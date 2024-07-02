<?php
if (!isset($file_access)) die("Direct File Access Denied");

echo $me = $_SESSION['user_id'];

$source = 'pay.php';
$me = "$source"
?>

<div class="content">
    <div class="container-fluid">
        <?php
        if (!isset($_POST['submit'])) {
        ?>
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header alert-success">
                        <h5 class="m-0">Quick Tips</h5>
                    </div>
                    <div class="card-body">
                        Use the links at the left.
                        <br />You can see list of schedules by clicking on "New Booking". The system will display list
                        of available schedules for you which you can view and make bookings from. <br>Before your
                        bookings are saved, you are redirected to make payment. <br>After a successful payment, system
                        generates your ticket ID for you which you are required to bring to the station. <br>You are
                        allowed to view all your booking history by clicking on "View Bookings".
                    </div>
                </div>
            </div><?php
                    } else {
                        $class = $_POST['class'];
                        $number = $_POST['number'];
                        $schedule_id = $_POST['id'];
                        if ($number < 1) die("Invalid Number");
                        ?>

            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header alert-success">
                            <h5 class="m-0">Booking Preview</h5>
                        </div>
                        <div class="card-body">
                            <div class="callout callout-info">
                                <h5><i class="fas fa-info"></i> <?php echo ucwords($class), " Class" ?>:</h5>
                                You are about to books
                                <?php echo $number, " Ticket", $number > 1 ? 's' : '', ' for ', getRouteFromSchedule($schedule_id); ?>
                                <br />
                                <?php
                                 echo $me = $_SESSION['user_id'];
                                $rows = $conn->query("SELECT * FROM passenger where id='$me'");
                                    if ($rows->num_rows < 1) 
                                    $sn = 0;
                                    while ($fetchs = $rows->fetch_assoc()) {
                                        $name = $fetchs['name'];
                                        $phone=$fetchs['phone'];
                                    ?>
                                    <p> Name
                                        <input type="hidden" class="form-control" name="name" disabled
                                        value="<?php echo $name ?>" required id=""><br>
                                    </p>

                                   <p> Phone
                                   <input type="hidden" class="form-control" name="phone" disabled
                                   value="<?php echo $phone ?>" required id="">
                                   </p>
                                   <p>
                                    <?php }?>

                                <?php
                                    $dis=getRouteFromSchedule($schedule_id);
                                   

                                     $fee = ($_SESSION['amount'] = getFee($schedule_id, $class));
                                    echo $number, " x $", $fee, " = $", ($fee * $number), "<hr/>";
                                    $fee = $fee * $number;
                                    $amount = intval($fee);
                                    $vat = ceil($fee * 0.01);
                                    echo "V.A.T Charges = $$vat<br/><br/><hr/>";
                                    echo "Total = $", $total = $amount + $vat;
                                    $fee =  intval($total) . "00";
                                    $_SESSION['amount'] =  $total;
                                    $_SESSION['original'] =  $fee;
                                    $_SESSION['schedule'] =  $schedule_id;
                                     $_SESSION['no'] =  $number;
                                    $_SESSION['class'] =  $class;
                                    $status="Online";
                                    $date=date('d-m-Y');

                                    
                                        $conn = connect();

                                        // echo $sql="INSERT INTO `passengercart`(`From`, `To`, `Name`, `Phone`, `NumberTickets`, `Class`, `date`, `amount`, `status`) VALUES ($dis,$dis,$name,$phone,$number,$class,$date,$amount,$status)";

                                
                                        $ins = $conn->prepare("INSERT INTO `passengercart`(`From`, `To`, `Name`, `Phone`, `NumberTickets`, `Class`, `date`, `amount`, `status`) VALUES (?,?,?,?,?,?,?,?,?)");
                                        $ins->bind_param("sssssssss", $dis,$dis,$name,$phone,$number,$class,$date,$amount,$status);
                                        $ins->execute();
                                        // alert("Route Added!");
                                        // load($_SERVER['PHP_SELF'] . "$me");
                                    
                                
                                

                                    ?>
                            </div>
                            <a href="pay.php">
                            <button type="submit"
                                    onclick="return confirm('You will be directed to make your payment.\nPayment finalizes your booking!')"
                                    class="btn btn-primary">Pay Now</button>
                                    </a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>



