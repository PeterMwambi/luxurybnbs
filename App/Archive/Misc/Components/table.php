<div class="table-responsive">
    <table class="table table-light table-bordered">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Number</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Date Added</th>
                <th colspan="2">
                    <h6 class="text-center mb-1"><strong>Actions</strong></h6>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <img src="<?php

                    use Models\Core\App\Utilities\Url;

                    echo Url::getReference("uploads/rooms/82e49a6e-59cf-431b-a97f-73e9558fe448.jpg") ?>" class="img-fluid sm-medium">
                </td>
                <td>
                    2 Bedroomed Executive suite with living room bedroom and own kitchen
                </td>
                <td>Single room</td>
                <td>1</td>
                <td>1200</td>
                <td>Vaccant</td>
                <td>Tuesday, 28/3/2023 4:08pm</td>
                <td><a class="btn btn-primary text-nowrap" href="?LBNBS8949DEFR456W23B">View room</a></td>
                <td><a class="btn btn-danger text-nowrap" href="">Delete room</a></td>
            </tr>
        </tbody>
    </table>
</div>