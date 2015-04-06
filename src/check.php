<?php

$checkboxes = array(
    array( 'label' => 'checkbox 1 label', 'unchecked' => '0', 'checked' => '1' ),
    array( 'label' => 'checkbox 2 label', 'unchecked' => '0', 'checked' => '1' ),
    array( 'label' => 'checkbox 3 label', 'unchecked' => '0', 'checked' => '1' )
);

if( strtolower( $_SERVER[ 'REQUEST_METHOD' ] ) == 'post' )
{
    foreach( $checkboxes as $key => $checkbox )
    {
        if( isset( $_POST[ 'checkbox' ][ $key ] ) && $_POST[ 'checkbox' ][ $key ] == $checkbox[ 'checked' ] )
        {
            echo $checkbox[ 'label' ] . ' is checked, so we use value: ' . $checkbox[ 'checked' ] . '<br>';
        }
        else
        {
            echo $checkbox[ 'label' ] . ' is not checked, so we use value: ' . $checkbox[ 'unchecked' ] . '<br>';
        }
    }
}
?>
<html>
<body>
<form action="" method="post">
    <?php foreach( $checkboxes as $key => $checkbox ): ?>
    <label><input type="checkbox" name="checkbox[<?php echo $key; ?>]" value="<?php echo $checkbox[ 'checked' ]; ?>"><?php echo $checkbox[ 'label' ]; ?></label><br>
    <?php endforeach; ?>
    <input type="submit">
</form>
</body>
</html>