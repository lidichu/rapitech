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
        <style type="text/css">
        td {
			  line-height: 24px !important;
			  vertical-align: text-top;
			}
        </style>



    </head>
    <body>
		<?php include_once ('top.php');?>
        <div class="main-container">
            <br>
                <h1 class="text-center wordColor wow bounceIn" data-wow-delay="3s">Contact us</h1>
                <hr>
            <section class="p0">
                <div class="map-holder pt160 pb160 wow fadeIn">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.3136650838424!2d120.29796401538883!3d22.60475923748517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346e037776556f41%3A0xc45467858397992e!2sNo.+12%2C+Fuxing+4th+Rd%2C+Qianzhen+District%2C+Kaohsiung+City%2C+806!5e0!3m2!1sen!2stw!4v1461552570851" frameborder="0" style="border:0" allowfullscreen></iframe>

                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row">

                        <div class="col-sm-6 col-md-5">
                            <h4 class="uppercase">Get In Touch</h4>
                            <p>
                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                            </p>
                            <hr>
                            <p> 12F-5 No.2, Fuxing 4th Rd Qianzhen Dist
                                <br /> Kaohsiung City 806
                                <br /> Taiwan (R.O.C.)
                            </p>
                            <hr>
                            <p>
                                <strong>E:</strong> hello@email.com
                                <br />
                                <strong>P:</strong> (886) 7 535 7099
                                <br />
                            </p>
                        </div>
                        <div class="col-sm-6 col-md-5 col-md-offset-1">
                            <form id="form1" action="contact_handle.php" method="post" name="form1" data-success="Thanks for your submission, we will be in touch shortly." data-error="Please fill all fields correctly.">
                                <input type="text" class="validate-required" name="name" placeholder="Your Name" />
                                          			<div class="overflow-hidden">
            				<h6 class="uppercase">
            				Gender：
            				</h6>
            				<div class="col-sm-4">
            					<span>Man</span>
            					<div class="radio-option">
									<div class="inner"></div>
									<input type="radio" name="Sex" value="Male" />
								</div>
            				</div>
            				<div class="col-sm-4">
            					<span>Woman</span>
            					<div class="radio-option">
									<div class="inner"></div>
									<input type="radio" name="Sex" value="Female" />
								</div>
            				</div>            				
            			</div>
                                <input type="text" class="validate-required" name="Tel" placeholder="Your Tel" />
                                <input type="text" class="validate-required validate-email" name="EMail" placeholder="Email Address" />
                                <!-- contry -->
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
                            	<input type="text" class="validate-required" name="Subject" placeholder="Your Subject" />
                                <textarea class="validate-required" name="Note" rows="3" placeholder="Message"></textarea>
                                <table cellpadding="0" cellspacing="0" border="0">
									<tr >
										<td><h6 class="uppercase">Verification Code：</h6></td>
										<td width="60"><a id="imgVCode" href="#" class="number" onfocus="blur()"><img src="../Scripts/SafeCode.php" border="0" /></a></td>
										<td><input name="VCode" class="key" type="text" id="VCode" size="30" style="width:120px" maxlength="4" /></td>
									</tr>
								</table>     
                                <button id="btnSubmit" type="submit">Send Message</button>
                            </form>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
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
        <!--  -->
        <script src="js/wow.js"></script>
        <script type="text/javascript" src="../Scripts/myError.js"></script>
<script type="text/javascript">

$(function(){

  // 開始 local storage 塞入資料
    // 宣告 carList是一個 arry
    var carList = []; 
    carList = JSON.parse(window.localStorage.getItem("carList"));
      // alert(carList);  
    if(carList){
        $.each(carList,function(idx, value){
            $('#cartList').append(value); 
        })
        // #cartListnum塞入carList 各數
        $("#cartListnum").text(carList.length);
    }
    else
        $("#cartListnum").text("0");
	//$("body").TwZipCode({CountryFieldName : 'AddressCity',AreaFieldName:'AddressArea',ZipCodeFieldName:'AddressZipCode',CountryDefaultValue : '縣/市',AreaDefaultValue: '鄉/鎮/市/區'});
	$("#btnSubmit").click(function(){
		$("#form1").submit();
		return false;
	});
	$("#btnReset").click(function(){
		$("#form1").get(0).reset();
		return false;
	});	
	$("#form1").submit(function(){
		var sError = new MyErrorCh();
		var AddressValue = new Array();
		AddressValue.push($("#AddressCity").val());
		AddressValue.push($("#AddressArea").val());
		AddressValue.push($("#AddressZipCode").val());
		AddressValue.push($("#AddressOther").val());
		sError.checkNull("姓名",$("#Name").val());
		sError.checkNull("連絡電話",$("#Tel").val());

		sError.checkNull("主旨",$("#Subject").val());
		sError.checkNull("內容",$("#Note").val());
		sError.checkNull("驗證碼",$("#VCode").val());
		return sError.pass();
	});
	$("#imgVCode").click(function(){
		$(this).find("img").prop("src","../Scripts/SafeCode.php?r=" + Math.random());
		return false;
	});
 }); 

</script>


    </body>
</html>