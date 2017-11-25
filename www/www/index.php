<!DOCTYPE HTML>
<?php
include("cookie.php");
?>
<?php
function reconstruct_url($url){    
    $url_parts = parse_url($url);
    $constructed_url = $url_parts['scheme'] . '://' . $url_parts['host'] . $url_parts['path'];

    return $constructed_url;
}


$privatekey = "6LdmjBkUAAAAAKCR7nFLFmpdrs_co64PC8hyjRNn";
$captcha = true;

	

if (isset($_POST['txtEmail']))
{
	if ((isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) || ($captcha == false)) {
		   
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$privatekey.'&response='.$_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if (($responseData->success)  || ($captcha == false))
			{
				
				//get values from previous page
				include("incl_functions.php");
				$ip = $_SERVER['REMOTE_ADDR'];
				$namesurname = stripslashes($_POST['txtFullName']);
				$emailaddress = $_POST['txtEmail'];
				$url = $_POST['txtUrl'];
				$password = $_POST['txtPassword'];
				$monthlyvols= $_POST['ddlSales'];
				$country= $_POST['ddlCountryCode'];
				$ip = get_client_ip();
				if (!empty($_POST['history']))
				{
					$history = true;
				}
				else
				{
					$history = false;
				}
				
				$ref = '';
				$profile = '';
				if (isset($_COOKIE['ref']))
				{
					$ref = $_COOKIE['ref'];
				}
				else
				{
					$ref= '';
				}
				if (isset($_COOKIE['el-device']))
				{
					$profile = $_COOKIE['el-device'];
				}
				else
				{
					$profile= '';
				}
				$details=parse_url($ref);
				//{"Auth":null,"Url":"https://adsfads.com","CountryCode":"AL","Email":"hr@aretosystems.com","Volume":25000,"Password":"jfar123","History":true,"FullName":"jack custo","Ref":"test","Ip":null,"ProfileUid":"524a0dd9-1ec9-de69-c41a-c985fca55dce"}
				$arr = array (	'Auth'=>'',
								'Url'=> $url,
								'CountryCode'=> $country,
								'Email'=>$emailaddress,
								'Volume'=>$monthlyvols,
								'Password'=>$password,
								'History'=>$history,
								'FullName'=>$namesurname,
								'Ref'=>$ref,
								'Ip'=>$ip,
								'ProfileUid'=>$profile
				);
				json_encode($arr);

				$url = "https://myaccount.areto.systems/ajax/signup";    
				$content = json_encode($arr);

				$curl = curl_init($url);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_HEADER, false);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

				$json_response = curl_exec($curl);

				//$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

				curl_close($curl);

				$response = json_decode($json_response, true);

				if ($response['Success'])
				{
					$ok =  $response['Message'];
				}
				else
				{
					$error = $response['Message'];
				}
			} 
			else 
			{
				$error = 'Invalid Captcha - are you a robot?';
			}
	}
	else
	{
		$error = 'Invalid Captcha - are you a robot?';
	}
}
?>
<html>
<head>
    <title>Accept Credit Cards Online Directly On Your Website | Areto Systems</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Accept credit card payments,Accept credit card payments on a website" />
    <meta name="description" content="Accept credit card payments on your website - including Visa, MasterCard, Amex and many more worldwide" />
    <meta property='og:image' content='https://myaccount.areto.systems/landing/payment-gateway-website/images/lp2_logo.jpg' />
    <meta property="og:title" content="Accept credit card payments,Accept credit card payments on a website | Areto Systems" />
    <meta property="og:description" content="Gateway Services for eCommerce, Small Businesses, Startups and more" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@AretoSystems" />
    <meta name="twitter:title" content="Accept credit card payments on your website | Areto Systems" />
    <meta name="twitter:description" content="Accept credit card payments on your website - including Visa, MasterCard, Amex and many more worldwide" />
    <meta name='twitter:image:src' content='https://signup.aretosystems.com/accept-credit-card-payments/images/lp2_logo.jpg' />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/lightslider.css">
    <link rel="stylesheet" href="css/style.css" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,900italic,900,700italic,700,500italic,500,400italic,300italic,300,100,100italic|Lato:400,900italic,900,700italic,400italic,700,300italic,300,100,100italic' rel='stylesheet' type='text/css'>
    <link rel="apple-touch-icon" sizes="57x57" href="../favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicons/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
	<script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript">
      (function() {
        var t = document.createElement('script'),
            s = document.getElementsByTagName('script')[0];
        t.async = true;
        t.id = 'el-tracker';
        t.setAttribute('siteid', '1bfa9217-c3c7-4cdd-b50b-a355c4be8080');
        t.src = ('https:' == document.location.protocol ? 'https://profile.aretosystems.com' : 'http://profile.aretosystems.com') + '/signups/profile.min.js';
        s.parentNode.insertBefore(t, s);
      })();


    </script>
</head>
<body>
    <header id="home-section">

        <div class="menu one-page-menu">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="https://www.aretosystems.com">
                            <img src="https://cdn.aretosystems.com/images/logo.png" alt="Logo" height="40%" width="40%">
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
						<li><a href="https://www.aretosystems.com">HOME</a></li>
							<li><a href="#features">Features</a></li>
                            <li><a href="#contact-section">CONTACT US</a></li>
                            <li><a href="#areto-net">What's free?</a></li>

                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </header>
    
		<section  id="signup">
			<div class="main-slider">
				<div id="main-slider-carousel" class="carousel slide" data-ride="carousel">
	
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img src="images/lp2.jpg" alt="accept credit card payments - areto.systems">
						</div> 
				</div>
				<div class="carousel-caption">
					<div class="container">
						<form  name="sign-up" method="post" action="index.php" onsubmit="return Signup();">
							<div class="property-slider-info-left">
								<h1 class="text-center">Accept Credit Cards Online Directly On Your Website</h1>
								<div  class="text-center" style="color:white;font-size:17px;">All Major Brands like Visa or MasterCard and more included worldwide</div>
							</div>
							<div class="property-slider-info">
								<h3 class="text-center">Rates from 1.75% + € 0.12  <br/> on your merchant account</h3>
								<h2 class="text-center">Sign up today!</h2>
                                <div class="row">
                                    <div class="col-xs-12" id="divMessage">
									<?php if (isset($error) && $error != '') { ?>
										<div class="alert alert-danger alert-styled-left alert-bordered"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button><span class="text-semibold">Alert! </span><?php echo $error ?></div>
									
									<?php } else if (isset($ok) && $ok != '') { ?>
										<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button><span class="text-semibold">Success! </span><?php echo $ok ?></div>
									
									<?php } ?>
                                    </div>
                                </div>
									<select name="ddlCountryCode" id="ddlCountryCode" class="selectpicker" data-live-search="true" title="Country of Incorporation" required>
                                        <option value="AF">AFGHANISTAN</option>
                                        <option value="AX">&#197;LAND ISLANDS</option>
                                        <option value="AL">ALBANIA</option>
                                        <option value="DZ">ALGERIA</option>
                                        <option value="AS">AMERICAN SAMOA</option>
                                        <option value="AD">ANDORRA</option>
                                        <option value="AO">ANGOLA</option>
                                        <option value="AI">ANGUILLA</option>
                                        <option value="AQ">ANTARCTICA</option>
                                        <option value="AG">ANTIGUA AND BARBUDA</option>
                                        <option value="AR">ARGENTINA</option>
                                        <option value="AM">ARMENIA</option>
                                        <option value="AW">ARUBA</option>
                                        <option value="AU">AUSTRALIA</option>
                                        <option value="AT">AUSTRIA</option>
                                        <option value="AZ">AZERBAIJAN</option>
                                        <option value="BS">BAHAMAS</option>
                                        <option value="BH">BAHRAIN</option>
                                        <option value="BD">BANGLADESH</option>
                                        <option value="BB">BARBADOS</option>
                                        <option value="BY">BELARUS</option>
                                        <option value="BE">BELGIUM</option>
                                        <option value="BZ">BELIZE</option>
                                        <option value="BJ">BENIN</option>
                                        <option value="BM">BERMUDA</option>
                                        <option value="BT">BHUTAN</option>
                                        <option value="BO">BOLIVIA</option>
                                        <option value="BQ">BONAIRE, SINT EUSTATIUS AND SABA</option>
                                        <option value="BA">BOSNIA AND HERZEGOVINA</option>
                                        <option value="BW">BOTSWANA</option>
                                        <option value="BV">BOUVET ISLAND</option>
                                        <option value="BR">BRAZIL</option>
                                        <option value="IO">BRITISH INDIAN OCEAN TERRITORY</option>
                                        <option value="BN">BRUNEI DARUSSALAM</option>
                                        <option value="BG">BULGARIA</option>
                                        <option value="BF">BURKINA FASO</option>
                                        <option value="BI">BURUNDI</option>
                                        <option value="KH">CAMBODIA</option>
                                        <option value="CM">CAMEROON</option>
                                        <option value="CA">CANADA</option>
                                        <option value="CV">CAPE VERDE</option>
                                        <option value="KY">CAYMAN ISLANDS (THE)</option>
                                        <option value="CF">CENTRAL AFRICAN REPUBLIC (THE)</option>
                                        <option value="TD">CHAD</option>
                                        <option value="CL">CHILE</option>
                                        <option value="CN">CHINA</option>
                                        <option value="CX">CHRISTMAS ISLAND</option>
                                        <option value="CC">COCOS (KEELING) ISLANDS (THE)</option>
                                        <option value="CO">COLOMBIA</option>
                                        <option value="KM">COMOROS</option>
                                        <option value="CG">CONGO</option>
                                        <option value="CD">CONGO (THE DEMOCRATIC REPUBLIC OF THE)</option>
                                        <option value="CK">COOK ISLANDS</option>
                                        <option value="CR">COSTA RICA</option>
                                        <option value="CI">C&#212;TE D&#39;IVOIRE</option>
                                        <option value="HR">CROATIA</option>
                                        <option value="CU">CUBA</option>
                                        <option value="CW">CURA&#199;AO</option>
                                        <option value="CY">CYPRUS</option>
                                        <option value="CZ">CZECH REPUBLIC</option>
                                        <option value="DK">DENMARK</option>
                                        <option value="DJ">DJIBOUTI</option>
                                        <option value="DM">DOMINICA</option>
                                        <option value="DO">DOMINICAN REPUBLIC</option>
                                        <option value="EC">ECUADOR</option>
                                        <option value="EG">EGYPT</option>
                                        <option value="SV">EL SALVADOR</option>
                                        <option value="GQ">EQUATORIAL GUINEA</option>
                                        <option value="ER">ERITREA</option>
                                        <option value="EE">ESTONIA</option>
                                        <option value="ET">ETHIOPIA</option>
                                        <option value="FK">FALKLAND ISLANDS</option>
                                        <option value="FO">FAROE ISLANDS</option>
                                        <option value="FJ">FIJI</option>
                                        <option value="FI">FINLAND</option>
                                        <option value="FR">FRANCE</option>
                                        <option value="GF">FRENCH GUIANA</option>
                                        <option value="PF">FRENCH POLYNESIA</option>
                                        <option value="TF">FRENCH SOUTHERN TERRITORIE</option>
                                        <option value="GA">GABON</option>
                                        <option value="GM">GAMBIA</option>
                                        <option value="GE">GEORGIA</option>
                                        <option value="DE">GERMANY</option>
                                        <option value="GH">GHANA</option>
                                        <option value="GI">GIBRALTAR</option>
                                        <option value="GR">GREECE</option>
                                        <option value="GL">GREENLAND</option>
                                        <option value="GD">GRENADA</option>
                                        <option value="GP">GUADELOUPE</option>
                                        <option value="GU">GUAM</option>
                                        <option value="GT">GUATEMALA</option>
                                        <option value="GG">GUERNSEY</option>
                                        <option value="GN">GUINEA</option>
                                        <option value="GW">GUINEA-BISSAU</option>
                                        <option value="GY">GUYANA</option>
                                        <option value="HT">HAITI</option>
                                        <option value="HM">HEARD ISLAND AND MCDONALD ISLANDS</option>
                                        <option value="VA">HOLY SEE (THE) [VATICAN CITY STATE]</option>
                                        <option value="HN">HONDURAS</option>
                                        <option value="HK">HONG KONG</option>
                                        <option value="HU">HUNGARY</option>
                                        <option value="IS">ICELAND</option>
                                        <option value="IN">INDIA</option>
                                        <option value="ID">INDONESIA</option>
                                        <option value="IR">IRAN (THE ISLAMIC REPUBLIC OF)</option>
                                        <option value="IQ">IRAQ</option>
                                        <option value="IE">IRELAND</option>
                                        <option value="IM">ISLE OF MAN</option>
                                        <option value="IL">ISRAEL</option>
                                        <option value="IT">ITALY</option>
                                        <option value="JM">JAMAICA</option>
                                        <option value="JP">JAPAN</option>
                                        <option value="JE">JERSEY</option>
                                        <option value="JO">JORDAN</option>
                                        <option value="KZ">KAZAKHSTAN</option>
                                        <option value="KE">KENYA</option>
                                        <option value="KI">KIRIBATI</option>
                                        <option value="KP">KOREA (THE DEMOCRATIC PEOPLE&#39;S REPUBLIC OF)</option>
                                        <option value="KR">KOREA (THE REPUBLIC OF)</option>
                                        <option value="KW">KUWAIT</option>
                                        <option value="KG">KYRGYZSTAN</option>
                                        <option value="LA">LAO PEOPLE&#39;S DEMOCRATIC REPUBLIC (THE)</option>
                                        <option value="LV">LATVIA</option>
                                        <option value="LB">LEBANON</option>
                                        <option value="LS">LESOTHO</option>
                                        <option value="LR">LIBERIA</option>
                                        <option value="LY">LIBYA</option>
                                        <option value="LI">LIECHTENSTEIN</option>
                                        <option value="LT">LITHUANIA</option>
                                        <option value="LU">LUXEMBOURG</option>
                                        <option value="MO">MACAO</option>
                                        <option value="MK">MACEDONIA (THE FORMER YUGOSLAV REPUBLIC OF)</option>
                                        <option value="MG">MADAGASCAR</option>
                                        <option value="MW">MALAWI</option>
                                        <option value="MY">MALAYSIA</option>
                                        <option value="MV">MALDIVES</option>
                                        <option value="ML">MALI</option>
                                        <option value="MT">MALTA</option>
                                        <option value="MH">MARSHALL ISLANDS </option>
                                        <option value="MQ">MARTINIQUE</option>
                                        <option value="MR">MAURITANIA</option>
                                        <option value="MU">MAURITIUS</option>
                                        <option value="YT">MAYOTTE</option>
                                        <option value="MX">MEXICO</option>
                                        <option value="FM">MICRONESIA (THE FEDERATED STATES OF)</option>
                                        <option value="MD">MOLDOVA (THE REPUBLIC OF)</option>
                                        <option value="MC">MONACO</option>
                                        <option value="MN">MONGOLIA</option>
                                        <option value="ME">MONTENEGRO</option>
                                        <option value="MS">MONTSERRAT</option>
                                        <option value="MA">MOROCCO</option>
                                        <option value="MZ">MOZAMBIQUE</option>
                                        <option value="MM">MYANMAR</option>
                                        <option value="NA">NAMIBIA</option>
                                        <option value="NR">NAURU</option>
                                        <option value="NP">NEPAL</option>
                                        <option value="NL">NETHERLANDS (THE)</option>
                                        <option value="NC">NEW CALEDONIA</option>
                                        <option value="NZ">NEW ZEALAND</option>
                                        <option value="NI">NICARAGUA</option>
                                        <option value="NE">NIGER (THE)</option>
                                        <option value="NG">NIGERIA</option>
                                        <option value="NU">NIUE</option>
                                        <option value="NF">NORFOLK ISLAND</option>
                                        <option value="MP">NORTHERN MARIANA ISLANDS</option>
                                        <option value="NO">NORWAY</option>
                                        <option value="OM">OMAN</option>
                                        <option value="PK">PAKISTAN</option>
                                        <option value="PW">PALAU</option>
                                        <option value="PS">PALESTINE, STATE OF</option>
                                        <option value="PA">PANAMA</option>
                                        <option value="PG">PAPUA NEW GUINEA</option>
                                        <option value="PY">PARAGUAY</option>
                                        <option value="PE">PERU</option>
                                        <option value="PH">PHILIPPINES</option>
                                        <option value="PN">PITCAIRN</option>
                                        <option value="PL">POLAND</option>
                                        <option value="PT">PORTUGAL</option>
                                        <option value="PR">PUERTO RICO</option>
                                        <option value="QA">QATAR</option>
                                        <option value="RE">R&#201;UNION</option>
                                        <option value="RO">ROMANIA</option>
                                        <option value="RU">RUSSIA</option>
                                        <option value="RW">RWANDA</option>
                                        <option value="BL">SAINT BARTH&#201;LEMY</option>
                                        <option value="SH">SAINT HELENA, ASCENSION AND TRISTAN DA CUNHA</option>
                                        <option value="KN">SAINT KITTS AND NEVIS</option>
                                        <option value="LC">SAINT LUCIA</option>
                                        <option value="MF">SAINT MARTIN</option>
                                        <option value="PM">SAINT PIERRE AND MIQUELON</option>
                                        <option value="VC">SAINT VINCENT AND THE GRENADINES</option>
                                        <option value="WS">SAMOA</option>
                                        <option value="SM">SAN MARINO</option>
                                        <option value="ST">SAO TOME AND PRINCIPE</option>
                                        <option value="SA">SAUDI ARABIA</option>
                                        <option value="SN">SENEGAL</option>
                                        <option value="RS">SERBIA</option>
                                        <option value="SC">SEYCHELLES</option>
                                        <option value="SL">SIERRA LEONE</option>
                                        <option value="SG">SINGAPORE</option>
                                        <option value="SX">SINT MAARTEN (DUTCH PART)</option>
                                        <option value="SK">SLOVAKIA</option>
                                        <option value="SI">SLOVENIA</option>
                                        <option value="SB">SOLOMON ISLANDS</option>
                                        <option value="SO">SOMALIA</option>
                                        <option value="ZA">SOUTH AFRICA</option>
                                        <option value="GS">SOUTH GEORGIA AND THE SANDWICH ISLANDS</option>
                                        <option value="SS">SOUTH SUDAN</option>
                                        <option value="ES">SPAIN</option>
                                        <option value="LK">SRI LANKA</option>
                                        <option value="SD">SUDAN</option>
                                        <option value="SR">SURINAME</option>
                                        <option value="SJ">SVALBARD AND JAN MAYEN</option>
                                        <option value="SZ">SWAZILAND</option>
                                        <option value="SE">SWEDEN</option>
                                        <option value="CH">SWITZERLAND</option>
                                        <option value="SY">SYRIA</option>
                                        <option value="TW">TAIWAN (PROVINCE OF CHINA)</option>
                                        <option value="TJ">TAJIKISTAN</option>
                                        <option value="TZ">TANZANIA</option>
                                        <option value="TH">THAILAND</option>
                                        <option value="TL">TIMOR-LESTE</option>
                                        <option value="TG">TOGO</option>
                                        <option value="TK">TOKELAU</option>
                                        <option value="TO">TONGA</option>
                                        <option value="TT">TRINIDAD AND TOBAGO</option>
                                        <option value="TN">TUNISIA</option>
                                        <option value="TR">TURKEY</option>
                                        <option value="TM">TURKMENISTAN</option>
                                        <option value="TC">TURKS AND CAICOS ISLANDS</option>
                                        <option value="TV">TUVALU</option>
                                        <option value="UG">UGANDA</option>
                                        <option value="UA">UKRAINE</option>
                                        <option value="AE">UNITED ARAB EMIRATES</option>
                                        <option value="GB">UNITED KINGDOM</option>
                                        <option value="US">UNITED STATES</option>
                                        <option value="UM">UNITED STATES MINOR OUTLYING ISLANDS</option>
                                        <option value="UY">URUGUAY</option>
                                        <option value="UZ">UZBEKISTAN</option>
                                        <option value="VU">VANUATU</option>
                                        <option value="VE">VENEZUELA</option>
                                        <option value="VN">VIET NAM</option>
                                        <option value="VG">VIRGIN ISLANDS (BRITISH)</option>
                                        <option value="VI">VIRGIN ISLANDS (U.S.)</option>
                                        <option value="WF">WALLIS AND FUTUNA</option>
                                        <option value="EH">WESTERN SAHARA</option>
                                        <option value="YE">YEMEN</option>
                                        <option value="ZM">ZAMBIA</option>
                                        <option value="ZW">ZIMBABWE</option>
										</select>
										<select name="ddlSales" id="ddlSales" class="selectpicker" data-live-search="true" title="Monthly sales in Euro" required>
                                            <option value="2500">Less than € 5,000</option>
                                            <option value="10000">€ 5,000 to € 15,000</option>
                                            <option value="25000">€ 15,000 to € 35,000</option>
                                            <option value="50000">€ 35,000 to € 75,000</option>
                                            <option value="95000">€ 70,000 to € 125,000</option>
                                            <option value="150000">€ 125,000 +</option>
											</select>
                                
									<div class="row">
                                      
										<div class="col-xs-12">
											<input type="text" name="txtFullName" id="txtFullName" placeholder="Full Name" required value="<?php echo $_POST['txtFullName'];?>">
										</div>
										<div class="col-xs-12">
											<input type="email" name="txtEmail" id="txtEmail" placeholder="Email Address" required value="<?php echo $_POST['txtEmail'];?>">
										</div>
										<div class="col-xs-12">
											<input type="email" name="txtEmail2" id="txtEmail2" placeholder="Confirm Email Address" required value="<?php echo $_POST['txtEmail2'];?>">
										</div>
                                        <div class="col-xs-12">
                                            <input type="password" name="txtPassword" id="txtPassword" placeholder="Enter a password" required>
                                        </div>
										<div class="col-xs-12">
											<input type="text" name="txtUrl" id="txtUrl" placeholder="Website URL. Ex. https://www.myurl.com" required value="<?php echo $_POST['txtUrl'];?>">
										</div>
										<div class="col-xs-12">
											<div class="col-xs-12"><span>Have you ever accepted payments on your website?</span></div>
											<div class="col-xs-6">
								
												<label>
													no&nbsp; <input class="inline" type="radio" name="history" value="" checked="true" required/> 
												</label>
											
											</div>
											<div class="col-xs-6 inline">
												<label>
													yes <input class="inline" type="radio" name="history" value="true" required /> 
												</label>
										
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<div class="g-recaptcha" data-sitekey="6LdmjBkUAAAAAHGAUd6DFQ0zZKeZvZ_UStAbtgkF"></div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<input type="submit" name="signupnow" id="signupnow" value="Sign Up Now"/>
										</div>
									</div>
							</div>
						</form>							
					</div>
				</div> <!-- carousel-caption -->
			</div>
		</section>
		<section class="background-blue">
			<div class="container">
				
				<div id="offer-slider-carousel" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<h2 class="font-white text-center">Rates as low as 1.75% + €0.12 per transaction</h2>							
						</div> <!-- item -->
						<div class="item">
							<h2 class="font-white text-center">SDK + Plugins + Hosted Payment Page = Simple integration</h2>		
							
						</div> <!-- item -->
						<div class="item">
							<h2 class="font-white text-center">PCI compliant online payment gateway</h2>		
						</div> 
						<div class="item">
							<h2 class="font-white text-center">Credit Card Processing Services</h2>		
						</div>
						<div class="item">
							<h2 class="font-white text-center">Merchant Account for E-Commerce</h2>		
						</div>
						<!-- item --> 
					</div> <!-- carousel-inner -->
					<!-- Left and right controls -->
					<a class="left carousel-control" href="#offer-slider-carousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#offer-slider-carousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				
			</div>
		</section>
		<section id="about-section">
			<div class="vertical-distance-40"></div>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-9">
						<div class="vertical-distance-20"></div>
						<div class="vertical-distance-20"></div>
						<h2 class="main-title">areto.systems - ONLINE PAYMENTS & ECOMMERCE SOLUTIONS</h2>
						<div class="vertical-distance-20"></div>
						<div class="vertical-distance-20"></div>
						<p class="justify">Grow your online business by accepting all global credit card payments from your customers worldwide, right from your website. Whether you are an already established eCommerce business looking for a better payment option, or are a startup business wanting to start accepting credit cards, you are in the right place! Accept credit cards online with Areto systems.</p><br/>
						<p>You can benefit from our <b>free</b> apps, unbeatable rates and long years of experience in the payment business with our great banking partners. We will provide you with the best payment processing solution to fit your online business. We can offer you a merchant account with great rates starting from as low as 1.75% + 0.12c per transaction. You can use our innovative payment gateway with lots of fantastic features for free. Get in touch with us and start growing your business, today!</p><br/>
						
						<br/>
						<p class="justify">
						Benefit from several of cool features like 3D secure, shopping cart plugins, a customer retention add-on and much more that is offered absolutely for free on our payment platform.
						</p>
						<div class="vertical-distance-20"></div>
						<p>Sign up Today with <b>areto.systems</b>!</p>
						<div class="vertical-distance-20"></div>
						<div class="vertical-distance-20"></div>
					
						<h2 class="main-title">What do we offer?</h2>
						<div class="vertical-distance-20"></div>
						
						<ul class="featuresUl">
							<li>&nbsp;&nbsp;Unbeatable rates, as low as <b>1.75% + €0.12 per transaction</b></li>
							<li>&nbsp;&nbsp;All major credit card brands accepted, including <b>Visa, MasterCard, Jcb and Amex</b></li>
							<li>&nbsp;&nbsp;All major currencies accepted, including <b>USD, GBP, NOK and EUR</b></li>
							<li>&nbsp;&nbsp;Secure payment gateway</li>
							<li>&nbsp;&nbsp;Simple integration; <b>shopping cart plugins, SDK and Hosted Payment Pages</b></li>
							<li>&nbsp;&nbsp;Other great stuff; such as <b>FREE Shopping Cart plugins, FREE email marketing tools, Referral Program!</b></li>
						</ul>
						<div class="vertical-distance-20"></div>
						<div class="vertical-distance-20"></div>
						<p style="font-size:10px;font-style: italic;">All logos and trademarks listed here belong to their respective owners. Areto Systems Limited does not represent any of the above brands.</p>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3">
					<img src='images/Creditcards.jpg' alt='areto.net - customer retention'/>
					</div>
				
				</div>
			</div>
			<div class="vertical-distance-80"></div>
		</section>
		<section>
			<div class="vertical-distance-40"></div>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4">
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<a href='#signup'><input type="submit" name="signupnow" value="Sign Up Now"/></a>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="features">
			<div class="our-service-inner">
				<div class="container">
					<div class="vertical-distance-80"></div>
					<h2 class="text-center main-title">Features</h2>
					<div class="vertical-distance-60"></div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-4 text-center">
							<div class="icon-type1 background-light-grey">
								<img src="images/SecurePaymentGateway.png" alt="Secure payment gateway"/>
								<h4 class="icon-title">Secure Gateway</h4>
								<p>
									PCI compliant payment gateway including; SDKs and a secure Hosted Payment Page.&nbsp;&nbsp;<br/><br/><br/>
								</p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 text-center">
							<div class="icon-type1 background-light-grey">
								<img src="images/rates2.png" alt="Low rates"/>
								<h4 class="icon-title">Low Rates</h4>
								<p>
									Rates from 1.75% to 2.4% + €0.12 per transaction depending on your monthly volume.<br/><b>No Setup Fee!</b>
								</p>
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-4 text-center">
							<div class="icon-type1 background-light-grey">
								<img src="images/shoppincardplugin2.png" alt="Shopping cart plugins"/>
								<h4 class="icon-title">Shopping Cart Plugins</h4>
								<p>
									FREE plugins for WooCommerce, Wordpress, Joomla, VirtueMart, Magento, PrestaShop, OpenCart and a PHP SDK available.&nbsp;&nbsp;<br/><br/>
								</p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 text-center">
							<div class="icon-type1 background-light-grey background-light-grey">
								<img src="images/CustomerRetention.png" alt="Customer retention"/>
								<h4 class="icon-title">Customer Retention add-on</h4>
								<p>
									Fuel your sales with our FREE customer retention add-on. Increase sales by up to 95% by keeping in contact with your customers!
								</p>
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-4 text-center">
							<div class="icon-type1 background-light-grey">
								<img src="images/support.png" alt="Customer support"/>
								<h4 class="icon-title">Super Support</h4>
								<p>
									And we mean it! Our sales will get back to you within a few hours. Technical support is directly available on our portal!
								</p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 text-center">
							<div class="icon-type1 background-light-grey">
								<img src="images/reporting.png" alt="Reporting"/>
								<h4 class="icon-title">Reporting</h4>
								<p>
									Transaction reporting to follow all your sales. Daily sales summaries, debug reporting to track every movement of your transactions.
								</p>
							</div>
						</div>
					</div> <!-- ros -->
				</div> <!-- container -->
			</div>
		</section>
		<section id="areto-net">
			<div class="vertical-distance-40"></div>
           
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4">
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<a href='#signup'><input type="submit" name="signupnow" value="Sign Up Now"/></a>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
						</div>
					</div>
				</div>
			
            
		</section>
	
		<section >
			<div class="vertical-distance-40"></div>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-9">
						<h2 class="main-title">areto.net is completely free, seriously!</h2>
						<div class="vertical-distance-20"></div>
						<p>areto.net is a customer retention tool available for <b>free</b> to you, when sigining up to accept credit card payments with areto.systems!</p> <br/>
						<p>Every time your customer purchases something, a transaction is created. This is how you generate your revenue, and this is why you want to accept credit card payments online. Areto.net captures your customers, and keeps an eye on them on your behalf. If a customer doesn't purchase a second time, areto.net will know and initiate email campaigns to get them back! This is the time to engage your customer, reduce your acquisition costs and increase the life-time value of your customer, today! don't wait!</p><br/>
						<p><b>NO TECH KNOWELDGE REQUIRED</b> - Just create your campaigns, operate your online business, and let <b>areto.net</b> do the rest.</p> 
					
						<div class="vertical-distance-20"></div>
						<p>Sign up Today and Enjoy areto.net for FREE!</p>
						<div class="vertical-distance-20"></div>
						<div class="vertical-distance-20"></div>
						<div class="col-xs-12 col-sm-12 col-md-9">
							<h2 class="main-title">What does areto.net offer?</h2>
							<div class="vertical-distance-20"></div>
							
							<ul class="featuresUl">
								<li>&nbsp;&nbsp;Unlimited retention campaigns</li>
								<li>&nbsp;&nbsp;Several triggers to initiate emails at the right time</li>
								<li>&nbsp;&nbsp;Custom templates and personalised emails</li>
								<li>&nbsp;&nbsp;Campaign tracking</li>
								<li>&nbsp;&nbsp;Email tracking - track your opens, clicks and more</li>
								<li>&nbsp;&nbsp;Quick setup. No email server or complicated tech stuff required!</li>
							</ul>
					</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3">
					<img src='images/aretonet.jpg' alt='areto.net - customer retention'/>
					</div>
					
				</div>
			</div>
			<div class="vertical-distance-80"></div>
		</section>
	
		<section>
			<div class="vertical-distance-40"></div>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-4">
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<a href='#signup'><input type="submit" name="signupnow" value="Sign Up Now"/></a>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4">
					</div>
				</div>
			</div>
		</section>
		<section id='testimonial-section' class="background-light-grey">
			<div class="vertical-distance-80"></div>
			<div class="container">
				<h2 class="main-title text-center">Customer Reviews</h2>
				<p class="sub-title text-center">What our customers have to say about our services.</p>
				<div class="vertical-distance-80"></div>
				<div id="testimonial-slider-carousel" class="carousel slide" data-ride="carousel">

					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#testimonial-slider-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#testimonial-slider-carousel" data-slide-to="1"></li>
						<li data-target="#testimonial-slider-carousel" data-slide-to="2"></li>
						<li data-target="#testimonial-slider-carousel" data-slide-to="3"></li>
					</ol> <!-- Carousel indicators -->

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="what-people-say">
										<p>
											Sales have been very professional and have gone above and beyond with constant and timely communications, whether it be during or after hours to accommodate our time difference.  I could not have expected any better service.<br/><br/>
										</p>
										<h4 class="text-right">- Andy (PowerPick LLC)</h4>
									</div>
								</div>
							</div> <!-- row -->					
						</div> <!-- item -->
						<div class="item">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="what-people-say">
										<p>
											Sales was in touch with me for the whole time, ready to answer any of my questions. They replied most of my email within few hours. Everything went nicely and I was well informed all the time.<br/><br/>
										</p>
										<h4 class="text-right">- Christiana (WSD Store)</h4>
									</div>
								</div>
							</div> <!-- row -->
						</div> 
						<div class="item">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="what-people-say">
										<p>
											Sales team was of great help. Always suggested the best. They are very patient! <br/><br/><br/>
										</p>
										<h4 class="text-right">- Ahmad (Wininfotech)</h4>
									</div>
								</div>
							</div> <!-- row -->
						</div>
						<div class="item">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="what-people-say">
										<p>
											The service was very good, the process was smooth, and the team was also very communicative, made sure all our questions were answered straight away, made follow ups when needed. The experience of working with Areto was a pleasant one.<br/><br/>
										</p>
										<h4 class="text-right">- Charlene (Accounting Services Ltd)</h4>
									</div>
								
								</div>
							</div> <!-- row -->
						</div>
					</div> <!-- carousel-inner -->
				</div>
			</div>
			<div class="vertical-distance-40"></div>
			<div class="vertical-distance-80"></div>
		</section>
	<section>
			<div class="vertical-distance-40"></div>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4">
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
						<a href='#signup'><input type="submit" name="signupnow" value="Sign Up Now"/></a>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="contact-section">
			<div class="contact-us-section">
				<div class="vertical-distance-80"></div>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-4 agent-detail">
							<h2 class="main-title">Contact Us</h2>
							<div class="vertical-distance-20"></div>
							<div class="media">
								<div class="media-left">
									<i class="fa fa-phone" aria-hidden="true"></i>
								</div>
								<div class="media-body">
									<h4 class="media-heading">Call us On</h4>
									<p>(+44) 02030268339</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 agent-detail">
							<h2 class="main-title">&nbsp;</h2>
							<div class="vertical-distance-20"></div>
							<div class="media">
								<div class="media-left">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</div>
								<div class="media-body">
									<h4 class="media-heading">E-Mail us On</h4>
									<p><a href="#">customer.success@aretosystems.com</a></p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 agent-detail">
							<h2 class="main-title">Follow Us</h2>
							<div class="media">
								<div class="media-left">
								</div>
								<div class="media-body">
									<ul class="agent-social-icons">
										<li><a target="_blank" href="https://www.facebook.com/aretosystemsltd/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a target="_blank" href="https://twitter.com/AretoSystems"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										<li><a target="_blank" href="https://www.linkedin.com/company/areto-systems"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="vertical-distance-80"></div>
			</div>
		</section>
		<footer class="social-link-header">				
			<div class="one-page-footer">
				<div class="vertical-distance-10"></div>
				<p class="text-center">Areto Systems Limited, Level 1, Abacus Business Centre, Dun Karm Street, MALTA. All rights reseved &copy; 2017.</p>
				<div class="vertical-distance-10"></div>
				<p class="text-center"><a href="https://www.aretosystems.com">Visit us on https://www.aretosystems.com</a></p>
				<div class="vertical-distance-10"></div>
			</div>
		</footer> <!-- Footer -->

		<script src="js/jquery.min.js"></script>		
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/image-light-box.js"></script>
        <script type="text/javascript" src="js/notifications.js"></script>
        <script type="text/javascript" src="js/loadingoverlay.min.js"></script>
        <script type="text/javascript" src="js/core.js?id=3"></script>
		<script type="text/javascript" src="js/signup.js?v=1"></script>
				<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-26214215-1', 'auto');
		  ga('send', 'pageview');

		</script>
		
		
	</body>

</html>
