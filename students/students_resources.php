

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Resources</title>
    <link rel="stylesheet" href="../css/students_resources.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<header>
        <h1>My Resources</h1>
        <a href="../students/dashboard.php" class="back-link"><i class="fas fa-arrow-left"></i> Back</a> <!-- Back arrow icon -->
    </header>

<body>

    <main>
        
        
        <?php
include("../actions/students_fetch_displayed_resources.php");   
                

                    
?>
        
    </main>
</body>
</html>
