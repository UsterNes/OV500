<!--
// ##############################################################################
// OV500 - Open Source SIP Switch & Pre-Paid & Post-Paid VoIP Billing Solution
//
// Copyright (C) 2019-2020 Chinna Technologies   
// Seema Anand <openvoips@gmail.com>
// Anand <kanand81@gmail.com>
// http://www.openvoips.com  http://www.openvoips.org
//
//
// OV500 Version 1.0.1
// License https://www.gnu.org/licenses/agpl-3.0.html
//
//
// The Initial Developer of the Original Code is
// Anand Kumar <kanand81@gmail.com> & Seema Anand <openvoips@gmail.com>
// Portions created by the Initial Developer are Copyright (C)
// the Initial Developer. All Rights Reserved.
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Affero General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU Affero General Public License for more details.
//
// You should have received a copy of the GNU Affero General Public License
// along with this program. If not, see <http://www.gnu.org/licenses/>.
// ##############################################################################
-->
<!-- Parsley -->
<script src="<?php echo base_url() ?>theme/vendors/parsleyjs/dist/parsley.min.js"></script>
<?php
$carrier_ip_data = $data;
//echo '<pre>';print_r($data);print_r($carrier_ip_data);echo '</pre>';
?>

<div class="">
    <div class="clearfix"></div>    

        <div class="col-md-12 col-sm-12 col-xs-12 right">       
        <div class="x_title">
            <h2>Carrier IP-Address Configuration Management</h2>
            <ul class="nav navbar-right panel_toolbox">     
                <li><a href="<?php echo base_url() . 'carriers/edit/' . param_encrypt($carrier_ip_data['carrier_id']); ?>"><button class="btn btn-danger" type="button" >Back to Carrier Edit Page</button></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>

    </div>
    
    
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Carrier IP-Address (EDIT) </h2>
                <ul class="nav navbar-right panel_toolbox">
                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form action="" method="post" name="carrier_form" id="carrier_form" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="button_action" id="button_action" value="">
                    <input type="hidden" name="action" value="OkSaveData"> 
                    <input type="hidden" name="id" value="<?php echo $carrier_ip_data['id']; ?>"/>
                    <input type="hidden" name="carrier_id" value="<?php echo $carrier_ip_data['carrier_id']; ?>"/>    
                    <input type="hidden" name="carrier_key" value="<?php echo $carrier_ip_data['carrier_id']; ?>"/>                         <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Carrier <span class="required">*</span>          </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input type="text" name="carrier_name" id="carrier_name_display" value="<?php echo $carrier_ip_data['carrier_id'] . ' (' . $carrier_ip_data['carrier_name'] . ')'; ?>"  disabled="disabled"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Carrier IP Name <span class="required">*</span>            </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input type="text" name="ipaddress_name" id="ipaddress_name" value="<?php echo $carrier_ip_data['ipaddress_name']; ?>" data-parsley-required="" data-parsley-minlength="4" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Carrier IP<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input type="text" name="ipaddress" id="ipaddress" value="<?php echo $carrier_ip_data['ipaddress']; ?>" data-parsley-required="" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Carrier IP Type <span class="required">*</span></label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <select name="auth_type" id="auth_type" data-parsley-required="" class="form-control" onchange="auth_type_change()">
                                <option value="">Select</option>                    
                                <?php
                                $str = '';
                                $gateway_type_array = array('IP' => 'IP', 'CUSTOMER' => 'CUSTOMER');
                                foreach ($gateway_type_array as $type => $type_name) {
                                    $selected = ' ';
                                    if ($carrier_ip_data['auth_type'] == $type)
                                        $selected = '  selected="selected" ';
                                    $str .= '<option value="' . $type_name . '" ' . $selected . '>' . $type_name . '</option>';
                                }
                                echo $str;
                                ?>
                            </select>
                        </div>
                    </div>



                    <div class="form-group ip_dependent">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">SIP Username <span class="required">*</span> </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input type="text" name="username" id="username" value="<?php echo $carrier_ip_data['username']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group ip_dependent">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Password </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input type="text" name="secret" id="secret" value="<?php echo $carrier_ip_data['passwd']; ?>" class="form-control col-md-7 col-xs-12"  data-parsley-maxlength="30" autocomplete="off">
                        </div>                       
                    </div>              



                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Load sharing</label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input type="text" name="load_share" id="load_share" value="<?php echo $carrier_ip_data['load_share']; ?>" data-parsley-required="" data-parsley-type="digits"  data-parsley-range="[1, 100]" class="form-control col-md-7 col-xs-12">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <div class="radio">
                                <label><input type="radio" name="ip_status" id="status1" value="1"  <?php if ($carrier_ip_data['ip_status'] == 1) { ?> checked="checked" <?php } ?> /> Active</label>
                           
                                <label> <input type="radio" name="ip_status" id="status0" value="0" <?php if ($carrier_ip_data['ip_status'] == 0) { ?> checked="checked" <?php } ?> /> Inactive</label>
                            </div>

                        </div>
                    </div>





                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-6">
                            <!--<a href="<?php echo base_url() . 'carriers/edit/' . param_encrypt($carrier_ip_data['carrier_id']); ?>"><button class="btn btn-primary" type="button">Cancel</button></a>-->				
                            <button type="button" id="btnSave" class="btn btn-success">Save</button>
                            <button type="button" id="btnSaveClose" class="btn btn-info">Save & Go back to Edit Page</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


      <div class="col-md-12 col-sm-12 col-xs-12 right">
        <div class="ln_solid"></div>
        <div class="x_title">
            <h2>Carrier IP-Address Configuration Management</h2>
            <ul class="nav navbar-right panel_toolbox">     
                <li><a href="<?php echo base_url() . 'carriers/edit/' . param_encrypt($carrier_ip_data['carrier_id']); ?>"><button class="btn btn-danger" type="button" >Back to Carrier Edit Page</button></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>

    </div>
    

</div>    
<script>

    window.Parsley
            .addValidator('ip', {
                validateString: function (value) {
                    var pattern = /^[0-9:.]+$/;
                    if (!pattern.test(value))
                        return false;
                    else
                        return true;
                },
                messages: {
                    en: 'Invalid IP'
                }
            });


    window.Parsley
            .addValidator('password', {
                validateString: function (value) {
                    r = true;
                    if (!vCheckPassword(value))
                    {
                        r = false;
                    }
                    return r;
                },
                messages: {
                    en: 'min 8 char, 1 special char, 1 uppercase, 1 lowercase, 1 number'
                }
            });


    $('#btnSave, #btnSaveClose').click(function () {
        var is_ok = $("#carrier_form").parsley().isValid();
        if (is_ok === true)
        {
            var clicked_button_id = this.id;
            if (clicked_button_id == 'btnSaveClose')
                $('#button_action').val('save_close');
            else
                $('#button_action').val('save');

            if (is_ok === true)
            {
                //alert('ok');
                $("#carrier_form").submit();
            }
        } else
        {
            $('#carrier_form').parsley().validate();
        }
    })

    function auth_type_change()
    {
        if ($("#auth_type").val() == 'CUSTOMER')
        {
            $('.ip_dependent').show();

            $('#username').attr('data-parsley-required', 'true');
            //$('#gateway_username').attr('data-parsley-type', 'alphanum');  
            //$('#gateway_username').attr('data-parsley-minlength', '6');  
            //$('#gateway_username').attr('data-parsley-maxlength', '30');		

            ///////////
            $('#secret').attr('data-parsley-required', 'true');
            $('#secret').attr('data-parsley-maxlength', '30');


        } else
        {
            $('#gateway_username').attr('data-parsley-required', 'false');
            //$('#gateway_username').removeAttr('data-parsley-type');  
            //$('#gateway_username').removeAttr('data-parsley-minlength');  
            //$('#gateway_username').removeAttr('data-parsley-maxlength');

            ///////////
            $('#secret').attr('data-parsley-required', 'false');
            $('#secret').removeAttr('data-parsley-maxlength');


            $('.ip_dependent').hide();
        }
    }

    $(document).ready(function () {
        auth_type_change();


    });

</script>
