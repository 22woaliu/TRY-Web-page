<?php 
    session_start();
    $pageTitle = "About Us - Executive Committee"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRY - About Us</title>
    
    <link rel="stylesheet" href="try.css?v=<?php echo time(); ?>">
</head>
<body>

<main class="content-container">
    
    <?php 
        include('header.php'); 
    ?>
    
    <br><br>

    <section class="committee-section">
        <h2 style="font-size: 32px; color: #2c3e50; margin-bottom: 10px;">Our Executive Committee</h2>
        <div style="width: 80px; height: 4px; background-color: #34495e; margin: 0 auto; border-radius: 2px;"></div>
        
        <div class="carousel-wrapper">
            
            <button class="nav-btn prev-btn" id="prevBtn">&lt;</button>
            <button class="nav-btn next-btn" id="nextBtn">&gt;</button>
            
            <div class="carousel-window">
                
                <div class="slides-container" id="slidesContainer">
                    
                    <div class="member-slide">
                        <img src="president.png" alt="Executive Member 1">
                    </div>

                    <div class="member-slide">
                        <img src="vp.png" alt="Executive Member 2">
                    </div>

                    <div class="member-slide">
                        <img src="vp1.png" alt="Executive Member 3">
                    </div>
                    <div class="member-slide">
                        <img src="vp2.png" alt="Executive Member 4">
                    </div>
                    <div class="member-slide">
                        <img src="vp3.png" alt="Executive Member 5">
                    </div>
                    <div class="member-slide">
                        <img src="gs.png" alt="Executive Member 6">
                    </div>
                    <div class="member-slide">
                        <img src="os.png" alt="Executive Member 7">
                    </div>
                    <div class="member-slide">
                        <img src="os1.png" alt="Executive Member 8">
                    </div>
                    <div class="member-slide">
                        <img src="js.png" alt="Executive Member 9">
                    </div>
                    <div class="member-slide">
                        <img src="js1.png" alt="Executive Member 10">
                    </div>
                    <div class="member-slide">
                        <img src="ags.png" alt="Executive Member 11">
                    </div>
                    <div class="member-slide">
                        <img src="ags1.png" alt="Executive Member 12">
                    </div>
                    <div class="member-slide">
                        <img src="treasurer.png" alt="Executive Member 13">
                    </div>
                </div>
            </div> </div>
    </section>
    
    <br><br>

    <?php 
        include('footer.php'); 
    ?>

</main>

<script src="about.js"></script>

</body>
</html>