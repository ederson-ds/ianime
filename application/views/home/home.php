<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<style>
    body {
        background: rgb(154, 154, 154);
        background: linear-gradient(90deg, rgba(154, 154, 154, 1) 0%, rgba(236, 236, 236, 1) 38%, rgba(236, 236, 236, 1) 64%, rgba(154, 154, 154, 1) 100%);
        font-size: 12pt;
    }

    .persona-img {
        width: 80px;
        height: 80px;
    }

    .nav-link {
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji" !important;
        color: aqua !important;
    }

    .bg-light {
        background-color: #253f58 !important;
    }

    .navbar-light .navbar-brand {
        color: white;
    }

    .navbar-light .navbar-brand {
        color: white;
        border: 1px solid;
        padding: 7px;
    }

    .navbar-light .navbar-brand:hover {
        color: white;
        border: 1px solid;
        padding: 7px;
    }

    .navbar-light .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
    }

    .custom-select {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='white' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E")
    }
</style>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" style="font-size: 12pt !important">
    <img src="<?php echo base_url() . 'dist/logo.png' ?>" alt="logo" width="150" style="margin-right: 16px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url() ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() . 'persona/create' ?>">Add Character</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() . 'serie/create' ?>">Add Series</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Top</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Documentation</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <?php if (isset($username)) { ?>
                <a class="nav-link" href="<?php echo base_url() . 'user' ?>" style="padding-right: 15px"><?php echo $username; ?></a>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . 'login' ?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . 'login/signup' ?>" style="padding-right: 15px;">Sign Up</a>
                </li>
            <?php } ?>
        </ul>
        <form action="<?php echo base_url() . 'persona/search' ?>" class="form-inline my-2 my-lg-0">
            <select class="custom-select mr-1" name="type" style="background-color: #253f58;color: white;">
                <option value="character">Character</option>
                <option value="serie">Serie</option>
            </select>
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="searchText">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
    </div>
</nav>