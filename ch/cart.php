<!doctype html>
<?php include_once('../PageHead.php');?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Rapitech index</title>
        <meta name="viewport" content="width=device-width, initial-scale=0.9">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/ytplayer.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate.css">
       


    </head>
    <body>
		<?php include_once ('top.php');?>
        <div class="main-container">
           

            <section>
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 wow bounceIn">
                    <div class="feature boxed bg-secondary">
                    <form id="form1" action="order_handle.php"  method="post" name="form1" class="text-center" data-error="There were errors, please check all required fields and try again" data-success="Thanks for taking the time to complete the planner. We'll be in touch shortly!">
                        <h3 class="uppercase mt48 mt-xs-0 wordColor">Inquiry List</h3>
                        <p class="lead mb64 mb-xs-24">
                            Dear client please check your order and fill the details  <br /> We will contact you as soon as we can .
                        </p>
                        <!--  -->
                        <div class="container">
                    <div class="row">
                    	<input type="text" id="CartList" name="CartList" style="display:none"/>
                        <div class="col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1">
                            <table class="table cart mb48 text-left" name="tb">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Product</th>
                                        <th>Description</th>
                                        <th>Serial Number</th>
                                        <th>Product QTY</th>
                                    </tr>
                                </thead>
                                <tbody id="list">
                            <!-- item -->
                                  <!--   <tr>
                                        <th scope="row">
                                            <a href="#" class="remove-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove from list">
                                                <i class="ti-close"></i>
                                            </a>
                                        </th>
                                        <td>
                                            <a href="#">
                                               <img src="https://placem.at/things?w=600&h=600&random=1" alt="" class="img-responsive product-thumb">
                                            </a>
                                        </td>
                                        <td>
                                            <span>Adrian - Pure Labswool Cap</span>
                                        </td>
                                     
                                    </tr> -->
                            <!-- item -->
                                    
                                </tbody>
                            </table>
                            
                        </div>

                    </div>
                    <!--end of row-->
                </div>

                        <div class="overflow-hidden">
                            <h6 class="uppercase">
                             Your personal details
                            </h6>
                            <input type="text" name="Name" class="col-md-6 validate-required" placeholder="Name*" />
                            <input type="text" name="Email" class="col-md-6 validate-required validate-email" placeholder="Email Address*" />
                            <input type="text" name="Phone" class= "validate-required" placeholder="Phone number*" />
                            <div class="form-group  ">
                            
                               <select name="AddressCity" class="my-form-control my-from-group cbg" id="sel1">
                                <!-- <option value="AF" >select country*</option> -->
                                    <option value="AL">Albania </option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="VG">British Virgin Islands</option>
                                    <option value="BN">Brunei</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo</option>
                                    <option value="CD">Congo - Democratic Republic of</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="CI">Cote d'Ivoire</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="TP">East Timor</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equitorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FK">Falkland Islands (Islas Malvinas)</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guyana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern and Antarctic Lands</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GZ">Gaza Strip</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard Island and McDonald Islands</option>
                                    <option value="VA">Holy See (Vatican City)</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Laos</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macau</option>
                                    <option value="MK">Macedonia - The Former Yugoslav Republic of</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia - Federated States of</option>
                                    <option value="MD">Moldova</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="AN">Netherlands Antilles</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="KP">North Korea</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn Islands</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">Reunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russia</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">Sao Tome and Principe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="CS">Serbia and Montenegro</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                                    <option value="KR">South Korea</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SH">St. Helena</option>
                                    <option value="PM">St. Pierre and Miquelon</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syria</option>
                                    <option value="TW" selected >Taiwan</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="US">United States</option>
                                    <option value="UM">United States Minor Outlying Islands</option>
                                    <option value="VI">United States Virgin Islands</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="WF">Wallis and Futuna</option>
                                    <option value="PS">West Bank</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                              </select>

                            </div>
                           
                            <textarea name="Message" placeholder="Message" rows="4" ></textarea>
                            <hr>
                        </div>
                        <div class="overflow-hidden">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button id="btnSubmit" type="submit">Submit </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </section>
<?php include_once ('footer.php');?>

        </div>
        <?php include_once(VisualRoot.'Common/Script.php'); ?>
        <script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/flickr.js"></script>
		<script src="js/flexslider.min.js"></script>
		<script src="js/lightbox.min.js"></script>
		<script src="js/masonry.min.js"></script>
		<script src="js/twitterfetcher.min.js"></script>
		<script src="js/spectragram.min.js"></script>
		<script src="js/ytplayer.min.js"></script>
		<script src="js/countdown.min.js"></script>
		<script src="js/smooth-scroll.min.js"></script>
		<script src="js/parallax.js"></script>
		<script src="js/scripts.js"></script>
		<script src="js/wow.js"></script>
        <script type="text/javascript" src="../Scripts/myError.js"></script>
		<script type="text/javascript">
		    $(function() {
		        // 購物車cart display none
		        $('.displayNone').css('display', 'none');
		
		        var cartListArr = getCartList();
		        var cartListString = "";
		        $.each(cartListArr, function(index, obj) {
		            cartListString += " <tr> ";
		            cartListString += "<th scope=\"row\"><a class=\"remove-item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"Remove from list\"><i class=\"ti-close\"></i></a></th>";
		            cartListString += "<td><img src=\"" + obj.img + "\" alt=\"\" class=\"img-responsive product-thumb\"></td>";
		            cartListString += "<td><span class=\"tr-tittle\">" + obj.title + "</span></td>";
		            cartListString += "<td>" + obj.modelNo + "</td>";
		            cartListString += "<td><input type=\"text\" placeholder=\"QTY\" value=\"" + obj.amount + "\"/></td>";
		            cartListString += "</tr>";
		        });
		        $('#list').append(cartListString);
		
		        $('i').click(function() {
		            var prdTr = $(this).parents("tr:first");
		            var removedId = prdTr.find('.tr-tittle').data("sn");
		            var currentList = getCartList();
		            $.each(currentList, function(index, obj) {
		                if (obj.id == removedId) {
		                    currentList.splice(index, 1);
		                    return false;
		                }
		            });
		            prdTr.remove();
		
		            localStorage.setItem("carList", JSON.stringify(currentList));
		            $("#cartListnum").text(currentList.length);
		        });
		
		        $('#btnSubmit').click(function() {
		            $("#CartList").val(window.localStorage.getItem("carList"));
		            $("#form1").submit();
		            return false;
		            //                     localStorage.clear();    
		            //                     location.reload();
		        });
		
		        $("#form1").submit(function() {
		            var sError = new MyErrorCh();
		            var AddressValue = new Array();
		            AddressValue.push($("#AddressCity").val());
		            AddressValue.push($("#AddressArea").val());
		            AddressValue.push($("#AddressZipCode").val());
		            AddressValue.push($("#AddressOther").val());
		            sError.checkNull("姓名", $("#Name").val());
		            sError.checkNull("電子郵件", $("#Email").val());
		            sError.checkNull("連絡電話", $("#Phone").val());
		            sError.checkNull("訊息", $("#Message").val());
		            return sError.pass();
		        });
		
		        $("#form1").ajaxComplete(function(event, request, settings) {
		            localStorage.clear();
		            location.reload();
		        });
		
		    });
		</script>
    </body>
</html>