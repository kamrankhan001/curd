<?php require_once "../partials/header.php"; ?>
    <main>
        <div class="bg-dark vh-100">
            <div class="container py-3">
                <?php
                    if(isset($_GET['error'])){
                        echo '<div class="alert alert-danger">'.$_GET['error'].'</div>';
                    }
                ?>
                <div class="alert alert-dark">
                    <form action="../logic/manage.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="father_name" class="form-label">Fahter Name</label>
                                    <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Fahter Name">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="fruit" class="form-label">Favorite Fruit</label>
                                    <select name="fruit" id="fruit" class="form-control">
                                        <option value="">Select Fruit</option>
                                        <option value="Apples">Apples</option>
                                        <option value="pears">pears</option>
                                        <option value="oranges">oranges</option>
                                        <option value="grapefruits">grapefruits</option>
                                        <option value="mandarins ">mandarins </option>
                                    </select>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="date" class="form-label">Date of Brith</label>
                                    <input type="date" class="form-control" name="date" id="date">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="time" class="form-label">Wake up Time</label>
                                    <input type="time" class="form-control" name="time" id="time">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-6">
                                <label for="language" class="form-label">Languages you know</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="language[]" value="Urdu" id="urdu" checked>
                                    <label class="form-check-label" for="urdu">Urdu</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="language[]" value="English" id="english">
                                    <label class="form-check-label" for="english">
                                        English
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="language" class="form-label">Gender</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" value="Male" name="gender" id="male" checked>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" value="Female" name="gender" id="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="pic" class="form-label">Picture</label>
                                    <input type="file" class="form-control" name="pic" id="pic">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" value="Save" class="btn btn-success" name="save">
                                <a href="show.php" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php require_once "../partials/footer.php"; ?>