<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>

        <?= $this->fetch('title') ?>
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= $this->Url->build("/users/register") ?>">Register</a>
                    </li>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>