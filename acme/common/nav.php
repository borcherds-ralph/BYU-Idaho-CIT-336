
<nav id="menu">
<?php $page = basename($_SERVER['PHP_SELF']); ?>
<ul id="navul">
    <?php if ($page == 'index.php') {
                    echo '<li class="active">';
} else {
    echo '<li>';
}  ?><a href="<?php echo $basepath; ?>/index.php" title="Home">Home</a></li>

    <?php if ($page == 'anvils.php') {
                    echo '<li class="active">';
} else {
echo '<li>';
}  ?><a href="index.php" title="Anvils Link">Anvils</a></li>

    <?php if ($page == 'cannons.php') {
                    echo '<li class="active">';
} else {
echo '<li>';
}  ?><a href="cannons.php" title="Cannons Link">Cannons</a></li>

    <?php if ($page == 'protection.php') {
                    echo '<li class="active">';
} else {
echo '<li>';
}  ?><a href="protection.php" title="Protection Link">Protection</a></li>

    <?php if ($page == 'rockets.php') {
                    echo '<li class="active">';
} else {
echo '<li>';
}  ?><a href="rockets.php" title="Rockets Link">Rockets</a></li>

    <?php if ($page == 'tarps.php') {
                    echo '<li class="active">';
} else {
echo '<li>';
}  ?><a href="tarps.php" title="Tarps Link">Tarps</a></li>
</ul>  
</nav>