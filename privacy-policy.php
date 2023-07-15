<?php 
require_once("wr-m6/wrbasic/config.inc.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/pages/pages.class.php');
$layout_obj = new LayoutClass();
$page_obj = new PagesClass();
extract($_REQUEST);

if($p==1)
$pagename='about';
?>
<!doctype html>
<html class="no-js" lang="en-gb">
<?php
include('Db.php');
$urs= $protocol .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$con = mysqli_connect("localhost", "recycleproco_sohaib", "123@Screw@@", "recycleproco_experiment") or die("Error " . mysqli_error($con));
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url= $protocol .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$sql="select * from url where url='$url' ";
            $record=mysqli_query($con,$sql);
           while($row=mysqli_fetch_array($record))
            {
            	$title=$row['title'];
            	$keywords=$row['keywords'];
            	$description=$row['description'];
            }
 ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $description;  ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">-->

    <!-- Plugins -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">
<link rel="canonical" href="privacy-policy.php"/>

    <!-- Style Css -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/css-utilities-technovibes.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/page.js"></script>
    <?php echo $layout_obj->getBasicVals('Header_codes','option_value'); ?>
</head>

<body>
    <?php echo $layout_obj->getBasicVals('After_body_tags','option_value'); ?>
    <div id="wrapper" class="wrapper">

        <!-- Header -->
        <?php $layout_obj->pageHead($pagename); ?>
        <!--// Header -->

        <!-- Breadcrumb Area -->
        <div class="breadcrumb-area bg-grey">
            <div class="container">
                <div class="ho-breadcrumb">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Privacy Policy</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->

        <!-- Page Conttent -->
        <main class="page-content">

            <!-- Shop Page Area -->
           
                <div class="container">
                    <section >
                        <div >
                            <h2 style="color:#17a697;font-size:30px;font-weight:800;" >Privacy policy</h2>
                            <h3>Introduction</h3>
                            <p >We are committed to safeguarding the privacy of www.recyclepro.co.uk.</p>
                           <p>This policy applies where we are acting as a data controller with respect to the personal data of www.recyclepro.co.uk; in other words, where we determine the purposes and means of the processing of that personal data.
</p>
 <p>We use cookies on our website. Insofar as those cookies are not strictly necessary for the provision of www.recyclepro.co.uk, we will ask you to consent to our use of cookies when you first visit our website.</p>
 <p>Our website incorporates privacy controls which affect how we will process your personal data. By using the privacy controls, you can receive direct marketing communication. </p>
 <p>Our website incorporates privacy controls which affect how we will process your personal data. By using the privacy controls, you can receive direct marketing communication. </p>
 <p>In this policy, "we'' , "us" and "our" refer to www.recyclepro.co.uk. [ For more information about us, see Section 13.]</p>
                        </div>
                    </section><!-- /.section-page-title -->
                    <section >
                        <h2>How we use your personal data</h2>
                        <h3>In Section 2 we have set out:</h3>
                        <ol>
                            <li>the general categories of personal data that we may process;</li>
                            <li>the purposes for which we may process personal data; and</li>
                            <li>the legal bases of the processing.</li>
                            
                           
                        </ol>
                    </section>

                    <section >
                        <p>We may process ("usage data"). The usage data may include [your IP address, geographical location, browser type, and version, operating system, referral source, length of visit, page views and website navigation paths, as well as information about the timing, frequency, and pattern of your service use]. The source of the usage data is [our analytics tracking system]. This usage data may be processed [for the purposes of analyzing the use of the website and services]. The legal basis for this processing is [consent] OR [our legitimate interests, namely [monitoring and improving our website and services].
</p>
                    </section>
                    <section >
                       
                        <p>We may process [your website user account data] ("account data"). The account data may [include your name and email address]. The source of the account data is [you or your employer]. The account data may be processed [for the purposes of operating our website, providing our services, ensuring the security of our website and services, maintaining back-ups of our databases and communicating with you]. The legal basis for this processing is [consent] OR [our legitimate interests, namely the proper administration of our website and business] OR [the performance of a contract between you and us and/or taking steps, at your request, to enter into such a contract].</p>
                    </section>
                    <section >
                         <p>We may process [information that you post for publication on our website or through our services] ("publication data"). The publication data may be processed [for the purposes of enabling such publication and administering our website and services]. The legal basis for this processing is [consent] OR [our legitimate interests, namely the proper administration of our website and business] OR [the performance of a contract between you and us and/or taking steps, at your request, to enter into such a contract].</p>
                    </section>
               
                  <section >
                        <p>We may process [information contained in any inquiry you submit to us regarding goods and/or services] ("inquiry data"). The enquiry data may be processed [for the purposes of offering, marketing and selling relevant goods and/or services to you]. The legal basis for this processing is [consent] OR [our legitimate interests,] OR [the performance of a contract between you and us and/or the taking steps, at your request, to enter into such a contract].</p>
                    </section>
                    <section >
                        <p>We may process [information that you provide to us for the purpose of subscribing to our email notifications and/or newsletters] ("notification data"). The notification data may be processed [for the purposes of sending you the relevant notifications and/or newsletters]. The legal basis for this processing is [consent] OR [our legitimate interests, namely [communications with our website visitors and service users]] OR [the performance of a contract between you and us and/or taking steps, at your request, to enter into such a contract]We may process [information relating to transactions, including purchases of goods and/or services, that you enter into with us and/or through our website] ("transaction data").[ The transaction data may include [your contact details, your card details, and the transaction details]. [ The source of the transaction data is [you and/or our payment services provider]. The transaction data may be processed [for the purpose of supplying the purchased goods and/or services and keeping proper records of those transactions]. The legal basis for this processing is [the performance of a contract between you and us and/or taking steps, at your request, to enter into such a contract; providing that, if you are not the person contracting with us, the legal basis for this processing is our legitimate interests, namely [the proper administration of our website and business].</p>
                    </section>
                    <section >
                        <p>We may process [information that you provide to us for the purpose of subscribing to our email notifications and/or newsletters] ("notification data"). The notification data may be processed [for the purposes of sending you the relevant notifications and/or newsletters]. The legal basis for this processing is [consent] OR [our legitimate interests, namely [communications with our website visitors and service users]] OR [the performance of a contract between you and us and/or taking steps, at your request, to enter into such a contract].</p>
                    </section>
                    <section >
                        <p>We may process [identify the general category of data].[ This data may include [list specific items of data]. [ The source of this data is [identify source]. This data may be processed for [specify purposes]. The legal basis for this processing is [consent] OR [our legitimate interests, namely [specify legitimate interests]] OR [the performance of a contract between you and us and/or taking steps, at your request, to enter into such a contract].</p>
                    </section>
                    <section >
                        <p>We may process [any of your personal data identified in this policy] where necessary for [the establishment, exercise or defense of legal claims, whether in court proceedings or in an administrative or out-of-court procedure]. The legal basis for this processing is our legitimate interests, namely [the protection and assertion of our legal rights, your legal rights and the legal rights of others].</p>
                    </section>
                    <section >
                        <p>We may process [any of your personal data identified in this policy] where necessary for [the purposes of obtaining or maintaining insurance coverage, managing risks, or obtaining professional advice]. The legal basis for this processing is our legitimate interests, namely [the proper protection of our business against risks].</p>
                    </section>
                    <section >
                        <p>In addition to the specific purposes for which we may process your personal data set out in this Section 2, we may also process [any of your personal data] where such processing is necessary[ for compliance with a legal obligation to which we are subject, or] in order to protect your vital interests or the vital interests of another natural person.</p>
                    </section>
                     <section >
                        <p>Please do not supply any other person's personal data to us, unless we prompt you to do so.</p>
                    </section>
                    <section >
                        <h2>Providing your personal data to others</h2>
                        </section>
                         <section >
                        <p>We may disclose [your personal data] to [our insurers and/or professional advisers] insofar as reasonably necessary for the purposes of [obtaining or maintaining insurance coverage, managing risks, obtaining professional advice, or the establishment, exercise or defence of legal claims, whether in court proceedings or in an administrative or out-of-court procedure].</p>
                    </section>
                     <section >
                        <p>[Your personal data held in our website database] will be stored on the servers of our hosting services providers.</p>
                    </section>
                     <section >
                        <p>We may disclose [specify personal data category or categories] to [our suppliers or subcontractors] insofar as reasonably necessary.</p>
                    </section>
                     <section >
                        <p>In addition to the specific disclosures of personal data set out in this Section 3, we may disclose your personal data where such disclosure is necessary for compliance with a legal obligation to which we are subject, or in order to protect your vital interests or the vital interests of another natural person.[ We may also disclose your personal data where such disclosure is necessary for the establishment, exercise or defense of legal claims, whether in court proceedings or in an administrative or out-of-court procedure.]</p>
                    </section>
                     <section >
                        <p>In addition to the specific disclosures of personal data set out in this Section 3, we may disclose your personal data where such disclosure is necessary for compliance with a legal obligation to which we are subject, or in order to protect your vital interests or the vital interests of another natural person.[ We may also disclose your personal data where such disclosure is necessary for the establishment, exercise or defense of legal claims, whether in court proceedings or in an administrative or out-of-court procedure.]</p>
                    </section>
                     <section >
                        <h2>International transfers of your personal data</h2>
                        </section>
                         <section >
                        <p>In Section 4, we provide information about the circumstances in which your personal data may be transferred to [countries outside the European Economic Area (EEA)].</p>
                    </section>
                     <section >
                        <p>The hosting facilities for our website are situated in The United Kingdom.[ The European Commission has made an "adequacy decision" with respect to [the data protection laws of each of these countries].</p>
                    </section>
                     <section >
                        <p>You acknowledge that [personal data that you submit for publication through our website or services] may be available, via the internet, around the world. We cannot prevent the use (or misuse) of such personal data by others.</p>
                    </section>
                    <section >
                        <h2>Retaining and deleting personal data</h2>
                        </section>
                     <section >
                        <p>Section 5 sets out our data retention policies and procedures, which are designed to help ensure that we comply with our legal obligations in relation to the retention and deletion of personal data.</p>
                    </section>
                     <section >
                        <p>We will retain your personal data as follows:
(a)	[usage data will be retained for a minimum period of [6 months] following the date of collection, and for a maximum period of [24 months] following that date];
(b)	[account data will be retained for a minimum period of [6 months] following the date of closure of the relevant account, and for a maximum period of [24 months] following that date];
(c)	[publication data will be retained for a minimum period of [6 months] following the date when the relevant publication ceases to be published on our website or through our services, and for a maximum period of [24 months] following that date];
(d)	[inquiry data will be retained for a minimum period of [period] following the date of the inquiry, and for a maximum period of [6 months] following that date];
(e)	[transaction data will be retained for a minimum period of [period] following the date of the transaction, and for a maximum period of [24 months] following that date];
(f)	[notification data will be retained for a minimum period of [6 months] following the date that we are instructed to cease sending the notifications, and for a maximum period of [24 months] following that date (providing that we will retain notification data insofar as necessary to fulfill any request you make to actively suppress notifications)] and
(g)	 [data category] will be retained for a minimum period of [6 months] following [date], and for a maximum period of [24 months] following [date].
[additional list items]
</p>
                    </section>
                    <section >
                        <h2>Your rights</h2>
                        </section>
                         <section >
                        <p>In Section 6, we have listed the rights that you have under data protection law.</p>
                    </section>
                     <section >
                        <p>Your principal rights under data protection law are:
                        (a)	the right to access - you can ask for copies of your personal data;
(b)	the right to rectification - you can ask us to rectify inaccurate personal data and to complete incomplete personal data;
(c)	the right to erasure - you can ask us to erase your personal data;
(d)	the right to restrict processing - you can ask users to restrict the processing of your personal data;
(e)	the right to object to processing - you can object to the processing of your personal data;
(f)	the right to data portability - you can ask that we transfer your personal data to another organization or to you;
(g)	the right to complain to a supervisory authority - you can complain about our processing of your personal data; and
(h)	the right to withdraw consent - to the extent that the legal basis of our processing of your personal data is consent, you can withdraw that consent.
</p>
                    </section>
                     <section >
                        <p>These rights are subject to certain limitations and exceptions. You can learn more about the rights of data subjects by visiting https://ico.org.uk/for-organisations/guide-to-data-protection/guide-to-the-general-data-protection-regulation-gdpr/individual-rights/.</p>
                    </section>
                    <section >
                        <p>You may exercise any of your rights in relation to your personal data [by written notice to us, using the contact details set out below].</p>
                    </section>
                     <section >
                        <h2>About cookies</h2>
                        </section>
                         <section >
                        <p>A cookie is a file containing an identifier (a string of letters and numbers) that is sent by a web server to a web browser and is stored by the browser. The identifier is then sent back to the server each time the browser requests a page from the server.</p>
                    </section>
                     <section >
                        <p>Cookies may be either "persistent" cookies or "session" cookies: a persistent cookie will be stored by a web browser and will remain valid until its set expiry date, unless deleted by the user before the expiry date; a session cookie, on the other hand, will expire at the end of the user session, when the web browser is closed.</p>
                    </section>
                     <section >
                        <p>Cookies do not typically contain any information that personally identifies a user, but personal data that we store about you may be linked to the information stored in and obtained from cookies.</p>
                    </section>
                     <section >
                        <h2>Cookies that we use</h2>
                        </section>
                         <section >
                        <p>We use cookies for the following purposes:
(a)	[authentication and status - we use cookies [to identify you when you visit our website and as you navigate our website, and to determine if you are logged into the website]
(b)	[personalization - we use cookies [to store information about your preferences and to personalize the website for you
(c)	[security - we use cookies [as an element of the security measures used to protect user accounts, including preventing fraudulent use of login credentials, and to protect our website and services generally]
(d)	[advertising - we use cookies [to help us to display advertisements that will be relevant to you]
(e)	[analysis - we use cookies [to help us to analyze the use and performance of our website and services]
(f)	[cookie consent - we use cookies [to store your preferences in relation to the use of cookies more generally].
</p>
                    </section>
                     <section >
                        <h2>Cookies used by our service providers</h2>
                        </section>
                     <section >
                        <p>Our service providers use cookies and those cookies may be stored on your computer when you visit our website.</p>
                    </section>
                     <section >
                        <p>We use Google Analytics. Google Analytics gathers information about the use of our website by means of cookies. The information gathered is used to create reports about the use of our website. You can find out more about Google's use of information by visiting https://www.google.com/policies/privacy/partners/ and you can review Google's privacy policy at https://policies.google.com/privacy.</p>
                    </section>
                    
                   </div>
            <!--// Shop Page Area -->

            <!-- Newsletter Area -->
            <?php $layout_obj->NewsLetterArea(); ?>
            <!--// Newsletter Area -->
<
        </main>
        <!--// Page Conttent -->

        <!-- Footer -->
        <?php $layout_obj->footer(); ?>
        <!--// Footer -->


    </div>
    <!--// Wrapper -->
    <script>
    includeHTML();
    </script>
    <!-- Js Files -->
    <script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <?php echo $layout_obj->getBasicVals('Footer_script_code','option_value'); ?>
</body>
</html>