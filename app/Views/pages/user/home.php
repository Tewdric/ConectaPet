<?php
$titulo = 'Home';
?>
<?php
        include './../../components/head/head.php';
    ?>

<body>
    <!-- navbar -->
    <?php
        include './../../components/nav/navBar.php';
        ?>

    <!-- header -->

    <?php
        include './../../components/header_home/header_home.php';
        ?>

    <section class="cards-container">
        <div class="cards">
            <?php
                for($i=0; $i < 16; $i++){
                    include './../../components/card_home/card_home.php';
                }
            ?>
        </div>

        <div class="pagination">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </section>
</body>

</html>