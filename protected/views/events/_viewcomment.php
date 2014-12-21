<?php
/* @var $this CommentsController */
/* @var $data Comments */
?>

<div class="view">
    <table class='comments-table'>
        <tr class="danie_com" >
            <td class="comments-table-name">
                <h3>
                    <?php 
                        try {
                            $user = User::model()->findByAttributes(array('id' => $data->user_id));
                            echo $user->lastname . ' '.$user->name;
                        } catch (Exception $e){}  
                    ?>
                </h3>
            </td>
            <td class="comments-table-date">
                <?php
                    echo $data->explodeThisDate($data->create_date). ', ' . $data->explodeThisDateTime($data->create_date); 
                ?>
            </td>
        </tr>
        <tr class="tema_com" >
            <td colspan="2"><h4><?php echo $data->title; ?></h4></td>           
        </tr>
        <tr class="com_com" >
                <td colspan="2" ><p><?php echo $data->text; ?></p></td>             	
        </tr>
   </table>    
</div>