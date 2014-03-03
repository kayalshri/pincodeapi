<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="data.gov.in api layer">
	<meta name="author" content="ngiriraj">

	<!-- INCLUDES JS/CSS -->
	<!-- jquery -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	
	
	<!-- highcharts -->
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<script src="http://code.highcharts.com/modules/exporting.js"></script>
	
	
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=482962811753376";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<style>
	.fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style] {width: 100% !important;}
.fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe span[style] {width: 100% !important;}
	.author {
    background-color: #FFFFFF;
    border-radius: 500px;
    box-shadow: 0 1px 3px #C3C3C3;
    margin: 5px;
    overflow: hidden;
    padding: 5px;
    transition: box-shadow 0.2s ease-in-out 0s;
/*    width: 150px;*/
	}
	</style>
    <!-- Bootstrap core CSS -->
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script type="text/javaScript">
	
		$(document).ready(function(){
		
		var loading = "<tr><td align='center'><img src='http://www.edsheeran.com/_img/loading-sml.gif'></td></tr>";
		$(".search").live("click",function(e){
			$("#datashow").html(loading);
			if(($('#inputpin').val().length) != 6) {
				$("#datashow").html("<tr><td align='center'>PIN Code should be 6 Digits</td></tr>");
			}else{
			var pin = $("#inputpin").val();
			$.ajax({
				url: 'pinsearch.php?type=pin&pin='+pin,				
				success: function ( data ) {
					$("#datashow").html(data);
					
				}
			});
			}
		});

		
		$(".search_location").live("click",function(e){
		$("#datashow_loc").html(loading);
		if(($('#inputLocation').val().length) < 3) {
				$("#datashow_loc").html("<tr><td align='center'>Minimum 3 characters required</td></tr>");
			}else{
			var location = $("#inputLocation").val();
			$.ajax({
				url: 'pinsearch.php?type=loc&location='+location,				
				success: function ( data ) {
					$("#datashow_loc").html(data);
					
				}
			});
			}
		});

		
		$(".search_taluk").live("click",function(e){
		$("#datashow_taluk").html(loading);
		if(($('#inputTaluk').val().length) < 3) {
				$("#datashow_taluk").html("<tr><td align='center'>Minimum 3 characters required</td></tr>");
			}else{
			var taluk = $("#inputTaluk").val();
			$.ajax({
				url: 'pinsearch.php?type=taluk&taluk='+taluk,				
				success: function ( data ) {
					$("#datashow_taluk").html(data);
					
				}
			});
			}
		});
		});
		
		a2a.init('page');
	</script>
  </head>

	<body>
		<!-- Navigator -->
		<div class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"><u>P</u>ostal <u>I</u>ndex <u>N</u>umber CODE DIRECTORY</a>
          </div>
          <div class="navbar-collapse collapse" style="text-align:right">
            <ul class="nav navbar-nav">
			  <li><a href="#api">Developer API</a></li>
              <li><a href="#help">About</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

		<p align='center'>Source : data.gov.in</p>

    
        <div class="col-lg-9">
            <div class="alert alert-dismissable alert-success">

			<form class="bs-example form-horizontal">
				<div class="bs-example">
					  <ul class="nav nav-tabs" style="margin-bottom: 15px;">
						<li class="active"><a href="#pincode_tab" data-toggle="tab">PINCODE</a></li>
						<li><a href="#location_tab" data-toggle="tab">Location</a></li>               
						<li><a href="#taluk_tab" data-toggle="tab">Talukwise</a></li>               
					  </ul>
				  
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="pincode_tab">
							<div class="form-group " id="pinwise">
								<div class="col-lg-7">
									<input type="text" class="form-control" id="inputpin" placeholder="6 Digits PINCODE (ex. 632601)" maxlength=6>								  
								</div>
								
								<div class="col-lg-1">
									<button type="button" class="btn btn-primary search" >Search</button>
								</div>
							</div>
						  
							<div class="table-responsive">
								<table id="datashow" class="table table-striped table-bordered" style="width:100%">
								
								</table>
							</div>
						</div>
					
					<div class="tab-pane fade" id="location_tab">
						<div class="form-group " id="locationwise">						
							<div class="col-lg-7">
								<input type="text" class="form-control" id="inputLocation" placeholder="Minimum 3 characters">
						  	</div>
							
							<div class="col-lg-1">
								<button type="button" class="btn btn-primary search_location" >Search</button>
							</div>
						</div>
						
						<div class="table-responsive">
							<table id="datashow_loc" class="table table-striped table-bordered" style="width:100%">
							</table>
						</div>
					</div>
					
					
					<div class="tab-pane fade" id="taluk_tab">
						<div class="form-group " id="Talukwise">
							<div class="col-lg-7">
								<input type="text" class="form-control" id="inputTaluk" placeholder="Minimum 3 characters">
							</div>
							
							<div class="col-lg-1">
								<button type="button" class="btn btn-primary search_taluk" >Search</button>
							</div>
						</div>
						
						<div class="table-responsive">
							<table id="datashow_taluk" class="table table-striped table-bordered" style="width:100%">
							
							</table>
						</div>
					</div>
					<div class="fb-comments" data-href="http://pincode.ngiriraj.com" data-numposts="5" data-colorscheme="light"></div>
							<p align='center'>It can be viewed in Mobile/Tabs (Minimum width 480px)</p>
				</div>
            </form>
        </div>
    </div>
</div>
         <div class="col-lg-3">
            <div class="panel panel-primary">
              <div class="panel-heading" id="help">
                <h3 class="panel-title">About PINCODE</h3>
              </div>
              <div class="panel-body">
					
Postal Index Number (PIN) or PIN Code is a 6 digit code of Post Office numbering used by India Post. The PIN was introduced on August 15, 1972. There are 9 PIN regions in the country. The first 8 are geographical regions and the digit 9 is reserved for the Army Postal Service. The first digit indicates one of the regions. The first 2 digits together indicate the sub region or one of the postal circles. The first 3 digits together indicate a sorting / revenue district. The last 3 digits refer to the delivery Post Office.
              </div>
            </div>
            </div>
         
          <div class="col-lg-3">
              <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">Social Media</h3>
              </div>
              <div class="panel-body">
            

              
                	<p align='right'>
	<span id="fb-root"></span>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=482962811753376";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, "script", "facebook-jssdk"));</script>
		
		<div class="fb-like"  data-layout="button_count" data-width="450" data-show-faces="true" data-font="segoe ui" data-href=""></div>

		<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
		<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
		<script type="IN/Share" data-counter="right" ></script>
		<!-- Place this tag where you want the share button to render. -->
		<div class="g-plus" data-action="share" data-annotation="bubble" ></div>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		<a href="https://twitter.com/share" class="twitter-share-button" data-via="kayalshri"  data-text=" (source : data.gov.in) ">Tweet</a>
		</p>
		
		
		
              </div>
            </div>
          </div>
          
            <div class="col-lg-3">
			
			<div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title">POSTAL Circle (Statewise)</h3>
              </div>
              <div class="panel-body">
				<ul>
					<li>11 - Delhi
					<li>12 - 13 Haryana
					<li>14 - 16 Punjab
					<li>17 - Himachal Pradesh
					<li>18 - 19 Jammu & Kashmir
					<li>20 - 28 Uttar Pradesh
					<li>30 - 34 Rajasthan
					<li>36 - 39 Gujarat
					<li>40 - 44 Maharashtra
					<li>45 - 48 Madhya Pradesh
					<li>49 - Chhattisgarh
					<li>50 - 53 Andhra Pradesh
					<li>56 - 59 Karnataka
					<li>60 - 64 Tamil Nadu
					<li>67 - 69 Kerala
					<li>682- Lakshadweep
					<li>70 - 74 West Bengal
					<li>744- Andaman & Nicobar
					<li>75 - 77 Orissa
					<li>78 - Assam
					<li>79 - Arunachal Pradesh
					<li>79 - Manipur
					<li>79 - Meghalaya
					<li>79 - Mizoram
					<li>79 - Nagaland
					<li>79 - Tripura
					<li>80 - 85 Bihar
					<li>80 - 83, 92 Jharkhand
					</ul>
              </div>
            </div>
            </div>
            
           
                       
            <div class="col-lg-3">
            <div class="panel panel-success" id="api">
              <div class="panel-heading">
                <h3 class="panel-title">Developer API (Demo Version)</h3>
              </div>
              <div class="panel-body">
              	
                           
              <B>API_URL</b> : http://ngiriraj.com/pincode_api/<br>
              <b>Type :</b> JSON/XML/CSV<br><br>
              <b>PINCODE : </b>6 Digits<br><br>
              <b>Area:</b> Filter based on area (starts with)<br><br>
              <b>Limit :</b> Record count<br><br>
              <br>
              <b>Sample URI:</b> (JSON) <br>
              <a href='http://ngiriraj.com/pincode_api/json/632601/t/1' target='_blank'>http://ngiriraj.com/pincode_api/json/632601/t/1</a><br>
              <br>
              <b>Sample Output:</b><PRE>{"Records":154724,"Matched":1,"Fields":["OFFICENAME","TALUK","DISTRICTNAME","STATENAME","PINCODE"],"data":[["Thattaparai B.O","Gudiyattam","Vellore","TAMIL NADU","632601"]]}  </pre>
               <BR>           
               <b>Sample URI:</b> (XML)<br>
              <a href='http://ngiriraj.com/pincode_api/xml/632601/d' target='_blank'>http://ngiriraj.com/pincode_api/xml/632601/d</a><br>
              
               <b>Sample URI:</b> (CSV)<br>
              <a href='http://ngiriraj.com/pincode_api/csv/632601' target='_blank'>http://ngiriraj.com/pincode_api/csv/632601</a><br>
              
                          
          </div>
        </div>
        
    
              
              
		  Disclaimer: The information is the latest from data.gov.in. We request the users to check with the relavent site before using it. <BR>The author is not resposible for anything regarding the information. Therefore, future liability claims due to the information given will be rejected.
              
             
		  

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Latest compiled and minified CSS http://bootswatch.com/superhero/bootstrap.min.css  //netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css -->
<link rel="stylesheet" href="http://bootswatch.com/cyborg/bootstrap.min.css">

<!-- Optional theme 
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
-->

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</body>

</html>
