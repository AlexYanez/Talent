<?php require ROUTE_APP . '/views/includes/header.php'; ?>
<div id= "content">
    <section>
        <div class= "container">
            <div class= "row">
                <div class= "col-md-2">
                </div>
                <div class= "col-md-7">
                    <div class="card card-body">
                        <form action= "posting" method="POST">
                            <div class= "form-group">
                                <textarea name= "description" rows="2" class= "form-control"
                                placeholder="Write a comment"></textarea>                                               
                            </div>
                            <input type="submit" class="btn btn-success posting"
                            name="posting" style="float: right" value="Submit"; >
                        </form>
                    </div>
                    <table class= "table table-bordered">
                        <tbody>
                            <?php foreach($data['allMessages'] as $rowPost => $value) { ?>    
                                <tr>        
                                    <td>
                                        <?php 
                                            echo '<small>' . '<strong>' . $value['datemessage'] . '</strong>' . '</small>'  ;
                                            echo '<br>' . $value['post'];
                                            echo '<br>' . '<small>' .  '<strong>' . 'By: ' . $value['username'] . '</strong>' . '</small>';
                                        ?>
                                        <?php if ($value['username'] == $_SESSION['username']) { ?>
                                            <div class="right"><small><a href="#">Delete</a></small></div>
                                        <?php } else { 
                                        }; ?> 
                                    </td>
                                </tr>
                            <?php }  ?>
                        </tbody>
                    </table>
                </div>
                <div class= "col-md-3">
                    
                </div>
            </div>
        </div>
    </section>
</div>

<?php require ROUTE_APP . '/views/includes/footer.php'; ?>