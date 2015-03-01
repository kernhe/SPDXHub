<?php
    $title = "SPDX";
    include("inc/_header.php");
    include("function/spdx_doc.php");
    $name = "";
    if(array_key_exists('doc_name',$_POST)) {
    	$name = $_POST['doc_name'];
    }
?>

    <!-- <button type="button" class="btn btn-primary" onclick="window.location='upload.php'" style="display:inline-block;width:11.5%;margin-left:10px;">Upload Package</button> -->

    <div class="container">

        <div class="row search-block">    	
            <div class="col-sm-12">
                <form action="index.php" method="post" > <!-- style="width:100%;" -->
            		<input type="text" class="form-control " tabindex="2" autofocus="autofocus" placeholder="Search" value="<?php echo $name; ?>" name="doc_name"/> <!-- style="display:inline-block;width:70%;"  -->
            		<button type="submit" class="btn pull-right">Search</button>
            	</form>
                <div class="draw-line"></div>
                    

                    <button type="submit" class="btn">Filter</button>  
                <div class="draw-line"></div>   
            </div>
        </div>
       


        <div class="row">
            <div class="col-sm-12">
                <table id="spdx_doc_list" class="table table-striped" >
                    <thead>
                        <tr>
                            <th>Document #</th>
                            <th>Document Name</th>
                            <th>Created On</th>
                            <th style="text-align:center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        $result = getSPDX_DocList($name);
                        while(($row = mysql_fetch_assoc($result)) && $count < 5) {
                            echo '<tr>';
                            echo     '<td>';
                            echo         $row['id'];
                            echo     '</td>';
                            echo     '<td>';
                            echo         '<a href="spdx_doc.php?doc_id=' . $row['id'] . '">' . $row['upload_file_name'] . '</a>';
                            echo     '</td>';
                            echo     '<td>';
                            echo         date('m/d/Y', strtotime($row['created_at'])); 
                            echo     '</td>';
                            echo     '<td style="text-align:right;">';
                            echo         '<div>';
                            echo             '<button type="button" class="btn" onclick="window.location=\'spdx_doc.php?doc_id=' . $row['id'] . '\'">View Details</button>';
                            echo             '<button type="button" class="btn">Download</button>'; 
                            echo         '</div>';
                            echo     '</td>';
                            echo '</tr>';

                            $count++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

<?php include("inc/_footer.php"); ?>
