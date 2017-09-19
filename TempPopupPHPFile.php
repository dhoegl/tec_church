<!-- Modal dialog - Contact Info -->
<div class="modal fade" id="ModalContactInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Contact Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
            <p id="editProfile" class="my_popup4title"> </p>
            <form name='editcontact' method='post' action='/services/ofc_profile_contact_update.php'> 		
                    <table id="editprofiletable" border='0' align='center' cellpadding='0' cellspacing='1' >
                    <tr> 		
                            <td>

                                    <table width='100%' border='0' cellpadding='3' cellspacing='1' >
                                            <tr>
                                                    <td><br /></td>
                                            </tr>
                                            <tr>
                                                    <td><br /></td>
                                            </tr>
                                            <tr>
                                                    <td width='350' align='right'>His First Name</td>
                                                    <td width='6'>:</td>
                                                    <td width='294'><input name='hisfirstname' type='text' id='hisfirstname' value="<?php echo $recordFirstHim; ?>"></td>
                                            </tr>
                                            <tr>
                                                    <td width='350' align='right'>Her First Name</td>
                                                    <td width='6'>:</td>
                                                    <td width='294'><input name='herfirstname' type='text' id='herfirstname' value="<?php echo $recordFirstHer; ?>"></td>
                                            </tr>
                                            <tr>
                                                    <td width='350' align='right'>Last Name</td>
                                                    <td width='6'>:</td>
                                                    <td width='294'><input name='mylastname' type='text' id='mylastname' value="<?php echo $recordLast; ?>"></td>
                                            </tr>
                                            <tr>
                                                    <td width='350' align='right'>Street Address</td>
                                                    <td width='6'>:</td>
                                                    <td width='294'><input name='myaddr1' type='text' id='myaddr1' value="<?php echo $recordAddr1; ?>"></td>
                                            </tr>
                                            <tr>
                                                    <td width='350' align='right'>Apartment # or PO Box</td>
                                                    <td width='6'>:</td>
                                                    <td width='294'><input name='myaddr2' type='text' id='myaddr2' value="<?php echo $recordAddr2; ?>"></td>
                                            </tr>
                                            <tr>
                                                    <td width='350' align='right'>City</td>
                                                    <td width='6'>:</td>
                                                    <td width='294'><input name='mycity' type='text' id='mycity' value="<?php echo $recordCity; ?>"></td>
                                            </tr>
                                            <tr>
                                                    <td width='350' align='right'>State/Province</td>
                                                    <td width='6'>:</td>
                                                    <td>
                                                    <select name="mystate" id="mystate">
<?php
                                                $states_query = "SELECT * from " . $_SESSION['statestablename'];
                                                $statesresult = $mysql->query($states_query) or die(" SQL query error. Error:" . mysql_errno() . " " . mysql_error());
                                                while($states_row = $statesresult->fetch_assoc())
                                                {
                                                        $states_optionvalue = $states_row['state_abbrev'] . " - " . $states_row['state_name'];
                                                        $selectedstate = $states_row['state_abbrev'];		
                                                        echo "<option value='" . $states_optionvalue . "'";
                                                        if($selectedstate == $recordState)
                                                        {
                                                        echo " selected='selected'";
                                                        }
                                                echo ">" . $states_optionvalue . "</option>";
                                                }

?>

                                                </select>
                                                </td>

                                        </tr>
                                        <tr>
                                                <td width='350' align='right'>Zip Code</td>
                                                <td width='6'>:</td>
                                                <td width='294'><input name='myzip' type='text' id='myzip' placeholder="98270" pattern="^\d{5}$" value="<?php echo $recordZip; ?>"></td>
                                        </tr>
                                        <tr>
                                                <td><br /></td>
                                        </tr>
                                        <tr>
                                                <td align="center" colspan="3"><strong><i>Phone number format (###-###-####)</i></strong></td>
                                        </tr>
                                        <tr>
                                                <td width='350' align='right'>Home Phone Number</td>
                                                <td width='6'>:</td>
                                                <td width='294'><input name='myhomephone' type='text' id='myhomephone' placeholder="555-555-5555" pattern="^\d{3}-\d{3}-\d{4}$" value="<?php echo $recordPhoneH; ?>"></td>
                                        </tr>
                                        <tr>
                                                <td align='right'>His Cell Number</td>
                                                <td>:</td>
                                                <td><input name='hiscell' type='text' id='hiscell' placeholder="555-555-5555" pattern="^\d{3}-\d{3}-\d{4}$" value="<?php echo $recordPhoneC1; ?>"></td>
                                        </tr>
                                        <tr>
                                                <td align='right'>Her Cell Number</td>
                                                <td>:</td>
                                                <td><input name='hercell' type='text' id='hercell' placeholder="555-555-5555" pattern="^\d{3}-\d{3}-\d{4}$" value="<?php echo $recordPhoneC2; ?>"></td>
                                        </tr>
                                        <tr>
                                                <td><br /></td>
                                        </tr>
                                        <tr>
                                                <td width='350' align='right'>His Email address</td>
                                                <td width='6'>:</td>
                                                <td width='294'><?php echo "<strong>" . $recordEmail1 . "</strong>" ?></td>
                                        </tr>
                                        <tr>
                                                <td width='350' align='right'>Her Email address</td>
                                                <td width='6'>:</td>
                                                <td width='294'><?php echo "<strong>" . $recordEmail2 . "</strong>" ?></td>
                                        </tr>
                                        <tr>
                                                <td><br /></td>
                                        </tr>
                                        <tr>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                                <td><input type="submit" class="button_flat_blue_small" name='submitcontact' value='Save'></td>
                                                <td><input type="reset" class="my_popup4_close button_flat_blue_small" name="cancel" value="Cancel" /></td>
                                        </tr>
                                        </table>
                                        <p>
                                        <p>
                                </td>
                        </tr>
                </table>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

