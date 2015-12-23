<html>
<head>

    <title></title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
    <div class="row">
        <h1>Contact List</h1>
        <table class="table table-stripped">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($enquiries as $e) {

                ?>
                <tr>
                    <td><?php echo $e->getId(); ?></td>
                    <td><?php echo $e->getName(); ?></td>
                    <td><?php echo $e->getEmail(); ?></td>
                    <td><?php echo $e->getMessage(); ?></td>
                    <td> Edit / Delete</td>
                </tr>

            <?php } ?>
        </table>
    </div>
</div>
</body>
</html>


