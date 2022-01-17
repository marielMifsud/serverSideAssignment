<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>

        <?= $this->fetch('title') ?>
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--These jQuery libraries for chosen 
            need to be included-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />
    
    <script>
        $(document).ready(function() {
            var $prog1 = $(".progLang1").chosen();
            $(".Front-end1").on("click", function() {
                $prog1.val(["ht", "js"]).trigger("change");

            });

            var Items = $(".chosen-select").chosen();
            
        });
    </script>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Geek Investments</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= $this->Url->build("/trades") ?>">Home</a>
                    </li>
                    <?php if (!isset($loggedInUser)) { ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= $this->Url->build("/users/register") ?>">Register</a>
                        </li>
                    <?php } ?>
                    <?php if (isset($loggedInUser)) { ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= $this->Url->build("/users/logout") ?>">Log Out</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= $this->Url->build("/users/login") ?>">Log In</a>
                        </li>
                    <?php } ?>


                </ul>
            </div>
        </div>
    </nav>

    <div class="container navbar-dark bg-dark text-center " style="color:white; padding-top:1%; padding-bottom: 1%;">
        <?php
        if (isset($loggedInUser)) { ?>
            You are logged in as <?= $loggedInUser->first_name ?>
        <?php } ?>
    </div>


    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>

    <footer class="text-center">
        <hr>
        <p>Geek Investments - Mariel Mifsud </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>