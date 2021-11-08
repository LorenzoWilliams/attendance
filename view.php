<?php 
    $title = 'View Records';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //get attendee
    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';

    }else{
        $id=$_GET['id'];
        $result = $crud->getAttendeeDetails($id);


?>
<div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $result['firstname'].' '. $result['lastname'];?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $result['name'];?>
            </h6>
            <p class="card-text">
                Date Of Birth: <?php echo $result['dateofbirth'];?>
            </p>
            <p class="card-text">
                Email Address: <?php echo $result['emailaddress'];?>
            </p>
            <p class="card-text">
                Contact Number: <?php echo $result['phonenumber'];?>
            </p>
        </div>
    </div> 
    <br/>
            <a href="viewrecords.php" class="btn btn-info">Back to List</a>
            <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
            <a onclick="return confirm ('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger">Delete</a>
<?php }?>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php';?>