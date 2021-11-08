<?php 
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    
    $results = $crud->getSpecialties();
?>
    <h1 class="text-center">Registration for IT Conference</h1>

    <form method="post" action="success.php">
    <div class="mb-3">
            <label for="firstname" >First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" >Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob" >Date of Birth</label>
            <input type="text" class="form-control" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="specialty" >Area of Expertise</label>
            <select class="form-select" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value ="<?php echo $r['specialty_id'] ?>"><?php echo $r['name']; ?></option>
                <?php }?>
            </select>
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
        </div>
    </form>

    <br>
    <br>
    <br>
    <br>

    <?php require_once 'includes/footer.php';?>