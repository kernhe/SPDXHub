<?php
  $title = "SPDX";
  include("function/_header.php");
  include("function/spdx_doc.php");
  include("function/license.php");
  $name = "";
  if(array_key_exists('doc_name',$_POST)) {
    $name = $_POST['doc_name'];
  }

?>
<table id="tablesorter" class="table table-striped display" > <!-- table-striped -->
        
        <thead> 
          <tr>
            <th>#</th>
            <th>Document Name</th>
            <th>Created on</th>
            <th>Licenses</th>
            <th>Action</th>
          </tr>
        </thead>
		<tbody>
          <?php
            $result = getSPDX_DocList($name);
            $count = 0;
            while($row = mysql_fetch_assoc($result)) {
			
                $approval_result = getLicenseApproval_Count($row['spdx_pk']);
                $disapproval_result = getLicenseDisapproval_Count($row['spdx_pk']);
                $unknown_result = getLicenseUnknown_Count($row['spdx_pk']);
                $approval = 0;
                $disapproval = 0;
                $unknown = 0;
                while($row_2 = mysql_fetch_assoc($approval_result)) {
                	$approval += $row_2['approvalCount'];
                }
                while($row_3 = mysql_fetch_assoc($disapproval_result)) {
                	$disapproval += $row_3['disapprovalCount'];
                }
                while($row_4 = mysql_fetch_assoc($unknown_result)) {
                	$unknown += $row_4['unknownCount'];
                }

                echo '<tr>';
                echo     '<td>';
                echo         ++$count; //$row['spdx_pk']
                echo     '</td>';
                echo     '<td>';
                echo         '<a  class="document-name" href="spdx_doc.php?doc_id=' . $row['spdx_pk'] . '">' . $row['document_name'] . '</a>';
                echo     '</td>';
                echo     '<td>';
                echo         date('m/d/Y', strtotime($row['created_date'])); 
                echo     '</td>'; 
                
				echo '<td id="breakdown">';
                echo 	'<div>';
                echo 		'<span title="Contained licenses with SPDX approval." class="b-one">' . $approval . '</span>';
                echo 		'<span title="Contained licenses without SPDX approval." class="b-two">' . $disapproval . '</span>';
                echo 		'<span title="Contained licenses without SPDX acknowledgement." class="b-three">' . $unknown . '</span>';
                echo 	'</div>';
                echo '</td>';

                echo     '<td id="action">';
                echo         '<div>';
                echo             '<button type="button" class="btn btn-info" onclick="window.location=\'spdx_doc.php?doc_id=' . $row['spdx_pk'] . '\'">View Details</button>';
                echo             '<button type="button" class="btn btn-default" onclick="window.open(\'download.php?doc_id=' . $row['spdx_pk'] . '&format=RDF&doc_name=' . $row['document_name'] . '\',\'_blank\');">Download RDF</button>';
                echo             '<button type="button" class="btn btn-default" onclick="window.open(\'.php?doc_id=' . $row['spdx_pk'] . '&format=TAG&doc_name=' . $row['document_name'] . '\',\'_blank\');">Download TAG</button>';
                echo         '</div>';
                echo     '</td>';
                echo '</tr>';
            
			}
          ?>
          
        </tbody>
    </table>