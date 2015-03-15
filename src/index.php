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
          <form action="index.php" method="post" >
            <!-- style="width:100%;" -->
            <input type="text" class="form-control " tabindex="2" autofocus="autofocus" placeholder="Search" value="<?php echo $name; ?>" name="doc_name"/>
            <!-- style="display:inline-block;width:70%;"  -->
            <button type="submit" class="btn pull-right">Search</button>
          </form>
          <div class="draw-line"></div>
        
        </div>
      </div>
          

          <!--   <div class="col-sm-12">
            
              <legend id="moreOptions"><img src="images/arrow-closed.png" /> More Options</legend>

                <div class="row">
                <table id="toggleTable">
                    <tbody>
                     <input type="radio" name="group" id="urigroup_no" value="0" checked="checked" />
                            <label for="docnumber">Document Name</label>
                            <input type="radio" name="group" id="docnumber" value="1" />
                            <label for="docnumname">Document ID</label>
                            <label for="uri-charset"><strong>Licences</strong></label></td>
                      </tr>
                      <tr>
                        <td><input id="uri-outline" name="outline" type="checkbox" value="1" />
                            <label title="Show an Outline of the document" for="uri-outline">OSI Approved</label>                        </td>
                        <td width="160" colspan="2"><input id="uri-No200" name="No200" type="checkbox" value="1" />
                            <label title="Validate also pages for which the HTTP status code indicates an error" for="uri-No200">OSI Not Approved</label></td>
                        <td width="128"><input id="uri-verbose2" name="uri-verbose" type="checkbox" value="1" />
                            <label title="Verbose Output" for="uri-verbose2">No license</label></td>
                        <td><label title="Verbose Output" for="uri-verbose"></label></td>
                      </tr>
                      <tr>
                        <th width="136"> Full name </th>
                        <td colspan="2"><select id="uri-charset" name="charset">
                            <option value="(license names)" selected="selected">(license names)</option>
                            <option value="utf-8">3dfx Glide License</option>
                            <option value="utf-16">Abstyles License</option>
                            <option value="iso-8859-1">Academic Free License v1.1</option>
                            <option value="iso-8859-2">Artistic License 1.0 w/clause 8</option>
                            <option value="iso-8859-3">Borceux license</option>
                          </select>                        </td>
                        <td>Identifier </td>
                        <td width="118"><select id="uri-doctype" name="doctype">
                          <option value="Identifier" selected="selected">(Identifier)</option>
                          <option value="HTML5">Glide</option>
                          <option value="XHTML 1.0 Strict">AFL-3.0</option>
                          <option value="XHTML 1.0 Transitional">AMDPLPA</option>
                          <option value="XHTML 1.0 Frameset">APSL-1.0</option>
                          <option value="HTML 4.01 Strict">Artistic-2.0</option>
                          <option value="HTML 4.01 Transitional">CECILL-1.1</option>
                        </select></td>
                      </tr>
                      <tr>
                        <th colspan="5" width="100%"><table border="0">
                          <tr>
                            <td width="101"><strong>Date created</strong></td>
                            <td width="88">&nbsp;</td>
                            <td width="71"><strong>from</strong></td>
                            <td width="99">mm/dd/yyyy</td>
                            <td width="35"><strong>to </strong></td>
                            <td width="82">mm/dd/yyyy</td>
                          </tr>
                        </table>
                        </th>
                      </tr>
                    </tbody>
                  </table>
              <div class="col-sm-12">
                <div class="draw-line"></div>
              </div>
                </div>
              </fieldset>
            </div></td>
          </tr>
          <tr>
            <td><div class="row">
              <div class="row">
                <div class="col-sm-12">
                  <table width = "100%" class="sortable">
                    <thead>
                      <tr bgcolor="#00FFFF">
                        <th width="19%">Document #</th>
                        <th width="29%">Document Name</th>
                        <th width="15%">Created On</th>
                        <th width="14%" class="sorttable_nosort">Licences</th>
                        <th width="23%" class="sorttable_nosort" align="center">Action</th>
                      </tr>
                    </thead> -->
                    


                    <tbody>
                      <?php
                        $count = 0;
                        $result = getSPDX_DocList($name);
                        while(($row = mysql_fetch_assoc($result)) && $count < 10) {
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
							echo     '<td>';
                            echo         '<img src="../src/images/flags.jpg" width="83" height="26" />';
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
            </div></td>
          </tr>
        </table>

        <?php include("inc/_footer.php"); ?>

	<script>
			$(document).ready(function(){
				$("#moreOptions").click(function(){
					$("#toggleTable").toggle();
				});

			});
</script>
<script>
function myFunction() {
    var x = document.getElementById("myBtn").value;
    document.getElementById("demo").innerHTML = x;
}
</script>