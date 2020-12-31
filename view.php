<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pineapple</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="script.js?id=156487"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <nav>
            <ul>
                <li class="left-side">
                    <a href="#">
                        <img id="union" src="images/Union.svg" alt="Pineaple">
                        <img id="pineapple" src="images/pineapple.svg" alt="pineapple">
                    </a>
                </li>
                <li class="right-side">
                    <a href="#">About</a>
                    <a href="#">How it works</a> 
                    <a href="#">Contact</a>
                </li>
            </ul>
        </nav>
        <div class="box">
            <?php if ($result == "OK") { ?>
            
            <img id="cup" src="images/cup.svg">
            <h1 class="subscribed">Thanks for subscribing!</h1>
            <h2 class="subscribed">You have successfully subscribed to our email listing. Check your email for the discount code.</h2> 
            
            <?php } else { ?>
            
            <h1>Subscribe to newsletters</h1>
            <h2>Subscribe to our newsletter and get 10% discount on pineapple glasses.</h2>
            <form id="f" method="POST" onsubmit="return validate();" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <span class="input-line"></span>
                <input id="email" name="email" type="text" placeholder="Type your email address here…">
                <button id="arrow" name='submit'></button>
                <div class="tos">
                    <div class="container">
                        <input id="tos" type="checkbox" name="tos">
                        <span class="checkbox">
                            <img src="images/ic_checkmark.svg">
                        </span>
                    </div>
                    <p>I agree to <a href="#" class="link">terms of service</a></p>
                </div>
                <noscript>
                <?php if(isset($error_messages)) { ?>
                    <div id="error">
                        <?php foreach($error_messages as $message) { ?>
                        <p id="message"><i class="fas fa-exclamation-circle"></i><?php echo htmlspecialchars($message)?></p>
                        <?php } ?>
                    </div>
                <?php } ?>
                </noscript>
            </form>
            <?php } ?>
			<span class="line"></span>
            <div class="social-icons">
                <a href="#" id="fb">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" id="ig">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" id="tt">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" id="yt">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
        <div class="bg"></div>
    </body>
</html>