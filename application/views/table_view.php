<div id="search_table_container">
                <table id="search_table" border="1" width='60%'>
                    <?php
                        //  if (isset($search_suggestion) && trim($search_suggestion) != ''){
                        //     echo "<span>You might want to search for: <a href='javascript:research;'>" . $search_suggestion . "</a></span><br/><br/>";
                        // }

                        if(isset($table)){
                            if (trim($search_term)==''){
                                echo "<span>View all Books</span>";
                            } else {
                                echo "<span>Search Results for '" . $search_term . "'</span>";
                            }



                            echo '<br/><br/>';
                            echo "<tr >
                                <th width='10%'>Book No.    </th>
                                <th width='40%'>Book        </th>
                                <th width='15%'>Publishment </th>
                            ";
                            if (isset($_SESSION['type']) && $_SESSION['type'] == "admin") echo "<th width='10%'>Tags</th>";

                     
                            echo "</tr>";

                            foreach($table as $row):
                                echo "<tr>";                               
                                echo "<td book_data='book_no' align='center'>" . $row->book_no . "</td>";
                                echo "<td>" .
                                        "<div style = 'font:20px Verdana' book_data='book_title'>" . 
                                            $row->book_title . 
                                        "</div>" . 
                                        
                                        "<div style = 'font-size:17px' book_data='description'> " . 
                                            $row->description   . "<br>" .  
                                        "</div>" . 

                                        "<div style = 'font-size:13px' book_data='author'><em> " . 
                                            $row->name . "<br>" .
                                        "</em></div>";

                                        if (isset($_SESSION['type']) && $_SESSION['type'] == "admin"){  //--------------- ADMIN ACTIONS ----------------\\
                                            
                                            // Edit , Delete Button
                                            echo "<span><a href='javascript:void(0)' bookno='{$row->book_no}' class='edit_button'>Edit</a></span>&nbsp&nbsp&nbsp";
                                            echo "<span><a href='javascript:void(0)' bookno='{$row->book_no}' class='delete_button'>Delete</a></span>&nbsp | &nbsp";
                                            echo "<span><a ";

                                            // Lend , Return Button

                                            /* edit by Edzer Padilla start */
                                            if ($row->status == "reserved")  echo "bookno='{$row->book_no}' class='transaction_anchor lendButton' >Lend</a>";
                                            elseif ($row->status == "borrowed") echo "bookno='{$row->book_no}' class = 'transaction_anchor receivedButton'>Return</a>";
                                            else echo "'>(" . $row->status . ")";
                                            /* edit end */
                                            echo "</span>";

                                            
                                        } else { //--------------- USER ACTIONS ----------------\\
                                            
                                            //favorite button
                                            echo "<span>" .
                                                "<button class='book_action' book_no='" . $row->book_no . "'>favorites</button>&nbsp;&nbsp;" . 
                                            "</span>" .

                                            //reserve button
                                            "<span>" .
                                                "<button action_type='reserve' ";

                                                if ($row->status == "available") echo "class='book_action' book_no='{$row->book_no}'>reserve";
                                                else echo ">(" . $row->status . ")";

                                                echo "</button>" .
                                            "</span>";
                                        }


                                     "</td>";

                                    //other data
                                echo "<td align='center'>" . 
                                         "<div book_data='publisher'>" . $row->publisher . "</div>" .
                                         "<div book_data='date_published'>" . $row->date_published . "</div>" .
                                     "</td>";

                                if (isset($_SESSION['type']) && $_SESSION['type'] == "admin") echo "<td book_data='Tags'>" . $row->Tags . "</td>";


                               
                                echo "</tr>";
                            endforeach;
                        } else  {
                            echo "<span>No results to display</span>";
                        }

                    ?>

</table>
</div>
<script type="text/javascript" src="http://localhost/mysecondrepoV2/js/lend_receive_manager.js"></script>

