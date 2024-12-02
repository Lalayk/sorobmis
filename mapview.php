<?php
if (isset($_POST["selectedText"])) {
    $address = $_POST['selectedText'];

?>
    <iframe style="width: 1090px; height: 395px;" src="https://maps.google.com/maps?q=<?php echo $address,', Soro-soro, Camiguin'; ?>&output=embed"></iframe>
<?php
}
?>