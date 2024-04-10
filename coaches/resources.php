<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Resources</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="../css/resources.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #4b49ac;
            color: #fff;
            padding: 20px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .back-link {
            color: #fff;
            text-decoration: none;
        }

        .back-link i {
            margin-right: 5px;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 40px;
        }

        form {
            width: 800px;
            display: flex;
            flex-direction: column;
        }

        form > div {
            margin: 10px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            width: 20%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #4b49ac;
            color: #fff;
        }

        .btn:hover {
            background-color: #0c007d;
        }

        .resource {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .resource h3 {
            margin-top: 0;
            color: #4b49ac;
        }

        .resource p {
            color: #666;
        }
    </style>
</head>
<body>
    <header>
        <h1>Manage Resources</h1>
        <a href="../coaches/dashboard.php" class="back-link"><i class="fas fa-arrow-left"></i> Back</a> <!-- Back arrow icon -->
    </header>
    <div class="container">
        <form action="../coaches/resources.php" enctype="multipart/form-data" method="post">
            <div><input type="file" name="fileToUpload" class="form-control"></div>
            <textarea name="resource_desc" class="form-control" placeholder="Resource Description"></textarea>
            <div><input type="submit" name="uploadsubmit" value="Add Resource" class="btn"></div>
        </form>
        <div>
            <?php
             include("../actions/upload_resources.php");
             include('../actions/fetch_resource.php');
             include('../actions/delete_resources.php');
            ?>
        </div>
    </div>
</body>
</html>
