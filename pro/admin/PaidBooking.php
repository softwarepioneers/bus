<?php
if (!isset($file_access)) die("Direct File Access Denied");
$source = 'BookOffline';
$me = "?page=$source"
?>

<div class="content">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                            Book Offline </h3>
                            <div class='float-right '>
                            <button onclick="window.print();" class="noPrint">
Print Me
</button>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#add">
                                    Add New Book Offline 🚍
                                </button></div>
                        </div>

                        <div class="card-body">

                            <table id="example1" style="align-items: stretch;"
                                class="table table-hover w-100 table-bordered table-striped<?php //
                                                                                                                                            ?>">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> Name</th>
                                        <th>From-TO</th>
                                        <th> phone</th>
                                        <th>Number Tickets</th>
                                        <th>Class</th>
                                        <th>amount</th>
                                        <th>date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $row = $conn->query("SELECT * FROM passengercart");
                                    if ($row->num_rows < 1) echo "No Records Yet";
                                    $sn = 0;
                                    while ($fetch = $row->fetch_assoc()) {
                                        $id = $fetch['id'];
                                    ?>

                                    <tr>
                                        <td><?php echo ++$sn; ?></td>
                                        <td><?php echo $fetch['Name'] ?></td>
                                 <td><?php  echo   $fullname = $fetch['From'] . " to " . $fetch['To']; ?></td>
                                        
                                            <td><?php echo  $fetch['Phone'] ?></td>
                                            <td><?php echo  $fetch['NumberTickets'] ?></td>
                                            <td><?php echo  $fetch['Class'] ?></td>
                                            <td>$<?php echo  $fetch['amount'] ?></td>
                                            <td><?php echo  $fetch['date'] ?></td>
                                            <td><?php echo $fetch['status']?></td>
                                            <td><?php echo $fetch['Paid']?></td>
                                            
                                <td>

                                            <form method="POST">
                                            
                                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#edit<?php echo $id ?>">
                                                    Edit
                                                </button> - -->

                                                <!-- <input type="hidden" class="form-control" name="id"
                                                    value="<?php echo $id ?>" required id="">
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure about this?')"
                                                    class="btn btn-danger">
                                                    Delete
                                                </button> -->
                                            </form>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="edit<?php echo $id ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Editing <?php echo $fullname;


                                                                                        ?> &#128642;</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                    
                                                        <input type="hidden" class="form-control" name="id"
                                                            value="<?php echo $id ?>" required id="">
                                                        <p>cargo type : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['Name'] ?>" name="Name"
                                                                required id="">
                                                        </p>
                                                        <p>From : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['From'] ?>" name="from"
                                                                required id="">
                                                        </p>
                                                        <p> To : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['To'] ?>" name="to"
                                                                required id="">
                                                        </p>
                                                        <p> Phone : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['Phone'] ?>" name="Phone"
                                                                required id="">
                                                        </p>

                                                        <p> Number Tickets : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['NumberTickets'] ?>" name="NumberTickets"
                                                                required id="">
                                                        </p>

                                                        <p> Class : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['Class'] ?>" name="Class"
                                                                required id="">
                                                        </p>

                                                        <p> Amount : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['amount'] ?>" name="amount"
                                                                required id="">
                                                        </p>
                                                        <p>

                                                            <input class="btn btn-info" type="submit" value="Edit Booking"
                                                                name='edit'>
                                                        </p>
                                                    </form>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                        <?php
                                    }
                                        ?>

                                </tbody>
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>
</div>
</section>
</div>

<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" align="center">
            <div class="modal-header">
                <h4 class="modal-title">Add New Book  🚍
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <table class="table table-bordered">

                        <tr>
                            <th>From</th>
                            <td>
                              <select class="form-control" name="from" required id="">
                                <option value="">Select Bus</option>
                                <?php
                                $con = connect()->query("SELECT * FROM train");
                                while ($row = $con->fetch_assoc()) {
                                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                                }
                                ?>
                            </select>
                                
                            
                            </td>
                        </tr>
                        <tr>
                            <th>To</th>
                            <td>
                                
                            <select class="form-control" name="to" required id="">
                                <option value="">Select Bus</option>
                                <?php
                                $con = connect()->query("SELECT * FROM train");
                                while ($row = $con->fetch_assoc()) {
                                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                                }
                                ?>
                            </select>
                            
                            
                            <!-- <input type="text" class="form-control" name="stop" required id=""> -->
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <th>Name</th>
                            <td><input type="text" class="form-control" name="Name" required id=""></td>
                        </tr>

                        <!-- section 2 -->
                        <tr>
                            <th>Phone</th>
                            <td><input type="text" class="form-control" name="Phone" required id=""></td>
                        </tr>
                        <tr>
                            <th>Number Tickets</th>
                            <td><input type="text" class="form-control" name="NumberTickets" required id="">
                            </td>
                        </tr>
                        <!-- section 3 -->
                        <tr>
                            <th>Class</th>
                            <td><input type="text" class="form-control" name="Class" required id=""></td>
                        </tr>
                        <tr>
                            <th>Amount</th>
                            <td><input type="number" class="form-control" name="amount" required id="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">

                                <input class="btn btn-info" type="submit" value="Send" name='submit'>
                            </td>
                        </tr>
                    </table>
                </form>



            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php

if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $Name = $_POST['Name'];
    $Phone = $_POST['Phone'];
    $NumberTickets = $_POST['NumberTickets'];
    $Class = $_POST['Class'];
    $amount=$_POST['amount'];
    $date=date('m-d-Y');
    $status="Offline";

   

    // echo $from ;
    // echo $to ;
    // echo $sendername ;
    // echo $receivername ;
    // echo $senderphone ;
    // echo $receiverphone;


    
    if (!isset($from, $to,$Name,$Phone,$NumberTickets,$Class,$amount,$date)) {
        alert("Fill Form Properly!");
    } else {
        $conn = connect();

        $ins = $conn->prepare("INSERT INTO `passengercart`(`From`, `To`, `Name`, `Phone`, `NumberTickets`, `Class`, `date`, `amount`, `status`) VALUES (?,?,?,?,?,?,?,?,?)");
        $ins->bind_param("sssssssss", $from,$to,$Name,$Phone,$NumberTickets,$Class,$date,$amount,$status);
        $ins->execute();
        alert("Route Added!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}

if (isset($_POST['edit'])) {
    
    $from = $_POST['from'];
    $to = $_POST['to'];
    $Name = $_POST['Name'];
    $Phone = $_POST['Phone'];
    $NumberTickets = $_POST['NumberTickets'];
    $Class = $_POST['Class'];
    $amount = $_POST['amount'];
    $id = $_POST['id'];
    
    if (!isset($from, $to, $Name, $Phone, $NumberTickets, $Class, $amount, $id)) {
        echo "<script>alert('Fill Form Properly!');</script>";
    } else {
        $conn = connect();
        $ins = $conn->prepare("UPDATE passengercart SET `from` = ?, `to` = ?, `Name` = ?, `Phone` = ?, `NumberTickets` = ?, `Class` = ?, `amount` = ? WHERE `id` = ?");
        $ins->bind_param("sssssssi", $from, $to, $Name, $Phone, $NumberTickets, $Class, $amount, $id);
        $ins->execute();
        
        if ($ins->affected_rows > 0) {
            echo "<script>alert('Terminal Modified!');</script>";
        } else {
            echo "<script>alert('No changes made or update failed!');</script>";
        }
        load($_SERVER['PHP_SELF'] . "$me");
        // echo "<script>window.location.href='" . $_SERVER['PHP_SELF'] . "';</script>";
    }
}


// if (isset($_POST['id'])) {
//     $con = connect();
//     $conn = $con->query("DELETE FROM passengercart WHERE id = '" . $_POST['id'] . "'");
//     if ($con->affected_rows < 1) {
//         alert("Terminal Could Not Be Deleted. This Route Has Been Tied To Another Data!");
//         load($_SERVER['PHP_SELF'] . "$me");
//     } else {
//         alert("Terminal Deleted!");
//         load($_SERVER['PHP_SELF'] . "$me");
//     }
// }
?>