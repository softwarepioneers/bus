<?php
if (!isset($file_access)) die("Direct File Access Denied");
$source = 'Terminal';
$me = "?page=$source";

// Database connection

// Create Passengercart table if not exists
$conn = connect();
$sql = "CREATE TABLE IF NOT EXISTS `Passengercart` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `from` VARCHAR(255) NOT NULL,
    `to` VARCHAR(255) NOT NULL,
    `sendername` VARCHAR(255) NOT NULL,
    `receivername` VARCHAR(255) NOT NULL,
    `senderphone` VARCHAR(255) NOT NULL,
    `receiverphone` VARCHAR(255) NOT NULL,
    `seat` VARCHAR(255) NOT NULL,
    `number` INT NOT NULL,
    `class` VARCHAR(255) NOT NULL
)";
$conn->query($sql);

?>
<script type="text/javascript">
    function printReceipt(data) {
        document.getElementById("receiptFrom").innerHTML = "From: " + data.from;
        document.getElementById("receiptTo").innerHTML = "To: " + data.to;
        document.getElementById("receiptSenderName").innerHTML = "Sender Name: " + data.sendername;
        document.getElementById("receiptReceiverName").innerHTML = "Receiver Name: " + data.receivername;
        document.getElementById("receiptSenderPhone").innerHTML = "Sender Phone: " + data.senderphone;
        document.getElementById("receiptReceiverPhone").innerHTML = "Receiver Phone: " + data.receiverphone;
        document.getElementById("receiptSeat").innerHTML = "Seat: " + data.seat;
        document.getElementById("receiptNumber").innerHTML = "Number of Tickets: " + data.number;
        document.getElementById("receiptClass").innerHTML = "Class: " + data.class;
        $('#receiptModal').modal('show');
    }
</script>



<div class="content">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                All Terminal</h3>
                            <div class='float-right'>
                            <button onclick="window.print();" class="noPrint">
Print Me
</button>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#add">
                                    Add New Terminal 
                                </button></div>
                        </div>

                        <div class="card-body">

                            <table id="example1" style="align-items: stretch;"
                                class="table table-hover w-100 table-bordered table-striped<?php ?>">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>From - to</th>
                                        <th>From phone</th>
                                        <th> Seat</th>
                                        <th> Number Tickets</th>
                                        <th>Class </th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $row = $conn->query("SELECT * FROM Passengercart");
                                    if ($row->num_rows < 1) echo "No Records Yet";
                                    $sn = 0;
                                    while ($fetch = $row->fetch_assoc()) {
                                        $id = $fetch['id'];
                                    ?>

                                    <tr>
                                        <td><?php echo ++$sn; ?></td>
                                        <td><?php echo $fetch['Name'] ?></td>
                                        <td><?php echo $fullname = $fetch['from'] . " to " . $fetch['to']; ?></td>
                                        <td><?php echo $fetch['Phone'] ?></td>
                                        <td><?php echo $fetch['Seat'] ?></td>
                                        <td><?php echo $fetch['Number Tickets'] ?></td>
                                        <td><?php echo $fetch['Class'] ?></td>
                                        <td><?php echo $fetch['date'] ?></td>
                                        <td>
                                            <form method="POST">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#edit<?php echo $id ?>">
                                                    Edit
                                                </button> -
                                                <button type="button" class="btn btn-success" onclick="printReceipt(<?php echo htmlspecialchars(json_encode($fetch)); ?>)">
                                                    Print Receipt
                                                </button>

                                                <input type="hidden" class="form-control" name="id"
                                                    value="<?php echo $id ?>" required id="">
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure about this?')"
                                                    class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="edit<?php echo $id ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Editing <?php echo $fullname; ?> &#128642;</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="form-control" name="id"
                                                            value="<?php echo $id ?>" required id="">
                                                        <p>From : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['from'] ?>" name="from"
                                                                required id="">
                                                        </p>
                                                        <p> To : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['to'] ?>" name="to"
                                                                required id="">
                                                        </p>
                                                        <p> Sender Name : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['sendername'] ?>" name="sendername"
                                                                required id="">
                                                        </p>

                                                        <p> Receiver Name : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['receivername'] ?>" name="receivername"
                                                                required id="">
                                                        </p>

                                                        <p> Sender Phone : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['senderphone'] ?>" name="senderphone"
                                                                required id="">
                                                        </p>

                                                        <p> Receiver Phone : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['receiverphone'] ?>" name="receiverphone"
                                                                required id="">
                                                        </p>
                                                        <p> Seat : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['seat'] ?>" name="seat"
                                                                required id="">
                                                        </p>
                                                        <p> Number of Tickets : <input type="number" class="form-control"
                                                                value="<?php echo $fetch['number'] ?>" name="number"
                                                                required id="">
                                                        </p>
                                                        <p> Class : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['class'] ?>" name="class"
                                                                required id="">
                                                        </p>
                                                        <p>
                                                            <input class="btn btn-info" type="submit" value="Edit Route"
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
                <h4 class="modal-title">Add New Terminal &#128649;
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
                                <option value="">Select Station</option>
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
                                <option value="">Select Station</option>
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
                            <th>Name</th>
                            <td><input type="text" class="form-control" name="sendername" required id=""></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><input type="text" class="form-control" name="receivername" required id=""></td>
                        </tr>
                        <tr>
                            <th>Sender Phone</th>
                            <td><input type="text" class="form-control" name="senderphone" required id=""></td>
                        </tr>
                        <tr>
                            <th>Receiver Phone</th>
                            <td><input type="text" class="form-control" name="receiverphone" required id=""></td>
                        </tr>
                        <tr>
                            <th>Seat</th>
                            <td><input type="text" class="form-control" name="seat" required id=""></td>
                        </tr>
                        <tr>
                            <th>Number of Tickets</th>
                            <td><input type="number" class="form-control" name="number" required id=""></td>
                        </tr>
                        <tr>
                            <th>Class</th>
                            <td>
                                <select name="class" required class="form-control" id="">
                                    <option value="">Select class</option>
                                    <option value="First Class $3">First Class $3</option>
                                    <option value="Second Class $2">Second Class $2</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input class="btn btn-info" type="submit" value="Add Send" name='submit'>
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
    $sendername = $_POST['sendername'];
    $receivername = $_POST['receivername'];
    $senderphone = $_POST['senderphone'];
    $receiverphone = $_POST['receiverphone'];
    $seat = $_POST['seat'];
    $number = $_POST['number'];
    $class = $_POST['class'];

    if (!isset($from, $to, $sendername, $receivername, $senderphone, $receiverphone, $seat, $number, $class)) {
        alert("Fill Form Properly!");
    } else {
        $conn = connect();

        $ins = $conn->prepare("INSERT INTO `Passengercart`(`from_column`, `to_column`, `sender_name`, `receiver_name`, `sender_phone`, `receiver_phone`, `seat`, `number`, `class`) VALUES (?,?,?,?,?,?,?,?,?)");
        $ins->bind_param("sssssssis", $from, $to, $sendername, $receivername, $senderphone, $receiverphone, $seat, $number, $class);
        $ins->execute();
        alert("Route Added!");

        // Display receipt after saving
        echo "<script type='text/javascript'>
                $(document).ready(function(){
                    $('#receiptModal').modal('show');
                });
              </script>";
        
        // Print the saved data
        $receipt = "
            <div id='receiptModal' class='modal fade'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h4 class='modal-title'>Receipt</h4>
                            <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        </div>
                        <div class='modal-body'>
                            <p>From: $from</p>
                            <p>To: $to</p>
                            <p>Sender Name: $sendername</p>
                            <p>Receiver Name: $receivername</p>
                            <p>Sender Phone: $senderphone</p>
                            <p>Receiver Phone: $receiverphone</p>
                            <p>Seat: $seat</p>
                            <p>Number of Tickets: $number</p>
                            <p>Class: $class</p>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-primary' onclick='window.print()'>Print</button>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                        </div>
                    </div>
                </div>
            </div>";
        echo $receipt;

        load($_SERVER['PHP_SELF'] . "$me");
    }
}


if (isset($_POST['edit'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $sendername = $_POST['sendername'];
    $receivername = $_POST['receivername'];
    $senderphone = $_POST['senderphone'];
    $receiverphone = $_POST['receiverphone'];
    $seat = $_POST['seat'];
    $number = $_POST['number'];
    $class = $_POST['class'];
    $id = $_POST['id'];

    if (!isset($from, $to, $sendername, $receivername, $senderphone, $receiverphone, $seat, $number, $class)) {
        alert("Fill Form Properly!");
    } else {
        $conn = connect();
        $ins = $conn->prepare("UPDATE Passengercart SET `from` = ?, `to` = ?, `sendername` = ?, `receivername` = ?, `senderphone` = ?, `receiverphone` = ?, `seat` = ?, `number` = ?, `class` = ? WHERE `id` = ?");
        $ins->bind_param("sssssssis", $from, $to, $sendername, $receivername, $senderphone, $receiverphone, $seat, $number, $class, $id);
        $ins->execute();
        alert("Terminal Modified!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}

if (isset($_POST['del_train'])) {
    $con = connect();
    $conn = $con->query("DELETE FROM Passengercart WHERE id = '" . $_POST['del_train'] . "'");
    if ($con->affected_rows < 1) {
        alert("Terminal Could Not Be Deleted. This Route Has Been Tied To Another Data!");
        load($_SERVER['PHP_SELF'] . "$me");
    } else {
        alert("Terminal Deleted!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}
?>

<!-- Receipt Modal -->
<div id='receiptModal' class='modal fade'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h4 class='modal-title'>Receipt</h4>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
            </div>
            <div class='modal-body'>
                <p id="receiptFrom"></p>
                <p id="receiptTo"></p>
                <p id="receiptSenderName"></p>
                <p id="receiptReceiverName"></p>
                <p id="receiptSenderPhone"></p>
                <p id="receiptReceiverPhone"></p>
                <p id="receiptSeat"></p>
                <p id="receiptNumber"></p>
                <p id="receiptClass"></p>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-primary' onclick='window.print()'>Print</button>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function printReceipt(data) {
        document.getElementById("receiptFrom").innerHTML = "From: " + data.from;
        document.getElementById("receiptTo").innerHTML = "To: " + data.to;
        document.getElementById("receiptSenderName").innerHTML = "Sender Name: " + data.sendername;
        document.getElementById("receiptReceiverName").innerHTML = "Receiver Name: " + data.receivername;
        document.getElementById("receiptSenderPhone").innerHTML = "Sender Phone: " + data.senderphone;
        document.getElementById("receiptReceiverPhone").innerHTML = "Receiver Phone: " + data.receiverphone;
        document.getElementById("receiptSeat").innerHTML = "Seat: " + data.seat;
        document.getElementById("receiptNumber").innerHTML = "Number of Tickets: " + data.number;
        document.getElementById("receiptClass").innerHTML = "Class: " + data.class;
        $('#receiptModal').modal('show');
    }
</script>
