<?php 
    $title = 'Edit Record';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    
    $results = $crud->getSpecialties();

    if(!isset($_GET['id'])){
       include 'includes/errormessage.php';
       header("Location: viewrecords.php");

    }else{
        $id=$_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
    

?>
    <h1 class="text-center">Edit Record</h1>

    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>"/>
    <div class="mb-3">
            <label for="firstname" >First Name</label>
            <input required type="text" class="form-control" value="<?php echo $attendee ['firstname'] ?>" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" >Last Name</label>
            <input required type="text" class="form-control" value="<?php echo $attendee ['lastname'] ?>" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob" >Date of Birth</label>
            <input required type="text" class="form-control" value="<?php echo $attendee ['dateofbirth'] ?>" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="specialty" >Area of Expertise</label>
            <select class="form-select" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value ="<?php echo $r['specialty_id'] ?>"<?php if($r['specialty_id']==$attendee['specialty_id']) echo 'selected'?>>
                        <?php echo $r['name']; ?>
                    </option>
                <?php }?>
            </select>
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email address</label>
            <input required type="email" class="form-control" value="<?php echo $attendee ['emailaddress'] ?>" id="Email" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" value="<?php echo $attendee ['phonenumber'] ?>" id="phone" aria-describedby="phoneHelp" name="phone">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success btn-block" name="submit">Save Changes</button>
            <a href="viewrecords.php" class="btn btn-info">Back to List</a>
        </div>
    </form>

    <?php }?>

    <br>
    <br>
    <br>
    <br>

    <?php require_once 'includes/footer.php';?>