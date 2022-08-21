<?php require_once "../partials/header.php"; require_once "../logic/manage.php"; ?>


    <main>
        <div class="bg-dark vh-100">
        <div class="container py-3">
                <div class="my-2">
                    <a href="create.php" class="btn btn-primary">Add Info</a>
                </div>
                <div class="alert alert-dark">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Father Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Fruit</th>
                            <th scope="col">Date of Brith</th>
                            <th scope="col">Wake up Time</th>
                            <th scope="col">Languages</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($manager->show() as $data){
                                    echo "<tr>";
                                    echo "<td>{$data['name']}</td>";
                                    echo "<td>{$data['father_name']}</td>";
                                    echo "<td>{$data['email']}</td>";
                                    echo "<td>{$data['fruit']}</td>";
                                    echo "<td>{$data['date']}</td>";
                                    echo "<td>{$data['time']}</td>";
                                    echo "<td>{$data['language']}</td>";
                                    echo "<td>{$data['gender']}</td>";
                                    echo "<td><img src='data:image/jpeg;base64,{$data["picture"]}' class='rounded-circle' width-='30px' height='30px' /></td>";
                                    echo "<td>
                                            <a href='edit.php?id={$data["id"]}' class='btn btn-sm btn-warning'><i class='fa-solid fa-pen-to-square'></i></a>
                                            <a href='../logic/manage.php?delete={$data["id"]}' class='btn btn-sm btn-danger'><i class='fa-solid fa-trash-can'></i></a>
                                            <a href='../logic/manage.php?download={$data["id"]}' class='btn btn-sm btn-info'><i class='fa-solid fa-download'></i></a>
                                        </td>";
                                    echo "</tr>";
                                }
                            ?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>


<?php require_once "../partials/footer.php"; ?>