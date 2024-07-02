<?php
if (!isset($file_access)) die("Direct File Access Denied");
$source = 'Terminal';
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
                                All Cargo</h3>
                            <div class='float-right'>
                            <button onclick="window.print();" class="noPrint">
Print Me
</button>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#add">
                                    Add New Cargo 🚍
                                </button></div>
                        </div>

                        <div class="card-body">

                            <table id="example1" style="align-items: stretch;"
                                class="table table-hover w-100 table-bordered table-striped<?php //
                                                                                                                                            ?>">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> Type</th>
                                        <th>From</th>
                                        <th>From Name</th>
                                        <th>Receiver Name</th>
                                        <th>From phone</th>
                                        <th>To phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $row = $conn->query("SELECT * FROM cargo");
                                    if ($row->num_rows < 1) echo "No Records Yet";
                                    $sn = 0;
                                    while ($fetch = $row->fetch_assoc()) {
                                        $id = $fetch['id'];
                                    ?>

                                    <tr>
                                        <td><?php echo ++$sn; ?></td>
                                        <td><?php echo $fetch['cargo_type'] ?></td>
                                 <td><?php  echo   $fullname = $fetch['from'] . " to " . $fetch['to']; ?></td>
                                        
                                            <td><?php echo  $fetch['sendername'] ?></td>
                                            <td><?php echo  $fetch['receivername'] ?></td>
                                            <td><?php echo  $fetch['senderphone'] ?></td>
                                            <td><?php echo  $fetch['receiverphone'] ?></td>
                <td>

                                            <form method="POST">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#edit<?php echo $id ?>">
                                                    Edit
                                                </button> -

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
                                                                value="<?php echo $fetch['cargo_type'] ?>" name="cargo_type"
                                                                required id="">
                                                        </p>
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
                                                        <p> Price : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['Price'] ?>" name="Price"
                                                                required id="">
                                                        </p>
                                                        <p>

                                                            <input class="btn btn-info" type="submit" value="Edit Cargo"
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
                <h4 class="modal-title">Add New Cargo  🚍
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
                            <th>Cargo Type</th>
                            <td><input type="text" class="form-control" name="cargo_type" required id=""></td>
                        </tr>

                        <!-- section 2 -->
                        <tr>
                            <th>Sender Name</th>
                            <td><input type="text" class="form-control" name="sendername" required id=""></td>
                        </tr>
                        <tr>
                            <th>Receiver Name</th>
                            <td><input type="text" class="form-control" name="receivername" required id="">
                            </td>
                        </tr>
                        <!-- section 3 -->
                        <tr>
                            <th>Sender Phone</th>
                            <td><input type="text" class="form-control" name="senderphone" required id=""></td>
                        </tr>
                        <tr>
                            <th>Receiver Phone</th>
                            <td><input type="text" class="form-control" name="receiverphone" required id="">
                            </td>
                        </tr>
                        <tr>
                            <th>Price </th>
                            <td><input type="number" class="form-control" name="Price" required id="">
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
    $sendername = $_POST['sendername'];
    $receivername = $_POST['receivername'];
    $senderphone = $_POST['senderphone'];
    $receiverphone = $_POST['receiverphone'];
    $cargo_type=$_POST['cargo_type'];
    $Price=$_POST['Price'];

    echo $Price;

    // echo $from ;
    // echo $to ;
    // echo $sendername ;
    // echo $receivername ;
    // echo $senderphone ;
    // echo $receiverphone;


    
    if (!isset($from, $to,$sendername,$receivername,$senderphone,$receiverphone,$cargo_type,$Price)) {
        alert("Fill Form Properly!");
    } else {
        $conn = connect();

        $ins = $conn->prepare("INSERT INTO `cargo`(`from`, `cargo_type`, `to`, `sendername`, `receivername`, `senderphone`, `receiverphone`,`Price`) VALUES (?,?,?,?,?,?,?,?)");
        $ins->bind_param("ssssssss", $from, $cargo_type,$to,$sendername,$receivername,$senderphone,$receiverphone,$Price);
        $ins->execute();
        alert("Route Added!");
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
    $Price=$_POST['Price'];
    $id = $_POST['id'];
    if (!isset($from, $to,$sendername,$receivername,$senderphone,$receiverphone,$Price)) {
        alert("Fill Form Properly!");
    } else {
        $conn = connect();
        $ins = $conn->prepare("UPDATE cargo SET from = ?, to = ?,cargo_type=?,sendername = ?,receivername = ? ,senderphone = ? ,receiverphone = ? ,Price= ?  WHERE id = ?");
        // $ins->bind_param("sssssss", $from, $to,$sendername,$receivername,$senderphone,$receiverphone, $id);
        // $ins->execute();
        alert("Terminal Modified!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}

if (isset($_POST['id'])) {
    $con = connect();
    $conn = $con->query("DELETE FROM cargo WHERE id = '" . $_POST['id'] . "'");
    if ($con->affected_rows < 1) {
        alert("Terminal Could Not Be Deleted. This Route Has Been Tied To Another Data!");
        load($_SERVER['PHP_SELF'] . "$me");
    } else {
        alert("Terminal Deleted!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}
?>